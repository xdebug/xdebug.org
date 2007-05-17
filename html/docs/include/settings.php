<?php
$settings = array(
	'collect_vars' => array(
		'boolean', 'Off', TWO,
		"This setting tells Xdebug to gather information about which variables
are used in a certain scope. This analysis can be quite slow as Xdebug has
to reverse engineer PHP's opcode arrays. This setting will not record which
values the different variables have, for that use [CFG:collect_params].
This setting needs to be enabled only if you wish to use
[FUNC:xdebug_get_declared_vars].",
		FUNC_STACK_TRACE
	),
	'default_enable' => array(
		'boolean', 'On', ONE | TWO,
		"If this setting is On then stacktraces will be shown by default on an
error event. You can disable showing stacktraces from your code with
[FUNC:xdebug_disable]. As this is one of the basic functions of Xdebug, it is
advisable to leave this setting set to 'On'.",
		FUNC_BASIC
	),
	'extended_info' => array(
		'integer', 1, ONE | TWO,
		"Controls whether Xdebug should enforce 'extended_info' mode for the PHP
parser; this allows Xdebug to do file/line breakpoints with the remote
debugger. When tracing or profiling scripts you generally want to turn off this
option as PHP's generated oparrays will increase with about a third of the size
slowing down your scripts. This setting can not be set in your scripts with
ini_set(), but only in php.ini.",
		FUNC_REMOTE
	),
	'manual_url' => array(
		'string', 'http://www.php.net', ONE | TWO,
		"This is the base url for the links from the function traces and error
message to the manual pages of the function from the message. It is advisable
to set this setting to use the closest mirror.",
		FUNC_STACK_TRACE
	),
	'max_nesting_level' => array(
		'integer', 100, ONE | TWO,
		"Controls the protection mechanism for infinite recursion protection.
The value of this setting is the maximum level of nested functions that are
allowed before the script will be aborted.",
		FUNC_BASIC
	),

	'show_exception_trace' => array(
		'integer', 0, TWO,
		"When this setting is set to 1, Xdebug will show a stack trace whenever
an exception is raised - even if this exception is actually caught.",
		FUNC_STACK_TRACE
	),

	'show_local_vars' => array(
		'integer', 9, TWO,
		"When this setting is set to something != 0 Xdebug's generated stack dumps
in error situations will also show all variables in the top-most scope. Beware
that this might generate a lot of information, and is therefore turned off by
default.",
		FUNC_STACK_TRACE
	),

	'show_mem_delta' => array( 
		'integer', 0, ONE | TWO,
		"When this setting is set to something != 0 Xdebug's human-readable
generated trace files will show the difference in memory usage between function
calls. If Xdebug is configured to generate computer-readable trace files then
they will always show this information.",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE
	),

	'var_display_max_children' => array(
		'integer', 128, TWO,
		"Controls the amount of array children and object's properties are shown
when variables are displayed with either [FUNC:xdebug_var_dump],
[CFG:show_local_vars] or through [FEAT:execution_trace].",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE | FUNC_VAR_DUMP
	),

	'var_display_max_data' => array(
		'integer', 512, TWO,
		"Controls the maximum string length that is shown
when variables are displayed with either [FUNC:xdebug_var_dump],
[CFG:show_local_vars] or through [FEAT:execution_trace].",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE | FUNC_VAR_DUMP
	),

	'var_display_max_depth' => array(
		'integer', 3, TWO,
		"Controls how many nested levels of array elements and object properties are
when variables are displayed with either [FUNC:xdebug_var_dump],
[CFG:show_local_vars] or through [FEAT:execution_trace].",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE | FUNC_VAR_DUMP
	),

	'auto_trace' => array(
		'boolean', 0, ONE | TWO,
		"When this setting is set to on, the tracing of function calls will be
enabled just before the script is run. This makes it possible to trace code in
the <a href='http://www.php.net/manual/en/configuration.directives.php#ini.auto-prepend-file'>auto_prepend_file</a>.",
		FUNC_FUNCTION_TRACE
	),

	'collect_includes' => array(
		'boolean', 1, TWO,
		"This setting, defaulting to On, controls whether Xdebug should write the
filename used in include(), include_once(), require() or require_once() to the
trace files.",
		FUNC_FUNCTION_TRACE | FUNC_STACK_TRACE
	),

	'collect_params' => array(
		'integer', 0, ONE | TWO,
		"<p>This setting, defaulting to 0, controls whether Xdebug should collect
the parameters passed to functions when a function call is recorded in either
the function trace or the stack trace.</p>
<p>The setting defaults to Off because for very large
scripts it may use huge amounts of memory and therefore make it impossible for
the huge script to run. You can most safely turn this setting on, but you can
expect some problems in scripts with a lot of function calls and/or huge data
structures as parameters. Xdebug 2 will not have this problem with increased
memory usage, as it will never store this information in memory. Instead it
will only be written to disk. This means that you need to have a look at the
disk usage though.</p>
<p>This setting can have four different values. For each of the values a
different amount of information is shown. Below you will see what information
each of the values provides. See also the introduction of the feature
[FEAT:stack_trace] for a few screenshots.</p>
<table class='table'>
<tr><th>Value</th><th>Argument Information Shown</th></tr>
<tr><td class='ctr'>0</td><td>None.</td></tr>
<tr><td class='ctr'>1</td><td>Type and number of elements (f.e. string(6), array(8)).</td></tr>
<tr><td class='ctr'>2</td><td>Type and number of elements, with a tool tip for the full information<sup><a href='#note1'>1</a></sup>.</td></tr>
<tr><td class='ctr'>3</td><td>Full variable contents (with the limits respected as set by [CFG:var_display_max_children], [CFG:var_display_max_data] and [CFG:var_display_max_depth].</td></tr>
<tr><td class='ctr'>4</td><td>Full variable contents and variable name.</td></tr>
<tr><td colspan='2'><a name='note1'><sup>1</sup></a> in the CLI version of PHP it will not have the tool tip, nor in output files.</td></tr>
</table>
",
		FUNC_FUNCTION_TRACE | FUNC_STACK_TRACE
	),

	'collect_return' => array(
		'boolean', 0, TWO,
		"This setting, defaulting to Off, controls whether Xdebug should write the
return value of function calls to the trace files.",
		FUNC_FUNCTION_TRACE,
	),

	'trace_format' => array(
		'integer', 0, TWO,
		"The format of the trace file.
<table class='table'>
<tr><th>Value</th><th>Description</th></tr>
<tr><td class='ctr'>0</td><td>shows a human readable indented trace file with:
<i>time index</i>, <i>memory usage</i>, <i>memory delta</i> (if the setting <a
href='#show_mem_delta'>xdebug.show_mem_delta</a> is enabled), <i>level</i>, <i>function name</i>,
<i>function parameters</i> (if the setting <a href='#collect_params'>xdebug.collect_params</a> is enabled,
<i>filename</i> and <i>line number</i>.</td></tr>
<tr><td class='ctr'>1</td><td>writes a computer readable format with the following
tab-separated fields: <i>level</i>, <i>function #</i>, <i>function entry (0) or
function exit (1)</i>, <i>time index</i>, <i>memory usage</i>, <i>function
name</i>, <i>user-defined (1) or internal function (0)</i>, <i>name of the
include/require file</i>, <i>filename</i> and <i>line number</i>.</td></tr>
</table>
<p>
See the introduction of [FEAT:execution_trace] for a few examples.
</p>",
		FUNC_FUNCTION_TRACE
	),

	'trace_options' => array(
		'integer', 0, TWO,
		"When set to '1' the trace files will be appended to, instead of
being overwritten in subsequent requests.",
		FUNC_FUNCTION_TRACE
	),

	'trace_output_dir' => array(
		'string', '/tmp', TWO,
		"The directory where the tracing files will be written to, make sure that
the user who the PHP will be running as has write permissions to that
directory.",
		FUNC_FUNCTION_TRACE
	),

	'trace_output_name' => array(
		'string', 'trace.%c', TWO,
		"<p>This setting determines the name of the file that is used to dump
traces into. The setting specifies the format with format specifiers, very
similar to sprintf() and strftime(). There are several format specifiers
that can be used to format the file name. The '.xt' extension is always added
automatically.</p>

<p>
The possible format specifiers are:
<table class='table'>
<tr><th>Specifier</th><th>Meaning</th><th>Example Format</th><th>Example Filename</th></tr>
<tr><td class='ctr'>%c</td><td>crc32 of the current working directory</td><td>trace.%c</td><td>trace.1258863198.xt</tr>
<tr><td class='ctr'>%p</td><td>pid</td><td>trace.%p</td><td>trace.5174.xt</td></tr>
<tr><td class='ctr'>%r</td><td>random number</td><td>trace.%r</td><td>trace.072db0.xt</td></tr>
<tr><td class='ctr'>%s</td><td>script name<sup><a href='#note2'>2</a></sup></td><td>cachegrind.out.%s</td><td>cachegrind.out._home_httpd_html_test_xdebug_test_php</td></tr>
<tr><td class='ctr'>%t</td><td>timestamp (seconds)</td><td>trace.%t</td><td>trace.1179434742.xt</td></tr>
<tr><td class='ctr'>%u</td><td>timestamp (microseconds)</td><td>trace.%u</td><td>trace.1179434749_642382.xt</td></tr>
<tr><td class='ctr'>%H</td><td>\$_SERVER['HTTP_HOST']</td><td>trace.%H</td><td>trace.kossu.xt</td></tr>
<tr><td class='ctr'>%R</td><td>\$_SERVER['REQUEST_URI']</td><td>trace.%R</td><td>trace._test_xdebug_test_php_var=1_var2=2.xt</td></tr>
<tr><td class='ctr'>%S</td><td>session_id (from \$_COOKIE if set)</td><td>trace.%S</td><td>trace.c70c1ec2375af58f74b390bbdd2a679d.xt</td></tr>
<tr><td class='ctr'>%%</td><td>literal %</td><td>trace.%%</td><td>trace.%%.xt</td></tr>
<tr><td colspan='4'><a name='note2'><sup>2</sup></a> this one is not available for trace file names.</td></tr>
</table>
</p>
",
		FUNC_FUNCTION_TRACE
	),

	
	'idekey' => array(
		'string', '*complex*', ONE | TWO,
		"Controls which IDE Key Xdebug should pass on to the DBGp debugger handler.
The default is based on environment settings. First the environment setting
DBGP_IDEKEY is consulted, then USER and as last USERNAME.  The default is set
to the first environment variable that is found. If none could be found the
setting has as default ''.",
		FUNC_REMOTE
	),

	'remote_autostart' => array(
		'boolean', 0, ONE | TWO,
		"Normally you need to use a specific HTTP GET/POST variable to start
remote debugging (see [FEAT:remote]). When
this setting is set to 'On' Xdebug will always attempt to start a remote
debugging session and try to connect to a client, even if the GET/POST/COOKIE
variable was not present.",
		FUNC_REMOTE
	),

	'remote_enable' => array(
		'boolean', 0, ONE | TWO,
		"This switch controls whether Xdebug should try to contact a debug client
which is listening on the host and port as set with the settings
[CFG:remote_host] and
[CFG:remote_port]. If a connection can not be established the script will just
continue as if this setting was Off.",
		FUNC_REMOTE
	),

	'remote_handler' => array(
		'string', 'dbgp', ONE | TWO,
		"Can be either 'php3' which selects the old <a
href='http://www.php.net/manual/en/debugger.php'>PHP 3 style debugger</a>
output, 'gdb' which enables the GDB like debugger interface or 'dbgp' - the
brand new <a href='/docs-dbgp.php'>debugger protocol</a>. The DBGp protocol is
more widely supported by clients. See more information in the introduction for
[FEAT:remote].
",
		FUNC_REMOTE
	),

	'remote_host' => array(
		'string', 'localhost', ONE | TWO,
		"Selects the host where the debug client is running, you can either use a
host name or an IP address.",
		FUNC_REMOTE
	),

	'remote_log' => array(
		'string', 'none', ONE | TWO,
		"If set to a value, it is used as filename to a file to which all remote
debugger communications are logged.",
		FUNC_REMOTE
	),

	'remote_mode' => array(
		'string', 'req', ONE | TWO,
		"<p>Selects when a debug connection is initiated. This setting can have two
different values:
<dl>
<dt>req</dt>
<dd>Xdebug will try to connect to the debug client as soon as the script
starts.</dd>
<dt>hit</dt>
<dd>Xdebug will only try to connect to the debug client as soon as an error
condition occurs.</dd>
</dl>
</p>",
		FUNC_REMOTE
	),

	'remote_port' => array(
		'integer', 9000, ONE | TWO,
		"The port to which Xdebug tries to connect on the remote host. Port
9000 is the default for both the client and the bundled debugclient.
As many clients use this port number, it is best to leave this setting
unchanged.",
		FUNC_REMOTE
	),

	'profiler_append' => array(
		'integer', 0, TWO,
		"When this setting is set to 1, profiler files will not be overwritten when
a new request would map to the same file (depnding on the [CFG:profiler_output_name] setting.
Instead the file will be appended to with the new profile.",
		FUNC_PROFILER
	),

	'profiler_enable' => array(
		'integer', 0, TWO,
		"Enables Xdebug's profiler which creates files in the
[CFG:profiler_output_dir:profile output directory].  Those files can be
read by KCacheGrind to visualize your data.  This setting can not be set in
your script with ini_set().",
		FUNC_PROFILER
	),

	'profiler_enable_trigger' => array(
		'integer', 0, TWO,
		"When this setting is set to 1, you can trigger the generation of profiler
files by using the XDEBUG_PROFILE GET/POST parameter. This will then write the
profiler data to [CFG:profiler_output_dir:defined directory].",
		FUNC_PROFILER
	),

	'profiler_output_dir' => array(
		'string', '/tmp', TWO,
		"The directory where the profiler output will be written to, make sure that
the user who the PHP will be running as has write permissions to that
directory. This setting can not be set in your script with ini_set().",
		FUNC_PROFILER
	),

	'profiler_output_name' => array(
		'string', 'cachegrind.out.%p', TWO,
		"<p>This setting determines the name of the file that is used to dump
traces into. The setting specifies the format with format specifiers, very
similar to sprintf() and strftime(). There are several format specifiers
that can be used to format the file name.</p>

<p>See the [CFG:trace_output_name] documentation for the supported
specifiers.</p>
",
		FUNC_PROFILER
	),


	'dump.*' => array(
		'string', "Empty", ONE | TWO,
		"* = COOKIE, FILES, GET, POST, REQUEST, SERVER, SESSION. These seven
settings control which data from the superglobals is shown when an error
situation occurs. Each php.ini setting can consist of a comma seperated list of
variables from this superglobal to dump, but make sure you do not add spaces in
this setting. In order to dump the REMOTE_ADDR and the REQUEST_METHOD when an
error occurs, add this setting:
<pre>
xdebug.dump.SERVER = REMOTE_ADDR,REQUEST_METHOD
</pre>
",
		FUNC_STACK_TRACE
	),

	'dump_globals' => array(
		'boolean', 1, ONE | TWO,
		'Controls whether the values of the superglobals as defined by the [CFG:dump.*] settings whould be shown or not.',
		FUNC_STACK_TRACE
	),

	'dump_once' => array(
		'boolean', 1, ONE | TWO,
		"Controls whether the values of the superglobals should be dumped on all
error situations (set to Off) or only on the first (set to On).",
		FUNC_STACK_TRACE
	),

	'dump_undefined' => array(
		'boolean', 0, ONE | TWO,
		"If you want to dump undefined values from the superglobals you should set
this setting to On, otherwise leave it set to Off.",
		FUNC_STACK_TRACE
	),
);
