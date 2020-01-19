<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class SupportLog
{
	public $reports;

	/**
	 * @param SupportLogMonthReport[] $reports
	 */
	public function __construct(
		array $reports
	) {
		$this->reports = $reports;
	}
}
?>
