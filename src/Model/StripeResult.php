<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
readonly class StripeResult
{
	public function __construct(
		public bool $success,
		public string $reason,
		public string $package = 'pro',
		public ?array $projects = [],
		public ?int $contribution_amount = 100,
	) {}

	public function getName() : string
	{
		$sd = new SubscriptionData(package: $this->package, projects: $this->projects);

		return $sd->getName();
	}

	public function getCost() : int
	{
		$sd = new SubscriptionData(package: $this->package);

		return $sd->getCost();
	}

	public function packageProvidesLinks() : int
	{
		$sd = new SubscriptionData(package: $this->package);

		return $sd->packageProvidesLinks();
	}

	public function isOpenAmount() : int
	{
		$sd = new SubscriptionData(package: $this->package);

		return $sd->isOpenAmount();
	}
}
?>
