<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Downloads
{
	public $downloads;

	/**
	 * @param Download[] $downloads
	 */
	public function __construct(array $downloads)
	{
		$this->downloads = $downloads;
	}
}
?>
