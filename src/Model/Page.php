<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Page
{
	public $title;
	public $headExtra;
	public $contents;
	/**
	 * @var array
	 */
	public $tabFields = [];

	public function __construct(
		string $title,
		string $headExtra,
		string $contents
	) {
		$this->title = $title;
		$this->headExtra = $headExtra;
		$this->contents = $contents;
	}
}
?>
