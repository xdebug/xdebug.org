<?php
namespace XdebugDotOrg\Core;

class JsonResponse extends \StdClass
{
	public $model;

	public function __construct(?object $model)
	{
		$this->model = $model;
	}

	public function render() : void
	{
		header('Content-Type: application/json');
		echo json_encode($this->model);
	}
}
?>
