<?php $title = "Xdebug: Documentation - Settings"; include "include/header.php"; hits ('xdebug-config'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - SETTINGS</span><br />

<?php include "include/menu-docs.php"; ?>

<a name="debugger"></a>
<span class="sans">PHP.INI SETTINGS</span><br />

<dl>
<dt>xdebug.auto_trace [boolean] (default: Off)</dt>
<dd>When this setting is set to on, the tracing of function calls will be
enabled just before the script is run. This makes it possible to trace code in
the <a
href="http://www.php.net/manual/en/configuration.directives.php#ini.auto-prepend-file">auto_prepend_file</a>.</dd>

<a name="collect_params"></a>
<dt>xdebug.collect_params [boolean] (default: Off)</dt>
<dd>This setting, defaulting to Off, controls whether Xdebug should collect the
parameters passed to functions when a function call is recorded in either the
function trace or the stack trace. It defaults to Off because for very large
scripts it may use huge amounts of memory and therefore make it impossible for
the huge script to run. You can most safely turn this setting on, but you can
expect some problems in scripts with a lot of functioncalls and/or huge data
structures as parameters.</dd>

<dt>xdebug.default_enable [boolean] (default: On)</dt>
<dd>If this setting is On then stacktraces will be shown by default on an error
event. You can disable showing stacktraces from your code with <i><a
href='docs.php#xdebug_disable'>xdebug_disable()</a></i>. As this is one of the
basic functions of Xdebug, it is advisable to leave this setting set to
'On'.</dd>
<dd><br />An example error message may look like:
<table border='1' cellspacing='0'>
<tr><td bgcolor='#ffbbbb' colspan="3"><b>Warning</b>: Wrong parameter count for str_replace() in <b>/home/httpd/html/test/xdebug_error.php</b> on line <b>5</b><br />
<tr><th bgcolor='#aaaaaa' colspan='3'>Call Stack</th></tr>
<tr><th bgcolor='#cccccc'>#</th><th bgcolor='#cccccc'>Function</th><th bgcolor='#cccccc'>Location</th></tr>
<tr><td bgcolor='#ffffff' align='center'>1</td><td bgcolor='#ffffff'>{main}()</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_error.php<b>:</b>0</td></tr>

<tr><td bgcolor='#ffffff' align='center'>2</td><td bgcolor='#ffffff'>fix_string(&#039;Derick&#039;)</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_error.php<b>:</b>8</td></tr>
<tr><td bgcolor='#ffffff' align='center'>3</td><td bgcolor='#ffffff'><a href='http://uk.php.net/str_replace' target='_new'>str_replace</a>
(&#039;a&#039;, &#039;b&#039;)</td><td bgcolor='#ffffff'>/home/httpd/html/test/xdebug_error.php<b>:</b>5</td></tr>
</table>
</dd>

<dt>xdebug.manual_url [string] (default: http://www.php.net)</dt>
<dd>This is the base url for the links from the function traces and error
message to the manual pages of the function from the message. It is advisable
to set this setting to use the closest mirror.</dd>

<a name="max_nesting_level"></a>
<dt>xdebug.max_nesting_level [integer] (default: 64)</dt>
<dd>Controls the protection mechanism for infinite recursion protection. The
value of this setting is the maximum level of nested functions that are allowed
before the script will be aborted.</dd>
</dl>

<br />
<a name="debugger"></a>
<span class="sans">REMOTE DEBUGGER SETTINGS</span><br />

<dl>
<dt>xdebug.remote_enable [boolean] (default: Off)</dt>
<dd>This switch controls whether Xdebug should try to contact a debug client
which is listening on the host and port as set with the settings
'xdebug.remote_host' and 'xdebug.remote_port'. If a connection can not be
established the script will just continue as if this setting was Off.</dd>

<dt>xdebug.remote_handler [string] (default: gdb)</dt>
<dd>Can be either 'php3' which selects the old <a
href='http://www.php.net/manual/en/debugger.php'>PHP 3 style debugger</a>
output, or 'gdb' which enables the GDB like debugger interface. As there is
currently no bundled client for the PHP 3 style debugger and because it's much
less powerfull then the GDB like one, it is advised to leave this setting to
'gdb'.</dd>

<dt>xdebug.remote_host [string] (default: localhost)</dt>
<dd>Selects the host where the debug client is running, you can either use a
host name or an IP address.</dd>

<dt>xdebug.remote_mode [string] (default: req)</dt>
<dd>Selects between the 'req' and 'jit' debugging modes for the 'gdb' handler.
If it is set to 'req' (the default) then Xdebug will try to connect to the
debug client as soon as the script starts. If it is set to 'jit' it will only
try to connect as soon as an error condition occurs.</dd>

<dt>xdebug.remote_port [integer] (default: 17869)</dt>
<dd>The port to which Xdebug tries to connect on the remote host. As the
bundled debug client only listens at the hardcoded port 17689 it is best to
leave this setting unchanged.</dd>
</dl>

<br />
<a name="profiler"></a>
<span class="sans">PROFILER SETTINGS</span><br />

<dl>
<dt>xdebug.auto_profile [boolean] (default: Off)</dt>
<dd>This option either enables or disables the automatic initialization of the
profiler at the start of the script. By default, automatic is disabled.</dd>
	
<dt>xdebug.auto_profile_mode [integer] (default: 0)</dt>
<dd>Allows you to specify what kind of output would you like the profiler to
generate, use the integer value used to represent each profiling mode <a
href="docs-profiling.php#retrieve">listed here</a>.</dd>
	
<dt>xdebug.output_dir [string] (default: /tmp)</dt>
<dd>The directory where the profiler output will be written to, make sure that
the user who the PHP will be running as has write permissions to that
directory. The created files will look something like this:
xdebug_[timestamp]_[pid].txt.</dd>
</dl>

<br />
<a name="superglobal"></a>
<span class="sans">SUPERGLOBAL DUMPING SETTINGS</span><br />

<dl>
<dt>xdebug.dump.COOKIE [string] (default: Empty)<br />
xdebug.dump.ENV [string] (default: Empty)<br />
xdebug.dump.FILES [string] (default: Empty)<br />
xdebug.dump.GET [string] (default: Empty)<br />
xdebug.dump.POST [string] (default: Empty)<br />
xdebug.dump.REQUEST [string] (default: Empty)<br />
xdebug.dump.SERVER [string] (default: Empty)<br />
xdebug.dump.SESSION [string] (default: Empty)</dt>
<dd>These seven settings control which data from the superglobals is shown when
an error situation occurs. Each php.ini setting can consist of a comma
seperated list of variables from this superglobal to dump, but make sure you do
not add spaces in this setting. In order to dump the REMOTE_ADDR and the
REQUEST_METHOD when an error occurs, add this setting:
<pre>
xdebug.dump.SERVER = REMOTE_ADDR,REQUEST_METHOD
</pre>
</dd>

<dt>xdebug.dump_once [boolean] (default: On)</dt>
<dd>Controls whether the values of the superglobals should be dumped on all
error situations (set to Off) or only on the first (set to On).</dd>

<dt>xdebug.dump_undefined [boolean] (default: Off)</dt>
<dd>If you want to dump undefined values from the superglobals you should set
this setting to On, otherwise leave it set to Off.</dd>
</dl>

<br /><br />

<!-- MAIN FEATURE END -->

			</span></td>
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
