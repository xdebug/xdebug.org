<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Supporters
{
	public $supporters;

	/**
	 * @param array<int, array{0: string, 1: string}> $supporters
	 */
	public function __construct(
		array $supporters
	) {
		$this->supporters = $supporters;
	}
}
?>
