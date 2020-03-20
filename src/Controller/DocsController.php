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
		'basic' => [
			'Basic Features',
			\FUNC_BASIC,
			'Xdebug\'s basic functions include the display of stack traces on error
			conditions, maximum nesting level protection and time tracking.',
		],
		'display' => [
			'Variable Display Features',
			\FUNC_VAR_DUMP,
			'Xdebug replaces PHP\'s var_dump() function for displaying variables.
			Xdebug\'s version includes different colors for different types and
			places limits on the amount of array elements/object properties,
			maximum depth and string lengths. There are a few other functions
			dealing with variable display as well.',
			[ 'tabfields' => [ 'demosettings' ] ]
		],
		'stack_trace' => [
			'Stack Traces',
			\FUNC_STACK_TRACE,
			'When Xdebug is activated it will show a stack trace whenever PHP
			decides to show a notice, warning, error etc. The information that
			stack traces display, and the way how they are presented, can be
			configured to suit your needs.',
			[ 'tabfields' => [ 'collectparams', 'othersettings' ] ]
		],
		'execution_trace' => [
			'Function Traces',
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
			'Profiling PHP Scripts',
			\FUNC_PROFILER,
			'Xdebug\'s built-in profiler allows you to find bottlenecks in your
			script and visualize those with an external tool such as KCacheGrind or
			WinCacheGrind.',
		],
		'remote' => [
			'Step Debugging',
			\FUNC_REMOTE,
			'Xdebug provides an interface for debugger clients that interact with
			running PHP scripts. This section explains how to set-up PHP and Xdebug
			to allow this, and introduces a few clients.',
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
			'Compatibility',
			0,
			'Xdebug and PHP version compatibility',
		],
		'faq' => [
			'FAQ',
			0,
			'Frequently Asked Questions',
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
			'/\[FEAT:([^\]]*?)(#.*)?\]/',
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
			'/\[FEAT:([^\]]*?)(#.*)?\]/',
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
		$text = str_replace( '[KW:last_release_version]', '2.9.3', $text );
		$text = str_replace( '[KW:last_dev_version]',     '3.0.0dev', $text );
		return $text;
	}
}
?>
