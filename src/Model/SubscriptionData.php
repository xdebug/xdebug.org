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
		public ?string $link_svg = null,
		public ?string $package = 'pro',
		public ?array  $projects = [],
		public ?int $contribution_amount = 100,
	) {}

	public function getName() : string
	{
		return match ($this->package) {
			'pro' => 'Pro Support',
			'business' => 'Business Support',
			default => $this->getNameFromProjectsList($this->package) ?? 'Unknown',
		};
	}

	private function getNameFromProjectsList(string $package) : ?string
	{
		if ( !$this->projects )
		{
			return NULL;
		}

		if ( array_key_exists( $package, $this->projects ) )
		{
			return "funding '{$this->projects[$package]}'";
		}

		return NULL;
	}

	public function isOpenAmount() : bool
	{
		return $this->package !== 'pro' && $this->package !== 'business';
	}

	public function packageProvidesLinks() : bool
	{
		return match ($this->package) {
			'pro' => false,
			default => true,
		};
	}

	public function getCost() : int
	{
		return match ($this->package) {
			'pro' => 20000,
			'business' => 100000,
			default => $this->contribution_amount * 100,
		};
	}

	public function getVATCost() : int
	{
		return (int) ($this->getCost() * $this->country->getVATPercentage());
	}
}
?>
