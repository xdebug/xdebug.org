<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class SupportLogMonthReport
{
	public $start;
	public $others;
	public $business;
	public $pro;
	public $patreon;
	public $github;
	public $days;
	public $totalHours;
	public $url;

	/**
	 * @param array<SupportLogDayReport>  $days
	 * @param array<string, float>  $totalHours
	 */
	public function __construct(
		\DateTimeImmutable $start,
		string $others,
		string $business,
		string $pro,
		string $patreon,
		string $github,
		array $days,
		array $totalHours,
		?string $url
	) {
		$this->start = $start;
		$this->others = $others;
		$this->business = $business;
		$this->pro = $pro;
		$this->patreon = $patreon;
		$this->github = $github;
		$this->days = $days;
		$this->totalHours = $totalHours;
		$this->url = $url;
	}
}
?>
