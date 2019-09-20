<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class NewsItems
{
	public $items;

	/**
	 * @param NewsItem[] $items
	 */
	public function __construct(array $items)
	{
		$this->items = $items;
	}
}
?>
