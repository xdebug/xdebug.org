<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Page
{
	public $title;
	public $contents;
	/**
	 * @var array
	 */
	public $tabFields = [];

	public function __construct(
		string $title,
		string $contents
	) {
		$this->title = $title;
		$this->contents = $contents;
	}
}
?>
