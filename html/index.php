<?php include "include/header.php"; hits ('xdebug'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP</span><br />

<p>
The Xdebug extension helps you debugging your script by providing a lot of
valuable debug information. The debug information that Xdebug can
provide includes the following:
<ul>
<li>stack and function traces in error messages with:
  <ul>
  <li>full parameter display for user defined functions</li> 
  <li>function name, file name and line indications</li>
  <li>support for member functions</li>
  </ul>
<li>memory allocation</li>
<li>protection for infinite recursions</li>
</ul>
The default PHP error handler is modified, so that the error message includes
information about the functions in the call stack together with the parameters,
as you can see in this screenshot:
</p>
<p>
<img align="center" src="images/xdebug_ss1.jpg">
</p>
<p>
Sample output from xdebug_dump_function_trace(), it shows all functions that
were called plus variables (in most cases):
<img align="center" src="images/xdebug_ss2.jpg">
</p>

<span class="sans">PRECOMPILED MODULES</span><br />

<p>
There are a few precompiled modules, they are all for the non-debug version of PHP.
See the links on the right side.
</p>
<p>
Installing the precompiled modules is easy. Just place them in a directory, and
add the following line to php.ini: (don't forget to change the path and
filename to the correct one)
<pre>
zend_extension="/usr/local/php/modules/xdebug-4.2.2-1.0.0rc1.so"
</pre>
Or for the Windows:
<pre>
zend_extension_ts="c:/php/modules/xdebug-4.2.2-1.0.0rc1.dll"
</pre>
</p>

<a name="pecl"></a>
<span class="sans">PECL INSTALLATION</span><br />

<p>
As of xdebug 0.9.0 you can install xdebug through PEAR/PECL. This only works
with the latest CVS version of PHP (with PEAR version 0.9.1-dev installed) and
some UNIX.
</p>
<p>
Installing with PEAR/PECL is as easy as:
<pre>
# pear install http://files.derickrethans.nl/xdebug-1.0.0rc1.tgz
</pre>
but you still need to add the correct line to your php.ini: (don't forget to
change the path and filename to the correct one)
<pre>
zend_extension="/usr/local/php/modules/xdebug-4.2.2-1.0.0rc1.so"
</pre>
</p>

<a name="source"></a>
<span class="sans">DOWNLOAD SOURCE</span><br />

<p>
The extension is not totally finished yet, but it works fine for me. If you
have questions, feel free to send me an e-mail (but read <a
href="http://www.derickrethans.nl/20020430.php">this</a> first) at <a href="mailto:derick@php.net">derick
at php dot net</a>. If you like this piece of software, feel free to checkout
my <?php url('giftlist', 'wishlist'); ?>. This improves changes that I will be
continuing developing Xdebug as an open source extension.
</p>
<p>
You can download the source <?php url ('xdebug100rc1', 'here'); ?>.
</p>
<p>
You compile xdebug separately from the rest of PHP.  Note, however,
that you need access to the scripts "phpize" and "php-config".  If
your system does not have "phpize" and "php-config", you will need to
compile and install PHP from a source tarball first, as these script
are by-products of the PHP compilation and installation processes. It is
important that the source version matches the installed version as there
are slight, but important, differences between PHP versions.
</p>
<p>
Once you have access to "phpize" and "php-config", do the following:
<ol>
<li>Unpack the tarball: tar -xzf xdebug-1.x.x.tgz.  Note that you do
not need to unpack the tarball inside the PHP source code tree.
Xdebug is compiled separately, all by itself, as stated above.</li>

<li>cd xdebug-1.x.x</li>

<li>Run phpize: phpize
(or /path/to/phpize if phpize is not in your path).</li>

<li>./configure --enable-xdebug
(or:
../configure --enable-xdebug --with-php-config=/path/to/php-config
if php-config is not in your path)</li>

<li>cp modules/xdebug.so /to/wherever/you/want/it</li>

<li>add the following line to php.ini:
zend_extension="/wherever/you/put/it/xdebug.so"</li>

<li>Restart your webserver.</li>

<li>Write a PHP page that calls "phpinfo ();" Load it in a browser and
look for the info on the xdebug module.  If you see it, you have been
successful!</li>
</ol>
</p>

<p>
Besides the nice stack traces, it also exports the following functions:
<dl>
<dt>array xdebug_get_function_stack()</dt>
<dd>Returns an array which resembles a stack trace</dd>

<dt>string xdebug_call_function()</dt>
<dd>The name of the caller function</dd>

<dt>string xdebug_call_file()</dt>
<dd>The file in which the caller function was run</dd>

<dt>int xdebug_call_line()</dt>
<dd>The line in the caller file from which the current function was started</dd>

<dt>void xdebug_enable()</dt>
<dd>Enable showing stacktraces from within your PHP code</dd>

<dt>void xdebug_disable()</dt>
<dd>Disable showing stacktraces from within your PHP code</dd>

<dt>bool xdebug_is_enabled()</dt>
<dd>Return whether stacktraces would be show in case of an error or not</dd>

<dt>void xdebug_start_trace([string trace_file])</dt>
<dd>Start tracing function calls from this point. If the trace_file parameter
is specified the function calls will also be logged to this file.</dd>

<dt>void xdebug_stop_trace()</dt>
<dd>Stop tracing function calls and destroy the trace currently in memory</dd>

<dt>void xdebug_get_function_trace()</dt>
<dd>Shows the function calls since xdebug_start_trace(). You can find an
example of such a trace above</dd>

<dt>int xdebug_memory_usage()</dt>
<dd>Returns the memory footprint of the current script. (Only works when PHP
was compiled with --enable-memory-limit).</dd>
</dl>
</p>

<p>
There are also some ini settings:
<dl>
<dt>xdebug.max_nesting_level (default: 512)</dt>
<dd>Controls the protection mechanism for infinite recursion protection. The
value of this setting is the maximum level of nested functions that are allowed
before the script will be aborted.</dd>

<dt>xdebug.default_enable (default: On)</dt>
<dd>If this setting is On then stacktraces will be shown by default. You can
disable showing stacktraces from your code with xdebug_disable().</dd>
</dl>

<dt>xdebug.manual_url (default: http://www.php.net)</dt>
<dd>This is the base url for the links from the function traces to the manual
pages.</dd>
</dl>
</p>


<br /><br />

<!-- MAIN FEATURE END -->

			</class></td>
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>

<!-- SIDEBAR START -->

<span class="sans">RELEASES</span><br />

<span class='quote'>
<dl>
<dt>[01-09-2002]</dt>
<dd>
Source:
<ul>
<li><?php url ('xdebug100rc1', 'xdebug 1.0.0rc1'); ?></li>
</ul>
<br />

Modules for 4.3.0dev:
<ul>
<li><?php url ('xdebug100rc1-430-lnx', 'Linux'); ?></li>
<li><?php url ('xdebug100rc1-430-win', 'Windows'); ?></li>
<li><?php url ('xdebug100rc1-430-f46', 'FreeBSD 4.6'); ?></li>
</ul>
<br />

Module for 4.2.2/4.2.3:
<ul>
<li><?php url ('xdebug100rc1-422-lnx', 'Linux'); ?></li>
<li><?php url ('xdebug100rc1-422-win', 'Windows'); ?></li>
<li><?php url ('xdebug100rc1-422-f46', 'FreeBSD 4.6'); ?></li>
</ul>
<br />
</dd>
<br />

<span class="sans">ROADMAP</span><br />

<span class='quote'>
<dl>xdebug 1.1.0</dt>
<dd class="red">Respect error_reporting value in debug output</dd>
<dd class="green">Implement PHP 3 compatible debugging capabilities</dd>
<dd class="green">Implement gdb like debugging capabilities</li>
  <ul>
    <li class="orange">breakpoints</li>
    <li class="red">step in / step out / step over</li>
    <li class="red">accessing data</li>
    <ul>
      <li class="red">reading variables / globals</li>
    </ul>
  </ul>
</dl>

<dl>xdebug 1.2.0</dt>
<dd class="red">Update gdb like debugging capabilities</li>
  <ul>
    <li class="red">accessing data</li>
    <ul>
      <li class="red">modifying variables / globals</li>
    </ul>
    <li class="red">watches / conditional breakpoints</li>
  </ul>
<dd class="red">Profiling</li>
</dl>
<br />

<span class="sans">UPDATES</span><br />

<span class='quote'>
<dl>
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

<br />

<span class="sans">RELATED PROJECTS</span><br />

<span class='quote'><a class='serif' href="http://www.php.net/">PHP: Hypertext Preprocessor</a></span><br />
<span class='quote'><a class='serif' href="http://www.vl-srm.net/">SRM: Script Running Machine</a></span><br />

<!-- SIDEBAR END -->

						</td>
					</tr>
				</table>
			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
