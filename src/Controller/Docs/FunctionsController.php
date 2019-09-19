<?php
namespace XdebugDotOrg\Controller\Docs;

use XdebugDotOrg\Core\HtmlResponse;
use XdebugDotOrg\Model\FunctionDescription;
use XdebugDotOrg\Model\Functions;
use XdebugDotOrg\Controller\DocsController;

class FunctionsController
{
	/**
	 * @var array
	 */
	private static $functions = null;

	public function single(FunctionDescription $function) : HtmlResponse
	{
		return new HtmlResponse($function, 'docs/function.php');
	}

	/**
	 * @return array<string, FunctionDescription>
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

			if (strpos( $function, ',' ) !== false) {
				list( $function, $version ) = explode( ',', $function );
			}

			$arguments = trim( $contents[3] );

			$functions[] = new FunctionDescription(
				$function,
				DocsController::add_links(trim( $contents[1] )),
				self::do_format_data( array_slice( $contents, 6 ) ),
				$version,
				trim( $contents[2] ),
				$arguments && $arguments !== 'none' ? $arguments : null,
				constant( DocsController::class . '::' . trim( $contents[4] ) )
			);
		}

		return $functions;
	}

	/**
	 * @return Setting[]
	 */
	public static function getRelatedFunctions(int $func) : array
	{
		$functions = array_filter(
			self::getFunctions(),
			function ($function) use ($func) {
				return $func & $function->type;
			}
		);

		ksort($functions);

		return $functions;
	}


	/**
	 * @return Setting[]
	 */
	public static function all() : HtmlResponse
	{
		$functions = self::getFunctions();

		ksort($functions);

		return new HtmlResponse(new Functions($functions), 'docs/all_functions.php');
	}

	private static function do_format_data_TXT(array $data)
	{
		return "<p>\n". DocsController::add_links( implode( ' ', $data ) ). "\n</p>";
	}

	private static function do_format_data_RESULT(array $data)
	{
		return "<div class='example-returns'><strong>Returns:</strong><br /><br /><pre>\n" . implode( '', $data ) . "</pre></div>\n";
	}

	private static function do_format_data_EXAMPLE(array $data)
	{
		return "<div class='example'><strong>Example:</strong><br /><br />\n" . highlight_string( implode( '', $data ), true ) . "</div>\n";
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

	private static function do_format_data(array $contents)
	{
		$state = null;
		$data = [];
		$formatted_data = '';
		foreach( $contents as $line )
		{
			if ( substr( $line, 0, 4 ) == 'TXT:' )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$state = 'TXT';
				continue;
			}
			if ( substr( $line, 0, 8 ) == 'EXAMPLE:' )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$state = 'EXAMPLE';
				continue;
			}
			if ( substr( $line, 0, 7 ) == 'RESULT:' )
			{
				if ( $state ) {
					$formatted_data .= self::formatDataByState( $data, $state );
					$data = [];
				}
				$state = 'RESULT';
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
