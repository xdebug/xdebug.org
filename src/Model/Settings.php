<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Settings
{
	public $settings;

	/**
	 * @param Setting[] $settings
	 */
	public function __construct(
		array $settings
	) {
		$this->settings = $settings;
	}
}
?>
