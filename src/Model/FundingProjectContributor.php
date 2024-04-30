<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class FundingProjectContributor
{
	public function __construct(
		public string $link,
		public string $name,
		public ?string $logo,
		public bool $both,
		public float $amount
	) {}
}
?>
