<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class CiMatrix
{
	public $matrix;
	public $phpVersions;
	public $abbrevs;

	/**
	 * @param array<string, object{abbrev: string, ts: int}> $abbrevs
	 * @param array<string> $phpVersions
	 * @param array<string, array<string, array<string, object>>> $matrix
	 */
	public function __construct(array $matrix, array $phpVersions, array $abbrevs)
	{
		$this->matrix = $matrix;
		$this->phpVersions = $phpVersions;
		$this->abbrevs = $abbrevs;
	}
}
?>
