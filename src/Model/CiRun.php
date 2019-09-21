<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class CiRun
{
	public $run;
	public $runId;

	public function __construct(\stdClass $run, string $runId)
	{
		$this->run = $run;
		$this->runId = $runId;
	}
}
?>
