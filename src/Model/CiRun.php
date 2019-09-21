<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class CiRun
{
	public $result;

	public function __construct(\stdClass $result)
	{
		$this->result = $result;
	}
}
?>
