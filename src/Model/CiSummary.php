<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class CiSummary
{
	public array $summary;

	public function __construct(array $summary)
	{
		$this->summary = $summary;
	}
}
?>
