<?php include "include/header.php"; hits ('xdebug-updates'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | UPDATES</span><br />

<?php include "include/menu.php"; ?>

<span class="sans">UPDATES</span><br />

<span class='quote'>
<dl>
<td>[13-11-2002]</dt>
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
