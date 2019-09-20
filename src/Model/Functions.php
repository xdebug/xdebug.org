<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Functions
{
	public $functions;

	/**
	 * @param FunctionDescription[] $functions
	 */
	public function __construct(
		array $functions
	) {
		$this->functions = $functions;
	}
}
?>
