<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class FundingProjectsList
{
	public $projects;

	/**
	 * @param FundingProject[] $projects
	 */
	public function __construct(
		array $projects
	) {
		$this->projects = $projects;
	}
}
?>
