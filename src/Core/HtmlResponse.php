<?php
namespace XdebugDotOrg\Core;

class HtmlResponse
{
	public $model;
	public $view;

	public function __construct(?object $model, string $view)
	{
		$this->model = $model;
		$this->view = $view;
	}

	public function render() : string
	{
		if ($this->model) {
			foreach ($this->model as $property_name => $value) {
				if ($property_name === 'model' || $property_name === 'view') {
					throw new \Exception('bad');
				}

				$this->$property_name = $value;
			}
		}

		$view_file_path = dirname(__DIR__, 2) . '/views/' . $this->view;

		if (!file_exists($view_file_path)) {
			throw new \UnexpectedValueException('view ' . $view_file_path . ' does not exist');
		}

		ob_start();

		try {
			/** @psalm-suppress UnresolvableInclude */
			require($view_file_path);
		}
		catch (\Throwable $e) {
			ob_end_clean();
			throw $e;
		}

		   return ob_get_clean();
	}
}
?>
