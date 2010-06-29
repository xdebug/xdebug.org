<?php
$settings = array(
	'collect_vars' => array(
		'boolean', 0, null,
		"This setting tells Xdebug to gather information about which variables
are used in a certain scope. This analysis can be quite slow as Xdebug has
to reverse engineer PHP's opcode arrays. This setting will not record which
values the different variables have, for that use [CFG:collect_params].
This setting needs to be enabled only if you wish to use
[FUNC:xdebug_get_declared_vars].",
		FUNC_STACK_TRACE
	),
	'default_enable' => array(
		'boolean', 1, null,
		"If this setting is 1, then stacktraces will be shown by default on an
error event. You can disable showing stacktraces from your code with
[FUNC:xdebug_disable]. As this is one of the basic functions of Xdebug, it is
advisable to leave this setting set to 1.",
		FUNC_BASIC
	),
	'extended_info' => array(
		'integer', 1, null,
		"Controls whether Xdebug should enforce 'extended_info' mode for the PHP
parser; this allows Xdebug to do file/line breakpoints with the remote
debugger. When tracing or profiling scripts you generally want to turn off this
option as PHP's generated oparrays will increase with about a third of the size
slowing down your scripts. This setting can not be set in your scripts with
ini_set(), but only in php.ini.",
		FUNC_REMOTE
	),
	'manual_url' => array(
		'string', 'http://www.php.net', null,
		"This is the base url for the links from the function traces and error
message to the manual pages of the function from the message. It is advisable
to set this setting to use the closest mirror.",
		FUNC_STACK_TRACE
	),
	'max_nesting_level' => array(
		'integer', 100, null,
		"Controls the protection mechanism for infinite recursion protection.
The value of this setting is the maximum level of nested functions that are
allowed before the script will be aborted.",
		FUNC_BASIC
	),

	'show_exception_trace' => array(
		'integer', 0, null,
		"When this setting is set to 1, Xdebug will show a stack trace whenever
an exception is raised - even if this exception is actually caught.",
		FUNC_STACK_TRACE
	),

	'show_local_vars' => array(
		'integer', 0, null,
		"When this setting is set to something != 0 Xdebug's generated stack dumps
in error situations will also show all variables in the top-most scope. Beware
that this might generate a lot of information, and is therefore turned off by
default.",
		FUNC_STACK_TRACE
	),

	'show_mem_delta' => array( 
		'integer', 0, null,
		"When this setting is set to something != 0 Xdebug's human-readable
generated trace files will show the difference in memory usage between function
calls. If Xdebug is configured to generate computer-readable trace files then
they will always show this information.",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE
	),

	'var_display_max_children' => array(
		'integer', 128, null,
		"Controls the amount of array children and object's properties are shown
when variables are displayed with either [FUNC:xdebug_var_dump],
[CFG:show_local_vars] or through [FEAT:execution_trace]. This setting does
not have any influence on the number of children that is send to the client
through the [FEAT:remote] feature.",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE | FUNC_VAR_DUMP
	),

	'var_display_max_data' => array(
		'integer', 512, null,
		"Controls the maximum string length that is shown
when variables are displayed with either [FUNC:xdebug_var_dump],
[CFG:show_local_vars] or through [FEAT:execution_trace]. This setting does
not have any influence on the amount of data that is send to the client through
the [FEAT:remote] feature.",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE | FUNC_VAR_DUMP
	),

	'var_display_max_depth' => array(
		'integer', 3, null,
		"Controls how many nested levels of array elements and object properties are
when variables are displayed with either [FUNC:xdebug_var_dump],
[CFG:show_local_vars] or through [FEAT:execution_trace]. This setting does
not have any influence on the depth of children that is send to the client
through the [FEAT:remote] feature.",
		FUNC_STACK_TRACE | FUNC_FUNCTION_TRACE | FUNC_VAR_DUMP
	),

	'auto_trace' => array(
		'boolean', 0, null,
		"When this setting is set to on, the tracing of function calls will be
enabled just before the script is run. This makes it possible to trace code in
the <a href='http://www.php.net/manual/en/configuration.directives.php#ini.auto-prepend-file'>auto_prepend_file</a>.",
		FUNC_FUNCTION_TRACE
	),

	'collect_assignments' => array(
	    'boolean', 0, '2.1',
		"This setting, defaulting to 0, controls whether Xdebug should add
variable assignments to function traces.",
		FUNC_FUNCTION_TRACE
	),

	'collect_includes' => array(
		'boolean', 1, null,
		"This setting, defaulting to 1, controls whether Xdebug should write the
filename used in include(), include_once(), require() or require_once() to the
trace files.",
		FUNC_FUNCTION_TRACE | FUNC_STACK_TRACE
	),

	'collect_params' => array(
		'integer', 0, null,
		"<p>This setting, defaulting to 0, controls whether Xdebug should collect
the parameters passed to functions when a function call is recorded in either
the function trace or the stack trace.</p>
<p>The setting defaults to 0 because for very large
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
<tr><td class='ctr'>2</td><td><p>Type and number of elements, with a tool tip for the full information <sup>1</sup>.</p></td></tr>
<tr><td class='ctr'>3</td><td>Full variable contents (with the limits respected as set by [CFG:var_display_max_children], [CFG:var_display_max_data] and [CFG:var_display_max_depth].</td></tr>
<tr><td class='ctr'>4</td><td>Full variable contents and variable name.</td></tr>
</table>
<p><sup>1</sup></a> in the CLI version of PHP it will not have the tool tip, nor in output files.</p>
",
		FUNC_FUNCTION_TRACE | FUNC_STACK_TRACE
	),

	'collect_return' => array(
		'boolean', 0, null,
		"This setting, defaulting to 0, controls whether Xdebug should write the
return value of function calls to the trace files.",
		FUNC_FUNCTION_TRACE,
	),

	'trace_format' => array(
		'integer', 0, null,
		"<p>The format of the trace file.</p>
<table class='table'>
<tr><th>Value</th><th>Description</th></tr>
<tr><td class='ctr'>0</td><td>shows a human readable indented trace file with:
<i>time index</i>, <i>memory usage</i>, <i>memory delta</i> (if the setting <a
href='#show_mem_delta'>xdebug.show_mem_delta</a> is enabled), <i>level</i>, <i>function name</i>,
<i>function parameters</i> (if the setting [CFG:collect_params] is enabled),
<i>filename</i> and <i>line number</i>.</td></tr>
<tr><td class='ctr'>1</td><td>writes a computer readable format which has two
different records. There are different records for entering a stack frame, and
leaving a stack frame. The table below lists the fields in each type of record.
Fields are tab separated.
</td></tr>
</table>
<p>
Fields for the computerized format:
</p>
<table class='table'>
<tr><th>Record type</th><th class='ctr'>1</th><th class='ctr'>2</th><th class='ctr'>3</th><th class='ctr'>4</th><th class='ctr'>5</th><th class='ctr'>6</th><th class='ctr'>7</th><th class='ctr'>8</th><th class='ctr'>9</th><th class='ctr'>10</th></tr>
<tr>
	<th class='ctr'>Entry</th>
	<td>level</td>
	<td>function&nbsp;#</td>
	<td>always&nbsp;'0'</td>
	<td>time index</td>
	<td>memory usage</td>
	<td>function name</td>
	<td>user-defined&nbsp;(1) or internal function&nbsp;(0)</td>
	<td>name of the include/require file</td>
	<td>filename</td>
	<td>line number</td>
</tr>
<tr><th class='ctr'>Exit</th>
	<td>level</td>
	<td>function&nbsp;#</td>
	<td>always&nbsp;'1'</td>
	<td>time index</td>
	<td>memory usage</td>
	<td colspan='5' class='ctr'><i>empty</i></td>
</tr>
</table>

<p>
See the introduction of [FEAT:execution_trace] for a few examples.
</p>",
		FUNC_FUNCTION_TRACE
	),

	'trace_options' => array(
		'integer', 0, null,
		"When set to '1' the trace files will be appended to, instead of
being overwritten in subsequent requests.",
		FUNC_FUNCTION_TRACE
	),

	'trace_output_dir' => array(
		'string', '/tmp', null,
		"The directory where the tracing files will be written to, make sure that
the user who the PHP will be running as has write permissions to that
directory.",
		FUNC_FUNCTION_TRACE
	),

	'trace_output_name' => array(
		'string', 'trace.%c', null,
		"<p>This setting determines the name of the file that is used to dump
traces into. The setting specifies the format with format specifiers, very
similar to sprintf() and strftime(). There are several format specifiers
that can be used to format the file name. The '.xt' extension is always added
automatically.</p>

<p>
The possible format specifiers are:
</p>
<table class='table'>
<tr><th>Specifier</th><th>Meaning</th><th>Example Format</th><th>Example Filename</th></tr>
<tr><td class='ctr'>%c</td><td>crc32 of the current working directory</td><td>trace.%c</td><td>trace.1258863198.xt</td></tr>
<tr><td class='ctr'>%p</td><td>pid</td><td>trace.%p</td><td>trace.5174.xt</td></tr>
<tr><td class='ctr'>%r</td><td>random number</td><td>trace.%r</td><td>trace.072db0.xt</td></tr>
<tr><td class='ctr'>%s</td><td><p>script name <sup>2</sup></p></td><td>cachegrind.out.%s</td><td>cachegrind.out._home_httpd_html_test_xdebug_test_php</td></tr>
<tr><td class='ctr'>%t</td><td>timestamp (seconds)</td><td>trace.%t</td><td>trace.1179434742.xt</td></tr>
<tr><td class='ctr'>%u</td><td>timestamp (microseconds)</td><td>trace.%u</td><td>trace.1179434749_642382.xt</td></tr>
<tr><td class='ctr'>%H</td><td>\$_SERVER['HTTP_HOST']</td><td>trace.%H</td><td>trace.kossu.xt</td></tr>
<tr><td class='ctr'>%R</td><td>\$_SERVER['REQUEST_URI']</td><td>trace.%R</td><td>trace._test_xdebug_test_php_var=1_var2=2.xt</td></tr>
<tr><td class='ctr'>%S</td><td>session_id (from \$_COOKIE if set)</td><td>trace.%S</td><td>trace.c70c1ec2375af58f74b390bbdd2a679d.xt</td></tr>
<tr><td class='ctr'>%%</td><td>literal %</td><td>trace.%%</td><td>trace.%%.xt</td></tr>
</table>
<p><sup>2</sup></a> this one is not available for trace file names.</p>
",
		FUNC_FUNCTION_TRACE
	),

	
	'idekey' => array(
		'string', '*complex*', null,
		"Controls which IDE Key Xdebug should pass on to the DBGp debugger handler.
The default is based on environment settings. First the environment setting
DBGP_IDEKEY is consulted, then USER and as last USERNAME.  The default is set
to the first environment variable that is found. If none could be found the
setting has as default ''.",
		FUNC_REMOTE
	),

	'remote_autostart' => array(
		'boolean', 0, null,
		"Normally you need to use a specific HTTP GET/POST variable to start
remote debugging (see [FEAT:remote]). When
this setting is set to 1, Xdebug will always attempt to start a remote
debugging session and try to connect to a client, even if the GET/POST/COOKIE
variable was not present.",
		FUNC_REMOTE
	),

	'remote_connect_back' => array(
		'boolean', 0, '2.1',
		"If enabled, the [CFG:remote_host] setting is ignored and Xdebug will
try to connect to the client that made the HTTP request. It checks
the \$_SERVER['REMOTE_ADDR'] variable to find out which IP address to use.
Please note that there is <b>no</b> filter available, and anybody who can
connect to the webserver will then be able to start a debugging session.",
		FUNC_REMOTE
	),

	'remote_enable' => array(
		'boolean', 0, null,
		"This switch controls whether Xdebug should try to contact a debug client
which is listening on the host and port as set with the settings
[CFG:remote_host] and
[CFG:remote_port]. If a connection can not be established the script will just
continue as if this setting was 0.",
		FUNC_REMOTE
	),

	'remote_handler' => array(
		'string', 'dbgp', null,
		"<p>Can be either 'php3' which selects the old <a
href='http://www.php.net/manual/en/debugger.php'>PHP 3 style debugger</a>
output, 'gdb' which enables the GDB like debugger interface or 'dbgp' - the
<a href='http://xdebug.org/docs-dbgp.php'>debugger protocol</a>. The DBGp protocol is
more widely supported by clients. See more information in the introduction for
[FEAT:remote].</p>
<p><b>Note</b>: Xdebug 2.1 and later only support 'dbgp' as protocol.</p>
",
		FUNC_REMOTE
	),

	'remote_host' => array(
		'string', 'localhost', null,
		"Selects the host where the debug client is running, you can either use a
host name or an IP address.",
		FUNC_REMOTE
	),

	'remote_log' => array(
		'string', '', null,
		"If set to a value, it is used as filename to a file to which all remote
debugger communications are logged. The file is always opened in append-mode,
and will therefore not be overwritten by default. There is no concurrency
protection available. The format of the file looks something like:
<pre>
Log opened at 2007-05-27 14:28:15
-&gt; &lt;init xmlns=\"urn:debugger_protocol_v1\" xmlns:xdebug=\"http://xdebug.org/dbgp/x ... ight&gt;&lt;/init>

&lt;- step_into -i 1
-&gt; &lt;response xmlns=\"urn:debugger_protocol_v1\" xmlns:xdebug=\"http://xdebug.org/db ... &gt;&lt;/response&gt;
</pre>",
		FUNC_REMOTE
	),

	'remote_mode' => array(
		'string', 'req', null,
		"<p>Selects when a debug connection is initiated. This setting can have two
different values:</p>
<dl>
<dt>req</dt>
<dd>Xdebug will try to connect to the debug client as soon as the script
starts.</dd>
<dt>jit</dt>
<dd>Xdebug will only try to connect to the debug client as soon as an error
condition occurs.</dd>
</dl>",
		FUNC_REMOTE
	),

	'remote_port' => array(
		'integer', 9000, null,
		"The port to which Xdebug tries to connect on the remote host. Port
9000 is the default for both the client and the bundled debugclient.
As many clients use this port number, it is best to leave this setting
unchanged.",
		FUNC_REMOTE
	),

	'profiler_append' => array(
		'integer', 0, null,
		"When this setting is set to 1, profiler files will not be overwritten when
a new request would map to the same file (depnding on the [CFG:profiler_output_name] setting.
Instead the file will be appended to with the new profile.",
		FUNC_PROFILER
	),

	'profiler_enable' => array(
		'integer', 0, null,
		"Enables Xdebug's profiler which creates files in the
[CFG:profiler_output_dir:profile output directory].  Those files can be
read by KCacheGrind to visualize your data.  This setting can not be set in
your script with ini_set(). If you want to selectively enable the profiler,
please set [CFG:profiler_enable_trigger] to 1 <strong>instead</strong> of using
this setting.",
		FUNC_PROFILER
	),

	'profiler_enable_trigger' => array(
		'integer', 0, null,
		"When this setting is set to 1, you can trigger the generation of profiler
files by using the XDEBUG_PROFILE GET/POST parameter, or send a cookie with the
name XDEBUG_PROFILE. This will then write the profiler data to
[CFG:profiler_output_dir:defined directory]. In order to prevent the profiler
to generate profile files for each request, you need to set
[CFG:profiler_enable] to 0.",
		FUNC_PROFILER
	),

	'profiler_output_dir' => array(
		'string', '/tmp', null,
		"The directory where the profiler output will be written to, make sure that
the user who the PHP will be running as has write permissions to that
directory. This setting can not be set in your script with ini_set().",
		FUNC_PROFILER
	),

	'profiler_output_name' => array(
		'string', 'cachegrind.out.%p', null,
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
		'string', "Empty", null,
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
		'boolean', 1, null,
		'Controls whether the values of the superglobals as defined by the [CFG:dump.*] settings whould be shown or not.',
		FUNC_STACK_TRACE
	),

	'dump_once' => array(
		'boolean', 1, null,
		"Controls whether the values of the superglobals should be dumped on all
error situations (set to 0) or only on the first (set to 1).",
		FUNC_STACK_TRACE
	),

	'dump_undefined' => array(
		'boolean', 0, null,
		"If you want to dump undefined values from the superglobals you should set
this setting to 1, otherwise leave it set to 0.",
		FUNC_STACK_TRACE
	),

	'overload_var_dump' => array(
		'boolean', 1, '2.1',
		"By default Xdebug overloads var_dump() with its own improved version
		for displaying variables when the html_errors php.ini setting is set to
		1. In case you do not want that, you can set this setting to 0, but
		check first if it's not smarter to turn off html_errors.",
		FUNC_VAR_DUMP
	),

	'file_link_format' => array(
		'string', '', '2.1',
		'<p>This setting determines the format of the links that are made in
the display of stack traces where file names are used. This allows IDEs to set
up a link-protocol that makes it possible to go directly to a line and file by
clicking on the filenames that Xdebug shows in stack traces. An example format might look like:
</p>
<pre>
myide://%f@%l
</pre>
<p>
The possible format specifiers are:
</p>
<table class="table">
<tr><th>Specifier</th><th>Meaning</th></tr>
<tr><td class="ctr">%f</td><td>the filename</td></tr>
<tr><td class="ctr">%l</td><td>the line number</td></tr>
</table>
',
		FUNC_STACK_TRACE
	),
	'scream' => array(
		'boolean', 0, '2.1',
		"If this setting is 1, then Xdebug will disable the @ (shut-up)
		operator so that notices, warnings and errors are no longer hidden.",
		FUNC_BASIC
	),
);
