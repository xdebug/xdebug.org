<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class FundingProjectUpdates
{
	public $project;
	public $items;

	/**
	 * @param FundingProjectUpdates[] $items
	 */
	public function __construct(string $project, array $items)
	{
		$this->project = $project;
		$this->items = $items;
	}
}
?>
