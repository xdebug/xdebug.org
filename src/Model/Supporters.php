<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Supporters
{
	public $supporters;

	/**
	 * @param array<int, array{0: string, 1: string, 2: ?string, 3: bool}> $supporters
	 */
	public function __construct(
		array $supporters
	) {
		$this->supporters = $supporters;
	}
}
?>
