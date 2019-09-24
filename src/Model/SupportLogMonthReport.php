<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class SupportLogMonthReport
{
	public $start;
	public $others;
	public $company;
	public $basic;
	public $patreon;
	public $days;
	public $totalHours;
	public $url;

	/**
	 * @param array<SupportLogDayReport>  $days
	 * @param array<string, string>  $totalHours
	 */
	public function __construct(
		\DateTimeImmutable $start,
		string $others,
		string $company,
		string $basic,
		string $patreon,
		array $days,
		array $totalHours,
		?string $url
	) {
		$this->start = $start;
		$this->others = $others;
		$this->company = $company;
		$this->basic = $basic;
		$this->patreon = $patreon;
		$this->days = $days;
		$this->totalHours = $totalHours;
		$this->url = $url;
	}
}
?>
