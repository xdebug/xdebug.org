<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class SupportLog
{
	public $reports;
	public $supporters;

	/**
	 * @param SupportLogMonthReport[] $reports
	 * @param array<int, array{0: string, 1: string}> $supporters
	 */
	public function __construct(
		array $reports,
		array $supporters
	) {
		$this->reports = $reports;
		$this->supporters = $supporters;
	}
}
?>
