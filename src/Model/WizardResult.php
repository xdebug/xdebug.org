<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class WizardResult
{
	public $x;

	public function __construct(
		\XdebugDotOrg\XdebugVersion $x
	) {
		$this->x = $x;
	}
}
?>
