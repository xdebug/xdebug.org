<?php
namespace XdebugDotOrg;

use MongoDB\Driver\Query;
use XdebugDotOrg\Model\Country;
use XdebugDotOrg\Model\FundingProjectsList;
use XdebugDotOrg\Model\StripeSession;
use XdebugDotOrg\Model\SubscriptionData;

use XdebugDotOrg\Controller\FundingController;

use ReflectionException;

use Stripe\Checkout\Session;
use Stripe\StripeClient;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\BSON\UTCDateTime;

class StripeHandler
{
	const ns = 'xdebug.stripe';

	private SubscriptionData $subscriptionData;
	private ?string $url = NULL;

	public function __construct(private StripeClient $client, private Manager $mongodb, private bool $testMode = true)
	{
	}

	private static function getProjectSummary() : array
	{
		$fundingProjects = \XdebugDotOrg\Core\ContentsCache::fetchModel(
			FundingProjectsList::class,
			fn(): FundingProjectsList => FundingController::getProjects(),
			'funding-idx'
		);

		$fundingProjectsList = [];
		foreach ($fundingProjects->projects as $fundingProject) {
			$fundingProjectsList[$fundingProject->id] =	$fundingProject->title;
		}

		return $fundingProjectsList;
	}

	public function validateData(array $data): string|true
	{
		$reasons = [];
		$subscriptionData = [];

		$requiredProperties = [
			'company_name',
			'contact_name',
			'address',
			'contact_email',
		];

		foreach ($requiredProperties as $property) {
			if (
				!array_key_exists($property, $data) ||
				strlen(trim($data[$property])) == 0
			) {
				$reasons[] = "The field {$property} is empty";
			} else {
				$subscriptionData[$property] = trim($data[$property]);
			}
		}

		if (
			!array_key_exists('country', $data) ||
			strlen(trim($data['country'])) == 0
		) {
			$reasons[] = 'The country field is missing or empty';
		}

		try {
			$subscriptionData['country'] = (new \ReflectionEnum(Country::class))?->getCase($data['country'])?->getValue();
		} catch (ReflectionException) {
		}

		if (!$subscriptionData['country']) {
			$reasons[] = 'The country field does not contain valid data';
			unset($subscriptionData['country']);
		} elseif (
			$subscriptionData['country']->isVatNumberRequired() &&
			(
				!array_key_exists('vat_number', $data) ||
				strlen(trim($data['vat_number'])) == 0
			)
		) {
			$reasons[] = 'The VAT number must be filled in';
		}

		$projects = self::getProjectSummary();
		$subscriptionData['projects'] = $projects;

		if (
			!array_key_exists('package', $data) ||
			(
				!in_array($data['package'], ['pro', 'business']) &&
				!array_key_exists($data['package'], $projects)
			)
		) {
			$reasons[] = 'The selected package must be pro, business, or a project';
			$subscriptionData['package'] = 'business';
		} else {
			$subscriptionData['package'] = trim($data['package']);
		}

		if ($data['package'] !== 'pro' && $data['package'] !== 'business') {
			$amount = (int) $data['contribution_amount'];
			$subscriptionData['contribution_amount'] = $amount;
			if ($amount < 100) {
				$reasons[] = 'The minimum contribution amount is GBP 100';
				$subscriptionData['contribution_amount'] = 100;
			}
		}

		$optionalProperties = [
			'billing_email',
			'newsletter_email',
			'vat_number',
			'link_text',
			'link_target',
			'link_svg',
		];

		foreach ($optionalProperties as $property) {
			if (
				array_key_exists($property, $data) &&
				strlen(trim($data[$property])) > 0
			) {
				$subscriptionData[$property] = trim($data[$property]);
			}
		}

		if (count($reasons)) {
			return join(', ', $reasons);
		}

		$this->subscriptionData = new SubscriptionData(...$subscriptionData);

		return true;
	}

	public function processPayment(): string|true
	{
		$guid = bin2hex(random_bytes(16));
		$lineItems = [];

		$lineItems[] = [
			'price_data' => [
				'currency' => 'GBP',
				'product_data' => ['name' => 'Support for Xdebug: ' . $this->subscriptionData->getName()],
				'unit_amount' => $this->subscriptionData->getCost()
			],
			'quantity' => 1
		];

		if ($this->subscriptionData->country->isVatChargable()) {
			$lineItems[] = [
				'price_data' => [
					'currency' => 'GBP',
					'product_data' => ['name' => 'VAT'],
					'unit_amount' => $this->subscriptionData->getVATCost()
				],
				'quantity' => 1
			];
		}

		$sessionInfo = [
			'customer_email' => $this->subscriptionData->contact_email,
			'client_reference_id' => $guid,
			'success_url' => "{$GLOBALS['protocol']}://{$_SERVER['HTTP_HOST']}/support/buy/{$guid}/success",
			'cancel_url' => "{$GLOBALS['protocol']}://{$_SERVER['HTTP_HOST']}/support/buy/{$guid}/cancel",
			// 'payment_method_types' => [ 'card' ],
			'mode' => 'payment',
			'line_items' => $lineItems,
			'metadata' => [
				'sub' => $guid
			]
		];

		$session = $this->client->checkout->sessions->create($sessionInfo);
		$this->storeSession($session, $lineItems);
		$this->url = $session->url;

		return true;
	}

	public function getUri(): string
	{
		return $this->url;
	}

	private function storeSession(Session $session, array $lineItems)
	{
		$subscriberInformation = [
			'_id' => $session->metadata->sub,
			'test' => $GLOBALS['STRIPE_TEST'] ? true : false,
			'created' => new UTCDateTime($session->created * 1000),
			'stripe' => [
				'id' => $session->id,
				'amount_subtotal' => $session->amount_subtotal,
				'amount_total' => $session->amount_total,
				'urls' => [
					'success' => $session->success_url,
					'cancel' => $session->cancel_url,
					'pay' => $session->url,
				],
				'client_reference_id' => $session->client_reference_id,
				'currency' => $session->currency,
				'customer_email' => $session->customer_email,
				'payment_intent' => $session->payment_intent,
				'payment_status' => $session->payment_status,
			],
			'customer' => $this->subscriptionData,
			'line_items' => $lineItems,
		];

		$bw = new BulkWrite;
		$bw->insert($subscriberInformation);

		$res = $this->mongodb->executeBulkWrite(self::ns, $bw);
	}

	private function fetchOne( \MongoDB\Driver\Query $q ) : ?\stdClass
	{
		$res = [];
		$qRes = $this->mongodb->executeQuery( self::ns, $q );

		foreach ( $qRes as $r )
		{
			$res[] = $r;
		}

		return count( $res ) > 0 ? $res[0] : null;
	}

	public function getSession( string $guid ): ?StripeSession
	{
		$filter = [ '_id' => $guid ];
		$q = new Query( $filter );
		$data = $this->fetchOne( $q );

		if ( $data === null )
		{
			return null;
		}

		return new StripeSession( $this->client, $this->mongodb, $data );
	}
}
?>
