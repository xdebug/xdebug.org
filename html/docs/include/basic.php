<?php
define( 'ONE', 1 );
define( 'TWO', 2 );

define( 'FUNC_INSTALL',          0x0000800 );
define( 'FUNC_BASIC',            0x0001000 );
define( 'FUNC_STACK_TRACE',      0x0002000 ); // affects stack traces
define( 'FUNC_REMOTE',           0x0004000 ); // affects remote debugging
define( 'FUNC_FUNCTION_TRACE',   0x0008000 ); // affects function traces
define( 'FUNC_VAR_DUMP',         0x0010000 ); // affects overloaded var_dump function
define( 'FUNC_PROFILER',         0x0020000 ); // affects overloaded var_dump function
define( 'FUNC_CODE_COVERAGE',    0x0040000 );

define( 'FUNC_ALL',              0x007ffff );

function add_keywords( $text )
{
	$text = str_replace( '[KW:last_release_version]', '2.0.5', $text );
	$text = str_replace( '[KW:last_dev_version]', '2.1.0beta1', $text );
	return $text;
}

function add_links( $text )
{
	$text = preg_replace( '/\[FUNC:([^\]]*?)\]/', '<a href="/docs/all_functions#\1">\1()</a>', $text );
	$text = preg_replace( '/\[CFG:([^\]]*?):([^\]]*?)\]/', '<a href="/docs/all_settings#\1">\2</a>', $text );
	$text = preg_replace( '/\[CFG:([^\]]*?)\]/', '<a href="/docs/all_settings#\1">xdebug.\1</a>', $text );
	$text = preg_replace( '/\[CFGS:([^\]]*?)\]/', '<a href="/docs/all_settings#\1">\1</a>', $text );
	$text = preg_replace( '/\[FEAT:([^\]]*?)\]/e', "'<a href=\"/docs/\\1\">'. \$GLOBALS['features']['\\1'][0] . '</a>'", $text );
	$text = add_keywords( $text );
	return $text;
}

function do_related_settings( $func )
{
	ksort( $GLOBALS['settings'] );
	$settings = '';
	foreach ( $GLOBALS['settings'] as $name => $setting )
	{
		if ( ( $func & $setting[4] ) )
		{
			$settings .= "<a name='{$name}'></a>\n";
			$settings .= "<hr class='light'/>\n";
			$type = $setting[0];
			$default = $setting[1];

			$text = add_links( $setting[3] );
			$settings .= "<div class='name'>xdebug.{$name}</div>\n";
			$settings .= "Type: <span class='type'>{$type}</span>, ";
			$settings .= "Default value: <span class='default'>{$default}</span>";
			if (is_string($setting[2])) {
				$settings .= ", Introduced in <span class='type'>Xdebug {$setting[2]}</span>";
			}
			$settings .= "\n";
			$settings .= "<div class='description'>{$text}</div>\n";
		}
	}
	if ( empty( $settings ) )
	{
		return;
	}

	echo '<h2>Related Settings</h2>';
	echo "<div class='settings'>\n";
	echo $settings;
	echo "</div>\n";
	echo "<hr />\n";
}

function get_func_info()
{
	$functions = array();
	$f = glob( dirname( __FILE__ ) . '/functions/*' );
	foreach ( $f as $filename )
	{
		if ( !is_file( $filename ) )
		{
			continue;
		}
		$contents = file( $filename );
		$function = trim( $contents[0], "= \n" );
		$new_func = array();
		$new_func['short_desc'] = trim( $contents[1] );
		$new_func['return_type'] = trim( $contents[2] );
		$new_func['arguments'] = trim( $contents[3] );
		$new_func['function'] = constant( trim( $contents[4] ) );
		$new_func['data'] = do_format_data( array_slice( $contents, 6 ) );
		$functions[$function] = $new_func;
	}
	return $functions;
}

function do_format_data_TXT( $data )
{
	return "<p>\n". add_links( implode( ' ', $data ) ). "\n</p>";
}

function do_format_data_RESULT( $data )
{
	return "<div class='example-returns'><strong>Returns:</strong><br /><br /><pre>\n" . implode( '', $data ) . "</pre></div>\n";
}

function do_format_data_EXAMPLE( $data )
{
	return "<div class='example'><strong>Example:</strong><br /><br />\n" . highlight_string( implode( '', $data ), true ) . "</div>\n";
}

function do_format_data( $contents )
{
	$state = null;
	$data = array();
	$formatted_data = '';
	foreach( $contents as $line )
	{
		if ( substr( $line, 0, 4 ) == 'TXT:' )
		{
			if ( $state ) {
				$f = "do_format_data_$state";
				$formatted_data .= $f( $data );
				$data = array();
			}
			$state = 'TXT';
			continue;
		}
		if ( substr( $line, 0, 8 ) == 'EXAMPLE:' )
		{
			if ( $state ) {
				$f = "do_format_data_$state";
				$formatted_data .= $f( $data );
				$data = array();
			}
			$state = 'EXAMPLE';
			continue;
		}
		if ( substr( $line, 0, 7 ) == 'RESULT:' )
		{
			if ( $state ) {
				$f = "do_format_data_$state";
				$formatted_data .= $f( $data );
				$data = array();
			}
			$state = 'RESULT';
			continue;
		}
		$data[] = $line;
	}
	if ( $state ) {
		$f = "do_format_data_$state";
		$formatted_data .= $f( $data );
		$data = array();
	}
	return $formatted_data;
}

function do_related_functions( $func )
{
	$functions = '';
	$GLOBALS['functions'] = get_func_info();
	foreach ( $GLOBALS['functions'] as $name => $function )
	{
		if ( ( $func & $function['function'] ) )
		{
			$functions .= "<a name='{$name}'></a>\n";
			$functions .= "<hr class='light'/>\n";

			$text = add_links( $function['short_desc'] );
			if ( $function['arguments'] === 'none' )
			{
				$functions .= "<div class='name'><span class='type'>{$function['return_type']}</span> {$name}( )</div>\n";
			}
			else
			{
				$functions .= "<div class='name'><span class='type'>{$function['return_type']}</span> {$name}( <span class='type'>{$function['arguments']}</span> )</div>\n";
			}
			$functions .= "<div class='short-description'>{$text}</div>\n";
			$functions .= "<div class='description'>\n";
			$functions .= $function['data'];
			$functions .= "</div>\n";
		}
	}
	if ( empty( $functions ) )
	{
		return;
	}
	echo '<h2>Related Functions</h2>';
	echo "<div class='functions'>\n";
	echo $functions;
	echo "</div>\n";
	echo "<hr />\n";
}
