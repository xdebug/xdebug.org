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
	) {}

	public function getCost() : int
	{
		$sd = new SubscriptionData(package: $this->package);

		return $sd->getCost();
	}
}
?>
