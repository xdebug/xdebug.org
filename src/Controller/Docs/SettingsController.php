<?php
namespace XdebugDotOrg\Controller\Docs;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\Setting;
use XdebugDotOrg\Model\Settings;
use XdebugDotOrg\Controller\DocsController;

class SettingsController
{
	private const SETTINGS = [
		'mode' => [
			'string', 'display', null,
			-1
		],

		'collect_vars' => [
			'boolean', 'false', null,
			\FUNC_STACK_TRACE
		],

		'force_display_errors' => [
			'integer', 0, null,
			\FUNC_BASIC
		],
		'force_error_reporting' => [
			'integer', 0, null,
			\FUNC_BASIC
		],
		'halt_level' => [
			'integer', 0, null,
			\FUNC_BASIC
		],
		'max_nesting_level' => [
			'integer', 256, null,
			\FUNC_BASIC
		],
		'max_stack_frames' => [
			'integer', -1, null,
			\FUNC_BASIC
		],

		'show_error_trace' => [
			'integer', 0, null,
			\FUNC_STACK_TRACE
		],

		'show_exception_trace' => [
			'integer', 0, null,
			\FUNC_STACK_TRACE
		],

		'show_local_vars' => [
			'integer', 0, null,
			\FUNC_STACK_TRACE
		],

		'show_mem_delta' => [
			'integer', 0, null,
			\FUNC_STACK_TRACE | \FUNC_FUNCTION_TRACE
		],

		'var_display_max_children' => [
			'integer', 128, null,
			\FUNC_STACK_TRACE | \FUNC_FUNCTION_TRACE | \FUNC_VAR_DUMP
		],

		'var_display_max_data' => [
			'integer', 512, null,
			\FUNC_STACK_TRACE | \FUNC_FUNCTION_TRACE | \FUNC_VAR_DUMP
		],

		'var_display_max_depth' => [
			'integer', 3, null,
			\FUNC_STACK_TRACE | \FUNC_FUNCTION_TRACE | \FUNC_VAR_DUMP
		],

		'cli_color' => [
			'integer', 0, '>= 2.2',
			\FUNC_STACK_TRACE | \FUNC_VAR_DUMP
		],

		'collect_assignments' => [
			'boolean', 'false', '>= 2.1',
			\FUNC_FUNCTION_TRACE
		],

		'collect_includes' => [
			'boolean', 'true', null,
			\FUNC_FUNCTION_TRACE | \FUNC_STACK_TRACE
		],

		'collect_params' => [
			'integer', 0, null,
			\FUNC_FUNCTION_TRACE | \FUNC_STACK_TRACE
		],

		'collect_return' => [
			'boolean', 'false', null,
			\FUNC_FUNCTION_TRACE,
		],

		'trace_format' => [
			'integer', 0, null,
			\FUNC_FUNCTION_TRACE
		],

		'trace_options' => [
			'integer', 0, null,
			\FUNC_FUNCTION_TRACE
		],

		'output_dir' => [
			'string', '/tmp', null,
			\FUNC_FUNCTION_TRACE | \FUNC_PROFILER | \FUNC_GARBAGE_COLLECTION
		],

		'trace_output_name' => [
			'string', 'trace.%c', null,
			\FUNC_FUNCTION_TRACE
		],

		'start_with_request' => [
			'string', 'default', null,
			\FUNC_BASIC | \FUNC_REMOTE | \FUNC_PROFILER | \FUNC_GARBAGE_COLLECTION | \FUNC_FUNCTION_TRACE
		],

		'trigger_value' => [
			'string', '""', null,
			\FUNC_BASIC | \FUNC_REMOTE | \FUNC_PROFILER | \FUNC_FUNCTION_TRACE
		],

		'idekey' => [
			'string', '*complex*', null,
			\FUNC_REMOTE
		],

		'remote_addr_header' => [
			'string', '""', '>= 2.4',
			\FUNC_REMOTE
		],

		'remote_cookie_expire_time' => [
			'integer', 3600, '>= 2.1',
			\FUNC_REMOTE
		],

		'remote_connect_back' => [
			'boolean', 'false', '>= 2.1',
			\FUNC_REMOTE
		],

		'remote_handler' => [
			'string', 'dbgp', '< 2.9',
			\FUNC_REMOTE
		],

		'remote_host' => [
			'string', 'localhost', null,
			\FUNC_REMOTE
		],

		'remote_log' => [
			'string', '', null,
			\FUNC_REMOTE
		],

		'remote_log_level' => [
			'integer', '7', '>= 2.8',
			\FUNC_REMOTE
		],

		'remote_port' => [
			'integer', 9000, null,
			\FUNC_REMOTE
		],

		'remote_timeout' => [
			'integer', 200, '>= 2.6',
			\FUNC_REMOTE
		],

		'profiler_append' => [
			'integer', 0, null,
			\FUNC_PROFILER
		],

		'profiler_aggregate' => [
			'integer', 0, '< 2.9',
			\FUNC_PROFILER
		],

		'profiler_output_name' => [
			'string', 'cachegrind.out.%p', null,
			\FUNC_PROFILER
		],
		
		'gc_stats_output_name' => [
			'string', 'gcstats.%p', '>= 2.6',
			\FUNC_GARBAGE_COLLECTION
		],

		'dump.*' => [
			'string', "Empty", null,
			\FUNC_STACK_TRACE
		],

		'dump_globals' => [
			'boolean', 'true', null,
			\FUNC_STACK_TRACE
		],

		'dump_once' => [
			'boolean', 'true', null,
			\FUNC_STACK_TRACE
		],

		'dump_undefined' => [
			'boolean', 'false', null,
			\FUNC_STACK_TRACE
		],

		'overload_var_dump' => [
			'integer', 2, '> 2.1',
			\FUNC_VAR_DUMP
		],

		'file_link_format' => [
			'string', '', '>= 2.1',
			\FUNC_STACK_TRACE
		],

		'filename_format' => [
			'string', '...%s%n', '>= 2.6',
			\FUNC_STACK_TRACE
		],

		'scream' => [
			'boolean', 'false', '>= 2.1',
			\FUNC_BASIC
		],
	];

	public static function single(Setting $setting) : HtmlResponse
	{
		return new HtmlResponse($setting, 'docs/setting.php');
	}

	public static function all() : HtmlResponse
	{
		$functions = self::getRelatedSettings(null);

		return new HtmlResponse(new Settings($functions), 'docs/all_settings.php');
	}

	/**
	 * @return Setting[]
	 */
	public static function getRelatedSettings(?int $func, ?bool $addLinks = true) : array
	{
		if ($func !== null) {
			$settings = array_filter(
				self::SETTINGS,
				function (array $setting) use ($func) {
					return (bool)($func & $setting[3]);
				}
			);
		} else {
			$settings = self::SETTINGS;
		}

		ksort($settings);

		$models = [];

		foreach ($settings as $name => $setting) {
			$type = $setting[0];
			$default = $setting[1];
			$fileName = str_replace('*', 'asterix', $name);

			$setting_file = dirname(__DIR__, 3) . '/html/docs/include/settings/' . $fileName . '.html';

			if (!file_exists($setting_file)) {
				throw new \Exception($setting_file . ' should exist');
			}

			$text = file_get_contents($setting_file);
			if ($addLinks) {
				$text = DocsController::add_links($text);
			}
			$version = $setting[2];

			$models[] = new Setting(
				$name,
				$type,
				$default,
				$version,
				$text
			);
		}

		return $models;
	}
}
?>
