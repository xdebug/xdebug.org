<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
readonly class SubscriptionData
{
	public function __construct(
		public ?string $company_name = null,
		public ?string $contact_name = null,
		public ?string $address = null,
		public ?Country $country = null,
		public ?string $vat_number = null,
		public ?string $contact_email = null,
		public ?string $billing_email = null,
		public ?string $newsletter_email = null,
		public ?string $link_text = null,
		public ?string $link_target = null,
		public ?string $package = 'pro',
	) {}

	public function getName() : string
	{
		return match ($this->package) {
			'pro' => 'Pro',
			'business' => 'Business',
			default => 'Unknown',
		};
	}

	public function getCost() : int
	{
		return match ($this->package) {
			'pro' => 20000,
			'business' => 100000,
			default => 0,
		};
	}

	public function getVATCost() : int
	{
		return (int) ($this->getCost() * $this->country->getVATPercentage());
	}
}
?>
