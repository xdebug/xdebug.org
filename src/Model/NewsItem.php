<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class NewsItem
{
	public $title;
	public $date;
	public $contents;

	public function __construct(
		string $title,
		\DateTimeImmutable $date,
		string $contents
	) {
		$this->title = $title;
		$this->date = $date;
		$this->contents = $contents;
	}
}
?>
