<?php
namespace XdebugDotOrg\Controller\Docs;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\Setting;
use XdebugDotOrg\Model\Settings;
use XdebugDotOrg\Controller\DocsController;

class SettingsController
{
	private const SETTINGS = [
		'collect_vars' => [
			'boolean', 0, null,
			\FUNC_STACK_TRACE
		],
		'default_enable' => [
			'boolean', 1, null,
			\FUNC_BASIC
		],
		'extended_info' => [
			'integer', 1, null,
			\FUNC_REMOTE
		],
		'force_display_errors' => [
			'int', 0, ">= 2.3",
			\FUNC_BASIC
		],
		'force_error_reporting' => [
			'int', 0, ">= 2.3",
			\FUNC_BASIC
		],
		'halt_level' => [
			'int', 0, ">= 2.3",
			\FUNC_BASIC
		],
		'manual_url' => [
			'string', 'http://www.php.net', "< 2.2.1",
			\FUNC_STACK_TRACE
		],
		'max_nesting_level' => [
			'integer', 256, null,
			\FUNC_BASIC
		],
		'max_stack_frames' => [
			'integer', -1, ">= 2.3",
			\FUNC_BASIC
		],

		'show_error_trace' => [
			'integer', 0, ">= 2.4",
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

		'auto_trace' => [
			'boolean', 0, null,
			\FUNC_FUNCTION_TRACE
		],

		'collect_assignments' => [
			'boolean', 0, '>= 2.1',
			\FUNC_FUNCTION_TRACE
		],

		'collect_includes' => [
			'boolean', 1, null,
			\FUNC_FUNCTION_TRACE | \FUNC_STACK_TRACE
		],

		'collect_params' => [
			'integer', 0, null,
			\FUNC_FUNCTION_TRACE | \FUNC_STACK_TRACE
		],

		'collect_return' => [
			'boolean', 0, null,
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

		'trace_output_dir' => [
			'string', '/tmp', null,
			\FUNC_FUNCTION_TRACE
		],

		'trace_output_name' => [
			'string', 'trace.%c', null,
			\FUNC_FUNCTION_TRACE
		],

		'trace_enable_trigger' => [
			'boolean', 0, '>= 2.2',
			\FUNC_FUNCTION_TRACE
		],

		'trace_enable_trigger_value' => [
			'string', '""', '>= 2.3',
			\FUNC_FUNCTION_TRACE
		],


		'idekey' => [
			'string', '*complex*', null,
			\FUNC_REMOTE
		],

		'remote_addr_header' => [
			'string', '""', '>= 2.4',
			\FUNC_REMOTE
		],

		'remote_autostart' => [
			'boolean', 0, null,
			\FUNC_REMOTE
		],

		'remote_cookie_expire_time' => [
			'integer', 3600, '>= 2.1',
			\FUNC_REMOTE
		],

		'remote_connect_back' => [
			'boolean', 0, '>= 2.1',
			\FUNC_REMOTE
		],

		'remote_enable' => [
			'boolean', 0, null,
			\FUNC_REMOTE
		],

		'remote_handler' => [
			'string', 'dbgp', null,
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

		'remote_mode' => [
			'string', 'req', null,
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
			'integer', 0, null,
			\FUNC_PROFILER
		],

		'profiler_enable' => [
			'integer', 0, null,
			\FUNC_PROFILER
		],

		'profiler_enable_trigger' => [
			'integer', 0, null,
			\FUNC_PROFILER
		],

		'profiler_enable_trigger_value' => [
			'string', '""', '>= 2.3',
			\FUNC_PROFILER
		],

		'profiler_output_dir' => [
			'string', '/tmp', null,
			\FUNC_PROFILER
		],

		'profiler_output_name' => [
			'string', 'cachegrind.out.%p', null,
			\FUNC_PROFILER
		],

		'gc_stats_enable' => [
			'bool', 'false', '>= 2.6',
			\FUNC_GARBAGE_COLLECTION
		],

		'gc_stats_output_dir' => [
			'string', '/tmp', null,
			\FUNC_GARBAGE_COLLECTION
		],

		'gc_stats_output_name' => [
			'string', 'gcstats.%p', null,
			\FUNC_GARBAGE_COLLECTION
		],

		'dump.*' => [
			'string', "Empty", null,
			\FUNC_STACK_TRACE
		],

		'dump_globals' => [
			'boolean', 1, null,
			\FUNC_STACK_TRACE
		],

		'dump_once' => [
			'boolean', 1, null,
			\FUNC_STACK_TRACE
		],

		'dump_undefined' => [
			'boolean', 0, null,
			\FUNC_STACK_TRACE
		],

		'overload_var_dump' => [
			'boolean', 2, '> 2.1',
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
			'boolean', 0, '>= 2.1',
			\FUNC_BASIC
		],
		'coverage_enable' => [
			'boolean', 1, '>= 2.2',
			\FUNC_CODE_COVERAGE
		],
	];

	public function single(Setting $setting) : HtmlResponse
	{
		return new HtmlResponse($setting, 'docs/setting.php');
	}

	/**
	 * @return Setting[]
	 */
	public static function all() : HtmlResponse
	{
		$functions = self::getRelatedSettings(null);

		return new HtmlResponse(new Settings($functions), 'docs/all_settings.php');
	}

	/**
	 * @return Setting[]
	 */
	public static function getRelatedSettings(?int $func) : array
	{
		if ($func !== null) {
			$settings = array_filter(
				self::SETTINGS,
				function (array $setting) use ($func) {
					return $func & $setting[3];
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

			$setting_file = dirname(__DIR__, 3) . '/html/docs/include/settings/' . $name . '.html';

			if (!file_exists($setting_file)) {
				throw new \Exception($setting_file . ' should exist');
			}

			$text = DocsController::add_links(file_get_contents($setting_file));
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
