<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class WizardFailure
{
	public $reason;

	public function __construct(
		string $reason
	) {
		$this->reason = $reason;
	}
}
?>
