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

<h2>Updates</h2>

<span class='quote'>
<dl>
<dt><a name='x_2_0_2'></a>[11-11-2007] &mdash; Xdebug 2.0.2</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #325: DBGP: "detach" stops further sessions being established from Apache.</dd>
<dd>Fixed bug #321: Code coverage crashes on empty PHP files.</dd>
<dd>Fixed bug #318: Segmentation Fault in code coverage analysis.</dd>
<dd>Fixed bug #315: Xdebug crashes when including a file that doesn't exist.</dd>
<dd>Fixed bug #314: PHP CLI Error Logging thwarted when XDebug Loaded.</dd>
<dd>Fixed bug #300: Direction of var_dump().</dd>
<dd>Always set the transaction_id and command. (Related to bug #313).</dd>


<dt><a name='x_2_0_1'></a>[20-10-2007] &mdash; Xdebug 2.0.1</dt>
<dd><h3>Changes</h3></dd>
<dd>Improved code coverage performance dramatically.</dd>
<dd>PHP 5.3 compatibility (no namespaces yet though).</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #301: Loading would cause SIGBUS on Solaris 10 SPARC. (Patch by Sean Chalmers)</dd>
<dd>Fixed bug #300: Xdebug does not force LTR rendering for its tables.</dd>
<dd>Fixed bug #299: Computerized traces don't have a newline for return entries if memory limit is not enabled.</dd>
<dd>Fixed bug #298: xdebug_var_dump() doesn't handle entity replacements correctly concerning string length.</dd>
<dd>Fixed a memory free error related to remote debugging conditions.  (Related to bug #297).</dd>


<dt>[18-07-2007] &mdash; Xdebug 2.0.0</dt>
<dd><h3>Changes</h3></dd>
<dd>Put back the disabling of stack traces - apperently people were relying on this. This brings back xdebug_enable(), xdebug_disable() and xdebug_is_enabled().</dd>
<dd>xdebug.collect_params is no longer a boolean setting. Although it worked fine, phpinfo() showed only just On or Off here.</dd>
<dd>Fixed the Xdebug version of raw_url_encode to not encode : and \. This is not necessary according to the RFCs and it makes debug breakpoints work on Windows.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #291: Tests that use SPL do not skip when SPL is not available.</dd>
<dd>Fixed bug #290: Function calls leak memory.</dd>
<dd>Fixed bug #289: Xdebug terminates connection when eval() is run in the init stage.</dd>
<dd>Fixed bug #284: Step_over on breakpointed line made Xdebug break twice.</dd>
<dd>Fixed bug #283: Xdebug always returns $this with the value of last stack frame.</dd>
<dd>Fixed bug #282: %s is not usable for xdebug.profiler_output_name on Windows in all stack frames.</dd>
<dd>Fixed bug #280: var_dump() doesn't display key of array as expected.</dd>
<dd>Fixed bug #278: Code Coverage Issue.</dd>
<dd>Fixed bug #273: Remote debugging: context_get does not return context id.</dd>
<dd>Fixed bug #270: Debugger aborts when PHP's eval() is encountered. </dd>
<dd>Fixed bug #265: XDebug breaks error_get_last() .</dd>
<dd>Fixed bug #261: Code coverage issues by overloading zend_assign_dim.</dd>

<dd><h3>DBGP</h3></dd>
<dd>Added support for "breakpoint_languages".</dd>


<dt>[17-05-2007] &mdash; Xdebug 2.0.0RC4</dt>
<dd><h3>Changes</h3></dd>
<dd>Use µ seconds instead of a tenths of µ seconds to avoid confusion in profile information.</dd>
<dd>Changed xdebug.profiler_output_name and xdebug.trace_output_name to use modifier tags:
<dl>
  <dt>%c</dt><dd>crc32 of the current working directory</dd>
  <dt>%p</dt><dd>pid</dd>
  <dt>%r</dt><dd>random number</dd>
  <dt>%s</dt><dd>script name</dd>
  <dt>%t</dt><dd>timestamp (seconds)</dd>
  <dt>%u</dt><dd>timestamp (microseconds)</dd>
  <dt>%H</dt><dd>$_SERVER['HTTP_HOST']</dd>
  <dt>%R</dt><dd>$_SERVER['REQUEST_URI']</dd>
  <dt>%S</dt><dd>session_id (from $_COOKIE if set)</dd>
  <dt>%%</dt><dd>literal %</dd>
</dl>
</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #255: Call Stack Table doesn't show Location on Windows.</dd>
<dd>Fixed bug #251: Using the source command with an invalid filename returns unexpected result.</dd>
<dd>Fixed bug #243: show_exception_trace="0" ignored.</dd>
<dd>Fixed bug #241: Crash in xdebug_get_function_stack().</dd>
<dd>Fixed bug #240: Crash with xdebug.remote_log on Windows.</dd>
<dd>Fixed a segfault in rendering stack traces to error logs.</dd>
<dd>Fixed a bug that prevented variable names from being recorded for remote debug session while xdebug.collect_vars was turned off.</dd>
<dd>Fixed xdebug_dump_superglobals() in case no super globals were configured.</dd>

<dd><h3>Removed functions</h3></dd>
<dd>Removed support for Memory profiling as that didn't work properly.</dd>
<dd>Get rid of xdebug.default_enable setting and associated functions: xdebug_disable() and xdebug_enable().</dd>

<dd><h3>Added features</h3></dd>
<dd>Implemented support for four different xdebug.collect_params settings for stack traces and function traces.</dd>
<dd>Allow to trigger profiling by the XDEBUG_PROFILE cookie.</dd>

<dd><h3>DBGP</h3></dd>
<dd>Correctly add namespace definitions to XML.</dd>
<dd>Added the xdebug namespace that adds extra information to breakpoints if available.</dd>
<dd>Stopped the use of <error> elements for exception breakpoints, as that violates the protocol.</dd>


<dt>[31-01-2007] &mdash; Xdebug 2.0.0RC3</dt>
<dd><h3>Changes</h3></dd>
<dd>Removed the bogus "xdebug.allowed_clients" setting - it was not implemented.</dd>
<dd>Optimized used variable collection by switching to a linked list instead of a hash. This is about 30% faster, but it needed a quick conversion to hash in the case the information had to be shown to remove duplicate variable names.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #232: PHP log_errors functionality lost after enabling xdebug error handler when CLI is used.</dd>
<dd>Fixed problems with opening files - the filename could cause double free issues.</dd>
<dd>Fixed memory tracking as memory_limit is always enabled in PHP 5.2.1 and later.</dd>
<dd>Fixed a segfault that occurred when creating printable stack traces and collect_params was turned off.</dd>


<dt>[24-12-2006] &mdash; Xdebug 2.0.0RC2</dt>
<dd><h3>Added new features</h3></dd>
<dd>Implemented the "xdebug.var_display_max_children" setting. The default is set to 128 children.</dd>
<dd>Added types to fancy var dumping function.</dd>
<dd>Implemented FR #210: Add a way to stop the debug session without having to execute a script. The GET/POST parameter "XDEBUG_SESSION_STOP_NO_EXEC" works in the same way as XDEBUG_SESSION_STOP, except that the script will not be executed.</dd>
<dd>DBGP: Allow postmortem analysis.</dd>
<dd>DBGP: Added the non-standard function xcmd_profiler_name_get.</dd>

<dd><h3>Changes</h3></dd>
<dd>Fixed the issue where xdebug_get_declared_vars() did not know about variables there are in the declared function header, but were not used in the code. Due to this change expected arguments that were not send to a function will now show up as ??? in stack and function traces in PHP 5.1 and PHP 5.2.</dd>
<dd>Allow xdebug.var_display_max_data and xdebug.var_display_max_depth settings of -1 which will unlimit those settings.</dd>
<dd>DBGP: Sort super globals in Globals overview.</dd>
<dd>DBGP: Fixed a bug where error messages where not added upon errors in the protocol.</dd>
<dd>DBGP: Change context 1 from globals (superglobals + vars in bottom most stack frame) to just superglobals.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed linking error on AIX by adding libm.</dd>
<dd>Fixed dead code analysis for THROW.</dd>
<dd>Fixed oparray prefill caching for code coverage.</dd>
<dd>Fixed the xdebug.remote_log feature work.</dd>
<dd>DBGP: Fixed a bug where $this did not appear in the local scoped context.</dd>
<dd>DBGP: Reimplemented property_set to use the same symbol fetching function as property_get. We now only use eval in case no type (-t) argument was given.</dd>
<dd>DBGP: Fixed some issues with finding out the classname, which is important for fetching private properties.</dd>
<dd>DBGP: Fixed usage of uninitialized memory that prevented looking up numerical array keys while fetching array elements not work properly.</dd>
<dd>Fixed bug #228: Binary safety for stream output and property fetches.</dd>
<dd>Fixed bug #227: The SESSION super global does not show up in the Globals scope.</dd>
<dd>Fixed bug #225: xdebug dumps core when protocol is GDB.</dd>
<dd>Fixed bug #224: Compile failure on Solaris.</dd>
<dd>Fixed bug #219: Memory usage delta in traces don't work on PHP 5.2.0.</dd>
<dd>Fixed bug #215: Cannot retrieve nested arrays when the array key is a numeric index.</dd>
<dd>Fixed bug #214: The depth level of arrays was incorrectly checked so it would show the first page of a level too deep as well.</dd>
<dd>Fixed bug #213: Dead code analysis doesn't take catches for throws into account.</dd>
<dd>Fixed bug #211: When starting a new session with a different idekey, the cookie is not updated.</dd>
<dd>Fixed bug #209: Additional remote debugging session started when triggering shutdown function.</dd>
<dd>Fixed bug #208: Socket connection attempted when XDEBUG_SESSION_STOP.</dd>
<dd>Fixed PECL bug #8989: Compile error with PHP 5 and GCC 2.95.</dd>


<dt>[08-10-2006] &mdash; Xdebug 2.0.0RC1</dt>

<dd><h3>Added new features</h3></dd>
<dd>Implemented FR #70: Provide optional depth on xdebug_call_* functions.</dd>
<dd>Partially implemented FR #50: Resource limiting for variable display. By default only two levels of nested variables and max string lengths of 512 are shown. This can be changed by setting the ini settings xdebug.var_display_max_depth and xdebug.var_display_max_data.</dd>
<dd>Implemented breakpoints for different types of PHP errors. You can now set an 'exception' breakpoint on "Fatal error", "Warning", "Notice" etc.  This is related to bug #187.</dd>
<dd>Added the xdebug_print_function_trace() function to display a stack trace on demand.</dd>
<dd>Reintroduce HTML tracing by adding a new tracing option "XDEBUG_TRACE_HTML" (4).</dd>
<dd>Made xdebug_stop_trace() return the trace file name, so that the following works: &lt;?php echo file_get_contents( xdebug_stop_trace() ); ?&gt;</dd>
<dd>Added the xdebug.collect_vars setting to tell Xdebug to collect information about which variables are used in a scope. Now you don't need to show variables with xdebug.show_local_vars anymore for xdebug_get_declared_vars() to work.</dd>
<dd>Make the filename parameter to the xdebug_start_trace() function optional. If left empty it will use the same algorithm to pick a filename as when you are using the xdebug.auto_trace setting.</dd>

<dd><h3>Changes</h3></dd>
<dd>Implemented dead code analysis during code coverage for: abstract methods, dead code after return, throw and exit, and implicit returns when a normal return is present.</dd>
<dd>Improved readability of stack traces.</dd>
<dd>Use PG(html_errors) instead of checking whether we run with CLI when deciding when to use HTML messages or plain text messages.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #203: PHP errors with HTML content processed incorrectly. This patch backs out the change that was made to fix bug #182.</dd>
<dd>Fixed bug #198: Segfault when trying to use a non-existing debug handler.</dd>
<dd>Fixed bug #197: Race condition fixes created too many files.</dd>
<dd>Fixed bug #196: Profile timing on Windows does not work.</dd>
<dd>Fixed bug #195: CLI Error after debugging session.</dd>
<dd>Fixed bug #193: Compile problems with PHP 5.2.</dd>
<dd>Fixed bug #191: File/line breakpoints are case-sensitive on Windows.</dd>
<dd>Fixed bug #181: Xdebug doesn't handle uncaught exception output correctly.</dd>
<dd>Fixed bug #173: Coverage produces wrong coverage.</dd>
<dd>Fixed a typo that prevented the XDEBUG_CONFIG option "profiler_enable" from working.</dd>

<dt>[30-06-2006] &mdash; Xdebug 2.0.0beta6</dt>

<dd><h3>Added new features</h3></dd>
<dd>Implemented FR #137: feature_get for general commands doesn't have a text field.</dd>
<dd>Implemented FR #131: XDebug needs to implement paged child object requests.</dd>
<dd>Implemented FR #124: Add backtrace dumping information when exception thrown.</dd>
<dd>Implemented FR #70: Add feature_get breakpoint_types.</dd>
<dd>Added profiling aggregation functions (patch by Andrei Zmievski)</dd>
<dd>Implemented the "timestamp" option for the xdebug.trace_output_name and xdebug.profiler_output_name settings.</dd>
<dd>Added the xdebug.remote_log setting that allows you to log debugger communication to a log file for debugging. This can also be set through the "remote_log" element in the XDEBUG_CONFIG environment variable.</dd>
<dd>Added a "script" value to the profiler_output_name option.  This will write the profiler output to a filename that consists of the script's full path (using underscores). ie: /var/www/index.php becomes var_www_index_php_cachegrind.out. (Patch by Brian Shire).</dd>
<dd>DBGp: Implemented support for hit conditions for breakpoints.</dd>
<dd>DBGp: Added support for conditions for file/line breakpoints.</dd>
<dd>DBGp: Added support for hit value checking to file/line breakpoints.</dd>
<dd>DBGp: Added support for "exception" breakpoints.</dd>
<dd><h3>Performance improvements</h3></dd>
<dd>Added a cache that prevents the code coverage functionality from running a "which code is executable check" on every function call, even if they were executed multiple times. This should speed up code coverage a lot.</dd>
<dd>Speedup Xdebug but only gathering information about variables in scopes when either remote debugging is used, or show_local_vars is enabled.</dd>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug #184: problem with control chars in code traces</dd>
<dd>Fixed bug #183: property_get -n $this->somethingnonexistent crashes the debugger.</dd>
<dd>Fixed bug #182: Errors are not html escaped when being displayed.</dd>
<dd>Fixed bug #180: collected includes not shown in trace files. (Patch by Cristian Rodriguez)</dd>
<dd>Fixed bug #178: $php_errormsg and Track errors unavailable.</dd>
<dd>Fixed bug #177: debugclient fails to compile due to Bison.</dd>
<dd>Fixed bug #176: Segfault using SplTempFileObject.</dd>
<dd>Fixed bug #173: Xdebug segfaults using SPL ArrayIterator.</dd>
<dd>Fixed bug #171: set_time_limit stack overflow on 2nd request.</dd>
<dd>Fixed bug #168: Xdebug's DBGp crashes on an eval command where the result is an array.</dd>
<dd>Fixed bug #125: show_mem_delta does not calculate correct negative values on 64bit machines.</dd>
<dd>Fixed bug #121: property_get -n $r[2] returns the whole hash.</dd>
<dd>Fixed bug #111: xdebug does not ignore set_time_limit() function during debug session.</dd>
<dd>Fixed bug #87: Warning about headers when "register_shutdown_function" used.</dd>
<dd>Fixed PECL bug #6940 (XDebug ignores set_time_limit)</dd>
<dd>Fixed Komodo bug 45484: no member data for objects in PHP debugger.</dd>
<dd>Suppress NOP/EXT_NOP from being marked as executable code with Code Coverage.</dd>


<dt>[31-12-2005] &mdash; Xdebug 2.0.0beta5</dt>
<dd><h3>Added new features</h3></dd>
<dd>Implemented FR #161: var_dump doesn't show lengths for strings.</dd>
<dd>Implemented FR #158: Function calls from the {main} scope always have the line number 0. </dd>
<dd>Implemented FR #156: it's impossible to know the time taken by the last func call in xdebug trace mode 0.</dd>
<dd>Implemented FR #153: xdebug_get_declared_vars().</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed shutdown crash with ZTS on Win32</dd>
<dd>Fixed bad memory leak when a E_ERROR of exceeding memory_limit was thrown.</dd>
<dd>Fixed bug #154: GCC 4.0.2 optimizes too much out with -O2.</dd>
<dd>Fixed bug #141: Remote context_get causes segfault.</dd>


<dt>[29-11-2004]</dt>

<dd><h3>Added new features</h3></dd>
<dd>DBGP: Added error messages to returned errors (in most cases)</dd>
  
<dd><h3>Added new functions</h3></dd>
<dd>xdebug_debug_zval() to debug zvals by printing its refcounts and is_ref values.</dd>
  
<dd><h3>Changed features</h3></dd>
<dd>xdebug_code_coverage_stop() will now clean up the code coverage array, unless you specify FALSE as parameter.</dd>
<dd>The proper Xdebug type is "hash" for associative arrays.</dd>
<dd>Extended the code-coverage functionality by returning lines with executable code on them, but where not executed with a count value of -1.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>DBGP: Make property_get and property_value finally work as they should, including retrieving information from different depths then the most top stack frame.</dd>
<dd>DBGP: Fix eval'ed $varnames in property_get.</dd>
<dd>DBGP: Support the -d option for property_get.</dd>
<dd>Fixed the exit handler hook to use the new "5.1" way of handling it; which fortunately also works with PHP 5.0.</dd>
<dd>Fixed <?php bug(102); ?>: Problems with configure for automake 1.8.</dd>
<dd>Fixed <?php bug(101); ?>: crash with set_exeception_handler() and uncatched exceptions.</dd>
<dd>Fixed <?php bug(99); ?>: unset variables return the name as a string with property_get.</dd>
<dd>Fixed <?php bug(98); ?>: 'longname' attribute not returned for unintialized property in context_get request.</dd>
<dd>Fixed <?php bug(94); ?>: xdebug_sprintf misbehaves with x86_64/glibc-2.3.3</dd>
<dd>Fixed <?php bug(93); ?>: Crash in lookup_hostname on x86_64</dd>
<dd>Fixed <?php bug(92); ?>: xdebug_disable() doesn't disable the exception handler.</dd>
<dd>Fixed <?php bug(68); ?>: Summary not written when script ended with "exit()".</dd>


<dt>[15-09-2004]</dt>

<dd><h3>Added new features</h3></dd>
<dd>Added support for the new DBGp protocol for communicating with the debug
engine.</dd>
<dd>A computerized trace format for easier parsing by external programs.</dd>
<dd>The ability to set remote debugging features via the environment.  This
allows an IDE to emulate CGI and still pass the configuration through to the
debugger.  In CGI mode, PHP does not allow -d arguments.</dd>
<dd>Reimplementation of the tracing code, you can now only trace to file; this
greatly enhances performance as no string representation of variables need to
be kept in memory any more.</dd>
<dd>Re-implemented profiling support. Xdebug outputs information the same way
that cachegrind does so it is possible to use Kcachegrind as front-end.</dd>
<dd>Xdebug emits warnings when it was not loaded as a Zend extension.</dd>
<dd>Added showing private, protected and public to the fancy var_dump()
replacement function.</dd>
<dd>Added the setting of the TCP_NODELAY socket option to stop delays in
transferring data to the remote debugger client. (Patch by Christof J.  Reetz)</dd>
<dd>DebugClient: Added setting for port to listen on and implemented running
the previous command when pressing just enter.</dd>

<dd><h3>Added new functions</h3></dd>
<dd>xdebug_get_stack_depth() to return the current stack depth level.  </dd>
<dd>xdebug_get_tracefile_name() to retrieve the name of the tracefile. This is useful in case auto trace is enabled and you want to clean the trace file.  </dd>
<dd>xdebug_peak_memory_usage() which returns the peak memory used in a script. (Only works when --enable-memory-limit was enabled) </dd>

<dd><h3>Added feature requests</h3></dd>
<dd>FR #5: xdebug_break() function which interupts the script for the debug engine.  </dd>
<dd>FR #30: Dump current scope information in stack traces on error.  </dd>
<dd>FR #88: Make the url parameter XDEBUG_SESSION_START optional. So it can be disabled and the user does not need to add it.  </dd>

<dd><h3>Added new php.ini settings</h3></dd>
<dd>xdebug.auto_trace_file: to configure a trace file to write to as addition to the xdebug.auto_trace setting which just turns on tracing.  </dd>
<dd>xdebug.collect_includes: separates collecting names of include files from the xdebug.collect_params setting.  </dd>
<dd>xdebug.collect_return: showing return values in traces.  </dd>
<dd>xdebug.dump_global: with which you can turn off dumping of super globals even in you have that configured.  </dd>
<dd>xdebug.extended_info: turns off the generation of extended opcodes that are needed for stepping and breakpoints for the remote debugger. This is useful incase you want to profile memory usage as the generation of this extended info increases memory usage of oparrrays by about 33%.  </dd>
<dd>xdebug.profiler_output_dir: profiler output directory.  </dd>
<dd>xdebug.profiler_enable: enable the profiler.  </dd>
<dd>xdebug.show_local_vars: turn off the showing of local variables in the top most stack frame on errors.  </dd>
<dd>xdebug.show_mem_delta: show differences between current and previous memory usage on a function call level.  </dd>
<dd>xdebug.trace_options: to configure extra options for trace dumping: o XDEBUG_TRACE_APPEND option (1) </dd>

<dd><h3>Changed features</h3></dd>
<dd>xdebug_start_trace() now returns the filename of the tracefile (.xt is added to the requested name).  </dd>
<dd>Changed default debugging protocol to dbgp instead of gdb.  </dd>
<dd>Changed default debugger port from 17869 to 9000.  </dd>
<dd>Changed trace file naming: xdebug.trace_output_dir is now used to configure a directory to dump automatic traces; the trace file name now also includes the pid (xdebug.trace_output_name=pid) or a crc32 checksum of the current working dir (xdebug.trace_output_name=crc32) and traces are not being appended to an existing file anymore, but simply overwritten.  </dd>
<dd>Removed $this and $GLOBALS from showing variables in the local scope.  </dd>

<dd><h3>Removed functions</h3></dd>
<dd>xdebug_get_function_trace/xdebug_dump_function_trace() because of the new idea of tracing.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?php bug(89); ?>: var_dump shows empty strings garbled.  </dd>
<dd>Fixed <?php bug(85); ?>: Xdebug segfaults when no idekey is set.  </dd>
<dd>Fixed <?php bug(83); ?>: More than 32 parameters functions make xdebug crash.  </dd>
<dd>Fixed <?php bug(75); ?>: xdebug's var_dump implementation is not binary safe.  </dd>
<dd>Fixed <?php bug(73); ?>: komodo beta 4.3.7 crash.  </dd>
<dd>Fixed <?php bug(72); ?>: breakpoint_get returns wrong structure.  </dd>
<dd>Fixed <?php bug(69); ?>: Integer overflow in cachegrind summary.  </dd>
<dd>Fixed <?php bug(67); ?>: Filenames in Xdebug break URI RFC with spaces.  </dd>
<dd>Fixed <?php bug(64); ?>: Missing include of xdebug_compat.h.  </dd>
<dd>Fixed <?php bug(57); ?>: Crash with overloading functions.  </dd>
<dd>Fixed <?php bug(54); ?>: source command did not except missing -f parameter.  </dd>
<dd>Fixed <?php bug(53); ?>: Feature get misusing the supported attribute.  </dd>
<dd>Fixed <?php bug(51); ?>: Only start a debug session if XDEBUG_SESSION_START is passed as GET or POST parameter, or the DBGP_COOKIE is send to the server.  Passing XDEBUG_SESSION_STOP as GET/POST parameter will end the debug session and removes the cookie again. The cookie is also passed to the remote handler backends; for DBGp it is added to the <init> packet.  </dd>
<dd>Fixed <?php bug(49); ?>: Included file's names should not be stored by address.  </dd>
<dd>Fixed <?php bug(44); ?>: Script time-outs should be disabled when debugging.  </dd>
<dd>Fixed <?php bug(36); ?>: GDB handler using print causes segfault with wrong syntax </dd>
<dd>Fixed <?php bug(33); ?>: Implemented the use of the ZEND_POST_DEACTIVATE hook. Now we can handle destructors safely too.  </dd>
<dd>Fixed <?php bug(32); ?>: Unusual dynamic variables cause xdebug to crash.  </dd>


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
