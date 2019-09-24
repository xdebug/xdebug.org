<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class SupportLogDayReport
{
	public $day;
	public $type;
	public $description;
	public $hours;

	public function __construct(
		int $day,
		string $type,
		string $description,
		string $hours
	) {
		$this->day = $day;
		$this->type = $type;
		$this->description = $description;
		$this->hours = $hours;
	}
}
?>
