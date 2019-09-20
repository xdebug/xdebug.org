<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class FunctionDescription
{
	public $name;
	public $short_description;
	public $long_description;
	public $return_type;
	public $arguments;
	public $type;
	public $version;

	public function __construct(
		string $name,
		string $short_description,
		string $long_description,
		?string $version,
		string $return_type,
		?string $arguments,
		int $type
	) {
		$this->name = $name;
		$this->short_description = $short_description;
		$this->long_description = $long_description;
		$this->return_type = $return_type;
		$this->arguments = $arguments;
		$this->type = $type;
		$this->version = $version;
	}
}
?>
