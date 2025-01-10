<?php
namespace XdebugDotOrg\Controller\Docs;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\FunctionDescription;
use XdebugDotOrg\Model\Functions;
use XdebugDotOrg\Controller\DocsController;

class FunctionsController
{
	/**
	 * @var ?array<int, FunctionDescription>
	 */
	private static $functions = null;

	public static function single(FunctionDescription $function) : HtmlResponse
	{
		return new HtmlResponse($function, 'docs/function.php');
	}

	public static function singleLine(FunctionDescription $function) : HtmlResponse
	{
		return new HtmlResponse($function, 'docs/function_line.php');
	}

	/**
	 * @return array<int, FunctionDescription>
	 */
	private static function getFunctions() : array
	{
		if (self::$functions !== null) {
			return self::$functions;
		}

		$functions = [];

		$function_include_dir = dirname( __DIR__, 3) . '/html/docs/include/functions/';

		if (!file_exists($function_include_dir )) {
			throw new \Exception($function_include_dir . ' should exist');
		}

		$f = glob( $function_include_dir . '*' );

		foreach ( $f as $filename ) {
			if ( !is_file( $filename ) ) {
				continue;
			}

			$contents = file( $filename );
			$function = trim( $contents[0], "= \n" );
			$version = null;

			if (str_contains( $function, ',' )) {
				[$function, $version] = explode( ',', $function );
			}

			$arguments = trim( $contents[3] );

			$functions[] = new FunctionDescription(
				$function,
				DocsController::add_links(trim( $contents[1] )),
				self::do_format_data( $function, array_slice( $contents, 6 ) ),
				$version,
				trim( $contents[2] ),
				$arguments && $arguments !== 'none' ? $arguments : null,
				constant( trim( $contents[4] ) )
			);
		}

		return $functions;
	}

	/**
	 * @return FunctionDescription[]
	 */
	public static function getRelatedFunctions(int $func) : array
	{
		$functions = array_filter(
			self::getFunctions(),
			fn($function) => $func & $function->type
		);

		ksort($functions);

		return $functions;
	}

	public static function all() : HtmlResponse
	{
		$functions = self::getFunctions();

		ksort($functions);

		return new HtmlResponse(new Functions($functions), 'docs/all_functions.php');
	}

	private static function do_format_data_TXT(array $data) : string
	{
		return "<p>\n". DocsController::add_links( implode( ' ', $data ) ). "\n</p>";
	}

	private static function do_format_data_RESULT(array $data) : string
	{
		return "<div class='example-returns'><h4>Returns:</h4><pre>\n" . trim(implode( '', $data )) . "</pre></div>\n";
	}

	private static function do_format_data_EXAMPLE(array $data) : string
	{
		return "<div class='example'><h4>Example:</h4>\n" . highlight_string( trim(implode( '', $data )), true ) . "</div>\n";
	}

	private static function formatDataByState(array $data, string $state) : string {
		if ($state === 'TXT') {
			return self::do_format_data_TXT($data);
		}

		if ($state === 'EXAMPLE') {
			return self::do_format_data_EXAMPLE($data);
		}

		if ($state === 'RESULT') {
			return self::do_format_data_RESULT($data);
		}

		throw new \Exception('bad');
	}

	private static function formatSectionHeader(string $function, string $line) : string
	{
		$title = trim( substr( $line, strlen( 'SECTION:' ) ) );
		$anchor = preg_replace( '/_+/', '_', $function . '-' . trim( preg_replace( '/[^a-z0-9]/', '_', strtolower( $title ) ), '_' ) );

		return "<hr class='section'/>\n".
			"<a name='{$anchor}'></a>\n" .
			"<h4 class='section'>{$title} <a href='#{$anchor}'>#</a></h4>\n";
	}

	private static function do_format_data(string $function, array $contents) : string
	{
		$state = null;
		$data = [];
		$formatted_data = '';
		foreach( $contents as $line )
		{
			if ( str_starts_with((string) $line, 'TXT:') )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$state = 'TXT';
				continue;
			}
			if ( str_starts_with((string) $line, 'EXAMPLE:') )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$state = 'EXAMPLE';
				continue;
			}
			if ( str_starts_with((string) $line, 'RESULT:') )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$state = 'RESULT';
				continue;
			}
			if ( str_starts_with((string) $line, 'SECTION:') )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$formatted_data .= self::formatSectionHeader( $function, $line );
				$state = null;
				continue;
			}
			$data[] = $line;
		}
		if ( $state ) {
			$formatted_data .= self::formatDataByState( $data, $state );
			$data = [];
		}
		return $formatted_data;
	}
}
?>
