<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\DocsSection;
use XdebugDotOrg\Model\DocsSections;

class DocsController
{
	private const SECTIONS = [
		'install' => [
			'Installation',
			\FUNC_INSTALL,
			'This section describes on how to install Xdebug.',
		],
		'develop' => [
			'Development Aids',
			\FUNC_BASIC | \FUNC_VAR_DUMP | \FUNC_STACK_TRACE,
			'Xdebug\'s development aids help you get better error messages and
			obtain better information from PHP\'s built-in functions. The aids
			include an upgraded <code>var_dump()</code> function; location,
			stack, and argument information upon Notices, Warnings and
			Exceptions; and numerous functions and settings to tweak PHP\'s
			behaviour.',
			[ 'tabfields' => [ 'demosettings', 'collectparams', 'othersettings' ] ]
		],
		'trace' => [
			'Function Trace',
			\FUNC_FUNCTION_TRACE,
			'Xdebug allows you to log all function calls, including parameters and
			return values to a file in different formats.',
			[ 'tabfields' => [ 'collectparams', 'othersettings' ] ]
		],
		'code_coverage' => [
			'Code Coverage Analysis',
			\FUNC_CODE_COVERAGE,
			'Code coverage tells you which lines of script (or set of scripts) have
			been executed during a request. With this information you can for
			example find out how good your unit tests are.',
		],
		'garbage_collection' => [
			'Garbage Collection Statistics',
			\FUNC_GARBAGE_COLLECTION,
			'Xdebug\'s built-in garbage collection statistics profiler allows you to
			find out when the PHP internal garbage collector triggers, how many variables
			it was able to clean up, how long it took, and how how much memory was actually freed.',
		],
		'profiler' => [
			'Profiling',
			\FUNC_PROFILER,
			'Xdebug\'s built-in profiler allows you to find bottlenecks in your
			script and visualize those with an external tool such as KCacheGrind or
			WinCacheGrind.',
		],
		'step_debug' => [
			'Step Debugging',
			\FUNC_STEP_DEBUG,
			"Xdebug's step debugger allows you to interactively walk through your code to
debug control flow and examine data structures.",
		],
		'dbgpClient' => [
			'Command Line Debug Client',
			0,
			'The command line debug client allows you to debug PHP scripts
			without having to set up an IDE.',
		],
		'dbgpProxy' => [
			'DBGp Proxy Tool',
			0,
			'This tool allows you to proxy and route debugging request to IDEs depending on which IDE key is in use.',
		],
		'compat' => [
			'Supported Versions and Compatibility',
			0,
			'This page lists which versions of Xdebug are still supported, and with which versions of PHP they can be used.',
		],
		'upgrade_guide' => [
			'Upgrading from Xdebug 2 to 3',
			0,
			'An upgrade guide detailing which changes there are between Xdebug 2 and 3, and how to reconfigure your set-up to do similar things.',
		],
		'faq' => [
			'FAQ',
			0,
			'Frequently Asked Questions',
		],
		'errors' => [
			'Description of errors',
			0,
			'This section lists all errors that show up in the PHP and diagnostic logs.',
		],
		'contributing' => [
			'Contributing',
			0,
			'',
		],
		'dbgp' => [
			'DBGP - A common debugger protocol specification',
			0,
			''
		],
	];


	public static function index() : HtmlResponse
	{
		$models = [];

		foreach (self::SECTIONS as $name => $section) {
			$models[] = new DocsSection(
				$section[0],
				$section[2],
				'/docs/' . $name
			);
		}

		return new HtmlResponse(new DocsSections($models), 'docs/index.php');
	}

	public static function section(string $section) : HtmlResponse
	{
		if (!isset(self::SECTIONS[$section])) {
			throw new \Exception('bad');
		}

		$data = self::SECTIONS[$section];

		$section_file = dirname(__DIR__, 2) . '/html/docs/include/features/' . $section . '.html';

		if (!file_exists($section_file)) {
			throw new \Exception($section_file . ' should exist');
		}

		$model = new DocsSection(
			$data[0],
			$data[2],
			'/docs/' . $section,
			self::add_links(file_get_contents( $section_file )),
			Docs\SettingsController::getRelatedSettings($data[1]),
			Docs\FunctionsController::getRelatedFunctions($data[1]),
			$data[3]['tabfields'] ?? []
		);

		return new HtmlResponse($model, 'docs/section.php');
	}

	public static function sectionHead(object $model) : HtmlResponse
	{
		return new HtmlResponse($model, 'docs/section_head.php');
	}

	public static function add_links(string $text) : string
	{
		$text = preg_replace( '/\[FUNC:([^\]]*?)\]/', '<a href="/docs/all_functions#\1">\1()</a>', $text );
		$text = preg_replace( '/\[CFG:([^\]]*?):([^\]]*?)\]/', '<a href="/docs/all_settings#\1">\2</a>', $text );
		$text = preg_replace( '/\[CFG:([^\]]*?)\]/', '<a href="/docs/all_settings#\1">xdebug.\1</a>', $text );
		$text = preg_replace( '/\[CFGS:([^\]]*?)\]/', '<a href="/docs/all_settings#\1">\1</a>', $text );
		$text = preg_replace_callback(
			'/\[FEAT:([^\]]*?)(#[^\]]*)?\]/',
			function (array $matches) {
				if (!array_key_exists(2, $matches)) {
					$matches[2] = '';
				}
				return "<a href='/docs/{$matches[1]}{$matches[2]}'>". self::SECTIONS[$matches[1]][0] . '</a>';
			},
			$text
		);
		$text = self::add_keywords( $text );
		return $text;
	}

	public static function process_macros_without_links(string $text) : string
	{
		$text = preg_replace( '/\[FUNC:([^\]]*?)\]/', '\1()', $text );
		$text = preg_replace( '/\[CFG:([^\]]*?):([^\]]*?)\]/', '\2', $text );
		$text = preg_replace( '/\[CFG:([^\]]*?)\]/', 'xdebug.\1', $text );
		$text = preg_replace( '/\[CFGS:([^\]]*?)\]/', '\1', $text );
		$text = preg_replace_callback(
			'/\[FEAT:([^\]]*?)(#[^\]]*)?\]/',
			function (array $matches) {
				if (!array_key_exists(2, $matches)) {
					$matches[2] = '';
				}
				return self::SECTIONS[$matches[1]][0];
			},
			$text
		);
		$text = self::add_keywords( $text );
		return $text;
	}

	public static function add_keywords(string $text) : string
	{
		$text = str_replace( '[KW:last_release_version]', '3.0.2', $text );
		$text = str_replace( '[KW:last_dev_version]',     '3.1.0-dev', $text );
		return $text;
	}
}
?>
