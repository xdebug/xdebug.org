<?php $title = "Xdebug: Updates"; include "include/header.php"; hits ('xdebug-updates'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | UPDATES</span><br />

<?php include "include/menu.php"; ?>
<?php
	function bug($nr) {
		echo "bug <a href='http://bugs.xdebug.org/bug_view_page.php?bug_id=".
			sprintf("%08d", $nr). "' target='_blank'>#$nr</a>";
	}
?>

<span class="sans">UPDATES</span><br />

<span class='quote'>
<dl>

<dt>[26-12-2003]</dt>

<dd>GDB: Added file/line to signals.</dd>
<dd>Fixed logging to adhere to the error_reporting setting.</dd>
<dd>Fixed <?php bug(32); ?>: Unusual dynamic variables cause xdebug to
crash.</dd>
<dd>Fixed <?php bug(31); ?>: &amp; entity replaced after others, wrong HTML
output.</dd>
<dd>Fixed <?php bug(22); ?>: Segmentation fault with
<i><a href='docs.php#xdebug_get_function_stack'>xdebug_get_function_stack()</a></i>
and collect_params=1.</dd>

<dt>[08-11-2003]</dt>

<dd>Added version info to handlers which show in phpinfo() output.</dd>
<dd>GDB: Fixed bug with continuing after breakpoint where only 'cont'
worked.</dd>
<dd>GDB: Fixed bug in deleting absolute breakpoints on Windows.</dd>
<dd>Fixed <?php bug(27); ?>: Repeated connect attempts when no debugger is
listening.</dd>
<dd>Fixed <?php bug(19); ?>: The value of xdebug.output_dir in a .htaccess
never takes effect.</dd>
<dd>Fixed <?php bug(18); ?>: Mistyped sizeof()'s for array indexes in profiler
output.</dd>
<dd>Fixed handling stack traces for when display_errors was set to Off.</dd>
<dd>Fixed segfault where a function name didn't exist in case of a
"call_user_function".</dd>
<dd>Fixed reading a filename in case of an callback to a PHP function from an
internal function (like "array_map()").</dd>

<dt>[18-09-2003]</dt>
<dd>Fixed bug with wrong file names for functions called from call_user_*().</dd>

<dt>[30-08-2003]</dt>
<dd>Added the option "dump_superglobals" to the remote debugger. If you set
this option to 0 the "show-local" and similar commands will not return any data
from superglobals anymore.</dd>

<dt>[30-08-2003]</dt>
<dd>Fixed bug <a
href='http://bugs.xdebug.org/bug_view_page.php?bug_id=0000002'>#2</a>: "pear
package" triggers a segfault.</dd> <dd>Fixed crash bug when a function had
sprintf style parameters (ie.  strftime()).</dd>

<dt>[16-07-2003]</dt>
<dd>Added "id" attribute to &lt;var /&gt; elements in responses from the remove
debugger when the response method is XML. This makes it possible to distinguish
between unique elements by use of recursion for example.</dd>
<dd>Greatly cut down on the overhead that Xdebug causes on running scripts.</dd>
<dd>Fixed a bug with "quit" that would disable the extension.</dd>
<dd>Fixed a bug in the folding of recursive elements.</dd>

<dt>[03-07-2003]</dt>
<dd>Implemented an argument to the "bt" command. If this is set to "full" all
local variables for a stack frame are showed too.</dd>

<dt>[28-06-2003]</dt>
<dd>Updated licence: "PHP Licence" was renamed to "Xdebug Licence",
"The PHP Group" to "Derick Rethans" and "PHP" to "Xdebug".</dd>
<dd>Added the <i><a href='docs.php#xdebug_time_index'>xdebug_time_index()</a></i>
function which returns the time index since the start of the script.</dd>

<dt>[23-06-2003]</dt>
<dd>Updated licence: "PHP Licence" was renamed to "Xdebug Licence",
"The PHP Group" to "Derick Rethans" and "PHP" to "Xdebug".</dd>
<dd>Implemented the "show-breakpoints" command which shows all currently
active breakpoints including conditions.</dd>

<dt>[14-05-2003]</dt>
<dd>Implemented the "show-local" command (shows all local variables in the
current scope including all contents) and conditions for breakpoints in the
"break" command.</dd>

<dt>[27-04-2003]</dt>
<dd>Added a fancy replacement function for <a
href='docs.php#var_dump'>var_dump</a></i> which overloads the standard PHP
function while HTML errors are enabled.</dd>

<dt>[21-04-2003]</dt>
<dd>Added the <i><a href='docs.php#xdebug_call_class'>xdebug_call_class</a></i>
function as addition to <i><a
href='docs.php#xdebug_call_function'>xdebug_call_function</a></i>.</dd>

<dt>[19-04-2003]</dt>
<dd>Re-implemented the <a href='docs-settings.php#max_nesting_level'>maximum
nesting level protection</a>.</dd>

<dt>[18-04-2003]</dt>
<dd>Turned off <a href='docs-settings.php#collect_params'>xdebug.collect_params
by default</a>.</dd>
<dd>Fix problems with symbols on MacOSX.</dd>

<dt>[14-04-2003]</dt>
<dd>Fixed handling pathnames and files under Windows for the debugger.</dd>

<dt>[10-04-2003]</dt>
<dd>Fixed accessing of superglobal variables from the debugger client.</dd>

<dt>[06-04-2003]</dt>
<dd>Fixed a segfault that happened while dealing with include files with ZE2.</dd>

<dt>[05-04-2003]</dt>
<dd>Allow remote debugging to be enabled in httpd.conf and .htaccess files.</dd>
<dd>Added code coverage, enable with <i><a
href='docs.php#xdebug_start_code_coverage'>xdebug_start_code_coverage()</a></i>,
disable with <i><a
href='docs.php#xdebug_stop_code_coverage'>xdebug_stop_code_coverage()</a></i>
and get the information with <i><a
href='docs.php#xdebug_get_code_coverage'>xdebug_get_code_coverage()</a></i>.
The latter returns an array with each element being an array containing the
lines and the number of times a statement was run on that line, per executed
file.</dd>

<dt>[14-02-2003]</dt>
<dd>Added dumping of super globals when an error occurs.</dd>

<dt>[27-01-2003]</dt>
<dd>Added an XML transport layer for the remote debugger.</dd>

<dt>[22-01-2003]</dt>
<dd>Fixed handling of 'continue' (in addition to 'cont').</dd>

<dt>[14-01-2003]</dt>
<dd>Updated Xdebug to support Zend Engine 2 (PHP 5.0.0-dev).</dd>

<dt>[07-01-2003]</dt>
<dd>Implemented the "eval" (evalutes PHP code) to the remote debugger.</dd>

<dt>[05-01-2003]</dt>
<dd>Enabled support for Windows again.</dd>directing profiling output to

<dt>[20-12-2002]</dt>
<dd>Fixed the "init" state of the debugger, from now on you can print data
(like environment variables) from this state.</dd>
<dd>The array returned by get_function_trace() now includes the memory
footprint and timing information.</dd>

<dt>[08-12-2002]</dt>
<dd>Automatic profiling added, including redirecting profiling output to
disk.</dd>

<dt>[29-11-2002]</dt>
<dd>Added a new profiling mode: Stack-Dump.</dd>

<dt>[27-11-2002]</dt>
<dd>Basic profiling added to Xdebug, including three new functions:
xdebug_start_profiling() that begins profiling process, xdebug_stop_profiling()
that ends the profiling process and xdebug_dump_function_trace() that dumps the
profiling data.</dd>

<dt>[15-11-2002]</dt>
<dd>Implemented the "kill" (kills the running script) and "delete" (deletes
an already set breakpoint) command for the remote debugger.</dd>

<dt>[13-11-2002]</dt>
<dd>Parameters to functions are no longer recorded by default; use the
  xdebug.collect_params=1 setting in php.ini to turn it on again.</dd>

<dt>[12-11-2002]</dt>
<dd>Made the xdebug server and client working under Windows.</dd>

<dt>[09-11-2002]</dt>
<dd>Implemented the "next" (step over) and "finish" (step out) commands
for the remote debugger.</dd>

<dt>[07-11-2002]</dt>
<dd>Lots of small bugfixes, under them memory leaks and crash bugs.</dd>

<dt>[03-11-2002]</dt>
<dd>Implemented the "list" (source listing), "print" (printing variable
contents), "show" (show all variables in the scope), "step" (step through
execution) and "pwd" (print working directory) commands to the remote
debugger.</dd>

<dt>[29-10-2002]</dt>
<dd>Implemented class::method, object-&gt;method and file.ext:line style
  breakpoints.</dd>
<dd>Changed debugger port from 7869 to 17869.</dd>

<dt>[28-10-2002]</dt>
<dd>Added xdebug.collect_params setting. If this setting is on (the default)
  then Xdebug collects all parameters passed to functions, otherwise they
  are not collected at all.</dd>
<dd>Implemented correct handling of include/require and eval.</dd>

<dt>[22-10-2002]</dt>
<dd>Fixed bug which caused wrong filenames to be reported.</dd>

<dt>[18-10-2002]</dt>
<dd>Added automatic starting of function traces (xdebug.auto_trace, defaulting to
  "off").</dd>
<dd>Xdebug no longer supports PHP versions below PHP 4.3.0pre1.</dd>
<dd>Added gdb compatible debugger handler with support for simple (function only)
  breakpoints.</dd>

<dt>[16-09-2002]</dt>
<dd>Fixed bug with argument lists.</dd>

<dt>[04-09-2002]</dt>
<dd>Implemented remote debugger handler abstraction.</dd>
<dd>Added a php3 compatible debugger handler.</dd>

<dt>[01-09-2002]</dt>
<dd>Fixed memory footprint readings by not counting memory used by xdebug.</dd>

<dt>[30-08-2002]</dt>
<dd>Implemented gathering of parameters to internal functions. (Only works
with recent PHP 4.3.0-dev versions!)</dd>

<dt>[28-08-2002]</dt>
<dd>Bugs, better performance and update of the xdebug_get_function_trace().</dd>

<dt>[27-08-2002]</dt>
<dd>Add much better routine for getting data from Zend.</dd>

<dl>
<dt>[23-06-2002]</dt>
<dd>Xdebug no longer relies on PHP's output buffering mechanism. This caused
  problems with PEAR.</dd>

<dt>[16-06-2002]</dt>
<dd>Added PECL package.xml file to make xdebug <a href="#pecl">installable</a>
  by PEAR.</dd>
<dd>Flush the log file after every line during function tracing to file.</dd>
<dd>Removed the xdebug_* functions from the returned/showed function stracks
  and traces.</dd>

<dt>[09-06-2002]</dt>
<dd>Rewrote xdebug_get_function_stack() and xdebug_get_function_trace() to return
  data in multidimensional arrays.</dd>

<dt>[06-06-2002]</dt>
<dd>Add support for classnames, variable include files and variable function
  names.</dd>
<dd>Implemented links to the PHP Manual in traces.</dd>
<dd>Added timestamps and memory usage to function traces</dd>

<dt>[02-06-2002]</dt>
<dd>Fixed a crash when using user defined session handlers.</dd>

<dt>[29-05-2002]</dt>
<dd>Implemented variable function names.</dd>

<dt>[26-05-2002]</dt>
<dd>Unify showing unknown data.</dd>

<dt>[25-05-2002]</dt>
<dd>Implemented much better parameter tracing for user defined
  functions.</dd>

<dt>[18-05-2002]</dt>
<dd>Renamed xdebug_get_function_trace() to xdebug_dump_function_trace().</dd>
<dd>Implemented new xdebug_get_function_trace() to return the function trace in
  an array.</dd>
<dd>Added a parameter to xdebug_start_trace(). When this parameter is used,
  xdebug will dump a function trace to the filename which this parameter
  speficies.Fixed functions as parameters to functions</dd>

<dt>[17-05-2002]</dt>
<dd>Fixed functions as parameters to functions</dd>

<dt>[15-05-2002]</dt>
<dd>Fix logging to the systemlog</dd>

<dt>[14-05-2002]</dt>
<dd>Make xdebug respect the value of the error_reporting setting</dd>

<dt>[12-05-2002]</dt>
<dd>Added handling single-dimensional constant arrays as parameter to functions</dd>

<dt>[11-05-2002]</dt>
<dd>Implemented function traces (xdebug_start_trace(), xdebug_stop_trace() and
  xdebug_get_function_trace())</dd>
<dd>Added support for Windows to xdebug</dd>

<dt>[08-05-2002]</dt>
<dd>Implemented handling of static method calls (foo::bar())</dd>

<dt>[07-05-2002]</dt>
<dd>Implemented correct handling of include(), require() and eval()</dd>

<dt>[06-05-2002]</dt>
<dd>Fix removal of elements from the stack</dd>

<dt>[03-05-2002]</dt>
<dd>Added ini_settings and functions to disable and enable showing stacktraces from within your PHP script</dd>

<dt>[02-05-2002]</dt>
<dd>Added xdebug_memory_usage() which returns the amount of memory used by the PHP script</dd>
</dl>

<br /><br />

<!-- MAIN FEATURE END -->

			</class></td>
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>
<?php include "include/side.php"; ?>
						</td>
					</tr>
				</table>
			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
