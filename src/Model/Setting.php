<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class Setting
{
	public $name;
	public $type;
	public $default;
	public $version;
	public $text;

	public function __construct(
		string $name,
		string $type,
		string $default,
		?string $version,
		string $text
	) {
		$this->name = $name;
		$this->type = $type;
		$this->default = $default;
		$this->version = $version;
		$this->text = $text;
	}
}
?>
