<?php
$features = array(
	'install' => array(
		'Installation',
		FUNC_INSTALL,
		'This section describes on how to install Xdebug.',
		"
<span class='sans'>PRECOMPILED MODULES</span><br />

<p>
There are a few precompiled modules for Windows, they are all for the non-debug
version of PHP.  See the links on the right side.
</p>
<p>
Installing the precompiled modules is easy. Just place them in a directory, and
add the following line to php.ini: (don't forget to change the path and
filename to the correct one)
<pre>
zend_extension_ts='c:/php/modules/php_xdebug-4.4.1-[KW:last_release_version].dll'
</pre>
</p>

<a name='pecl'></a>
<span class='sans'>PECL INSTALLATION</span><br />

<p>
As of Xdebug 0.9.0 you can install Xdebug through PEAR/PECL. This only works
with with PEAR version 0.9.1-dev or higher and some UNIX.
</p>
<p>
Installing with PEAR/PECL is as easy as:
</p>
<pre>
# pecl install xdebug-beta
</pre>
<p>
but you still need to add the correct line to your php.ini: (don't forget to
change the path and filename to the correct one)
</p>
<pre>
zend_extension='/usr/local/php/modules/xdebug.so'
</pre>

<a name='source'></a>
<span class='sans'>INSTALLATION FROM SOURCE</span><br />

<p>
You can download the source of the latest <b>stable</b> release [KW:last_release_version].
Alternatively you can obtain Xdebug from CVS:
</p>
<pre>
cvs -d :pserver:srmread@cvs.xdebug.org:/repository login
CVS password: srmread
cvs -d :pserver:srmread@cvs.xdebug.org:/repository co xdebug
</pre>
<p>
This will checkout the latest development version which is currently [KW:last_dev_version].
</p>

<a name='compile'></a>
<span class='sans'>COMPILING</span><br />

<p>
You compile Xdebug separately from the rest of PHP.  Note, however,
that you need access to the scripts 'phpize' and 'php-config'.  If
your system does not have 'phpize' and 'php-config', you will need to
compile and install PHP from a source tarball first, as these script
are by-products of the PHP compilation and installation processes. (Debian users
can install the required tools with <code>apt-get install php4-dev</code>). It
is important that the source version matches the installed version as there are
slight, but important, differences between PHP versions.  For a detailed
installation on Mac OSX see <a
href='http://pressedpants.com/archives/dated/2004/04/08/xdebug_on_os_x/'>Jason
Perkins'</a> installation instructions. Once you have access to 'phpize' and
'php-config', do the following:
</p>
<p>
<ol>
<li>Unpack the tarball: tar -xzf xdebug-[KW:last_release_version].tgz.  Note that you do
not need to unpack the tarball inside the PHP source code tree.
Xdebug is compiled separately, all by itself, as stated above.</li>

<li>cd xdebug-[KW:last_release_version]</li>

<li>Run phpize: phpize
(or /path/to/phpize if phpize is not in your path). See in the <a
href='#phpize'>table below</a> which version numbers it should show for
different PHP versions. Make sure you use the phpize that belongs to the PHP
version that you want to use Xdebug with.</li>

<li>./configure --enable-xdebug
(or:
./configure --enable-xdebug --with-php-config=/path/to/php-config
if php-config is not in your path).
<br /><br />
If this fails with something like:
<pre>../configure: line 1960: syntax error near unexpected token
`PHP_NEW_EXTENSION(xdebug,'
../configure: line 1960: `  PHP_NEW_EXTENSION(xdebug, xdebug.c
xdebug_code_coverage.c xdebug_com.c xdebug_handler_gdb.c
xdebug_handler_php3.c xdebug_handlers.c xdebug_llist.c xdebug_hash.c
xdebug_profiler.c xdebug_superglobals.c xdebug_var.c usefulstuff.c,
\$ext_shared)'</pre> then it means that you do not meet the PHP 4.3.x version
requirement for Xdebug.
<br /><br />
Another problem that might occur is:
<pre>configure: line 1145: PHP_INIT_BUILD_SYSTEM: command not found
configure: line 1151: syntax error near unexpected token `config.nice'
configure: line 1151: `PHP_CONFIG_NICE(config.nice)'</pre> You will need to
upgrade your autotools (autoconf, automake and libtool) or install the known
working versions: autoconf-2.13, automake-1.5 and libtool-1.4.3.</p></li>

<li>make</li>

<li>cp modules/xdebug.so /to/wherever/you/want/it</li>
</ol>

<a name='configure-php'></a>
<span class='sans'>CONFIGURE PHP TO USE XDEBUG</span><br />

<ol>
<li>add the following line to php.ini:
zend_extension='/wherever/you/put/it/xdebug.so' (for non-threaded use of PHP,
for example the CLI, CGI or Apache 1.3 module) or:
zend_extension_ts='/wherever/you/put/it/xdebug.so' (for threaded usage of PHP,
for example the Apache 2 work MPM or the the ISAPI module).
<strong>Note:</strong> In case you compiled PHP yourself and used
--enable-debug you would have to use zend_extension_debug=.</li>

<li>Restart your webserver.</li>

<li>Write a PHP page that calls '<i>phpinfo()</i>' Load it in a browser and
look for the info on the Xdebug module.  If you see it next to the Zend logo,
you have been successful! You can also use 'php -m' if you have a command
line version of PHP, it lists all loaded modules. Xdebug should appear
twice there (once under 'PHP Modules' and once under 'Zend Modules').</li>
</ol>
</p>

<a name='compat'></a>
<span class='sans'>COMPATIBILITY</span><br />
<p>
Xdebug does not work together with the Zend Optimizer or any other Zend
extension (DBG, APC, APD etc).  This is due to compatibility problems with
those modules. We will be working on figuring out what the problems are, and of
course try to fix those.
</p>


<a name='phpize'></a>
<span class='sans'>PHPIZE OUTPUT TABLE</span><br />
<p>
<table border='1' cellspacing='0'>
	<tr>
		<th class='ctr'>PHP Version:</th>
		<td class='ctr'>PHP Api Version:</td>
		<td class='ctr'>Zend Module Api No:</td>
		<td class='ctr'>Zend Extension Api No:</td>
		<td class='ctr'>Recommended version:</td>
	</tr>
	<tr>
		<th class='ctr'>4.4.x</th>
		<td class='ctr'>20020918</td>
		<td class='ctr'>20020429</td>
		<td class='ctr'>20050606</td>
		<td class='ctr'>[KW:last_release_version]</td>
	</tr>
	<tr>
		<th class='ctr'>5.1.x</th>
		<td class='ctr'>20041225</td>
		<td class='ctr'>20050922</td>
		<td class='ctr'>220051025</td>
		<td class='ctr'>[KW:last_release_version]</td>
	</tr>
	<tr>
		<th class='ctr'>5.2.x</th>
		<td class='ctr'>20041225</td>
		<td class='ctr'>20060613</td>
		<td class='ctr'>220060519</td>
		<td class='ctr'>[KW:last_release_version]</td>
	</tr>
</table>
<br/>
</p>

<a name='debugclient'></a>
<span class='sans'>DEBUGCLIENT INSTALLATION</span><br />

<p>
Unpack the Xdebug source tarball and issue the following commands:
</p>
<pre class='example'>
$ cd debugclient
$ ./configure --with-libedit
$ make
# make install
</pre>
<p>
This will install the debugclient binary in /usr/local/bin unless you don't 
have libedit installed on your system. You can either install it, or leave
out the '--with-libedit' option to configure. Debian 'unstable' users can
install the library with <code>apt-get install libedit-dev libedit2</code>.
</p>
<p>
If the configure script can not find libedit and you are sure you have (and
it's headers) installed correctly and you get link errors like the
following in your configure.log:
</p>
<pre class='example'>
/usr/lib64/libedit.so: undefined reference to `tgetnum'
/usr/lib64/libedit.so: undefined reference to `tgoto'
/usr/lib64/libedit.so: undefined reference to `tgetflag'
/usr/lib64/libedit.so: undefined reference to `tputs'
/usr/lib64/libedit.so: undefined reference to `tgetent'
/usr/lib64/libedit.so: undefined reference to `tgetstr'
collect2: ld returned 1 exit status
</pre>
<p>
you need to change your configure command to:
</p>
<pre class='example'>
$ LDFLAGS=-lncurses ./configure --with-libedit
</pre>"
	),
	'basic' => array(
		'Basic Features',
		FUNC_BASIC,
		'Xdebug\'s basic functions include the display of stack traces on error
		conditions, maximum nesting level protection and time tracking.',
		""
	),
	'display' => array(
		'Variable Display Features',
		FUNC_VAR_DUMP,
		'Xdebug replaces PHP\'s var_dump() function for displaying variables.
		Xdebug\'s version includes different colors for different types and
		places limits on the amount of array elements/object properties,
		maximum depth and string lengths. There are a few other functions
		dealing with variable display as well.',
		""
	),
	'stack_trace' => array(
		'Stack Traces',
		FUNC_STACK_TRACE,
		'The information that stack traces display, and the way how they are
		presented, can be configured to suit your needs.',
		""
	),
	'execution_trace' => array(
		'Function Traces',
		FUNC_FUNCTION_TRACE,
		'Xdebug allows you to log all function calls, including parameters and
		return values to a file in different formats.',
		""
	),
	'code_coverage' => array(
		'Code Coverage Analysis',
		FUNC_CODE_COVERAGE,
		'Code coverage tells you which lines of script (or set of scripts) have
		been executed during a request. With this information you can for
		example find out how good your unit tests are.',
		""
	),
	'profiler' => array(
		'Profiling PHP Scripts',
		FUNC_PROFILER,
		'Xdebug\'s built-in profiler allows you to find bottlenecks in your
		script and visualize those with an external tool such as KCacheGrind or
		WinCacheGrind.',
		'
<a name="introduction"></a>
<span class="sans">INTRODUCTION</span><br />

<p>Xdebug\'s Profiler is a powerful tool that gives you the ability to analyze
your PHP code and determine bottlenecks or generally see which parts of your
code are slow and could use a speed boost. The profiler in Xdebug 2 outputs
profiling information in the form of a cachegrind compatible file.  This allows
you to use the excellent <a href="http://kcachegrind.sf.net">KCacheGrind</a>
tool (Linux, KDE) to analyse your profiling data. Users of the Windows
operating system can use <a
href="http://sourceforge.net/projects/wincachegrind">WinCacheGrind</a>, the
functionality is different from KCacheGrind so the section that documents the
use of KCacheGrind on this page doesn\'t apply to this program.</p>

<p>In case you can not use KDE (or do not want to use KDE) the kcachegrind
package also comes with a perl script "ct_annotate" which produces ASCII output
from the profiler trace files.</p>

<a name="starting"></a>
<span class="sans">STARTING THE PROFILER</span><br />

<p>Profiling is enabled by setting the
[CFG:profiler_enable] setting
to 1 in php.ini. This instructs Xdebug to start writing profiling information
into the dump directory configured with the
[CFG:profiler_output_dir]
directive. The name of the generated file always starts with
"<span class="filename">cachegrind.out.</span>" and ends with either the PID
(process ID) of the PHP (or Apache) process or the crc32 hash of the 
directory containing the initially debugged script. Make sure you have enough
space in your [CFG:profiler_output_dir] as the amount of information generated by the profiler can be
enormous for complex scripts, for example up to 500MB for a complex application
like <a href="http://ez.no">eZ publish</a>.</p>

<a name="misc"></a>
<span class="sans">ANALYSING PROFILES</span><br />

<p>After a profile information file has been generated you can open it with
<a href="http://kcachegrind.sf.net">KCacheGrind</a>:</p>

<p><img src="/images/docs/kc-open.png"/></p>

<p>Once the file is opened you have plenty of information available in the 
different panes of <a href="http://kcachegrind.sf.net">KCacheGrind</a>. On the left side you find the "Flat Profile"
pane showing all functions in your script sorted by time spend in this function,
and all its children.
<img class="l" src="/images/docs/kc-profile.png" align="left"/>
The second column "Self" shows the time spend in this function (without its
children), the third column "Called" shows how often a specific function was
called and the last column "Function" shows the name of the function. Xdebug
changes internal PHP function names by prefixing the function name with
"php::" and include files are handled in a special way too. Calls to include
(and include_one, require and require_once) are followed by "::" and the 
filename of the included file. In the screenshot on the left you can see this
for "include::/home/httpd/ez_34/v..." and an example of an internal PHP
function is "php::mysql_query".
<img class="r" src="/images/docs/kc-percentage.png" align="right"/>
The numbers in the first two columns can be
either percentages of the full running time of the script (like in the
example) or absolute time (1 unit is 1/10.000.000th of a second). You can
switch between the two modes with the button you see on the right.</p>

<p>The pane on the left exist of an upper and lower pane. The upper one
shows information about which functions called the current selected function
("eztemplatedesignresource-&gt;executecompiledtemplate in the screenshot).
<img class="r" src="/images/docs/kc-right-call.png" align="right"/>
The lower pane shows information about the functions that the current selected
function called.</p>

<p>The "Cost" column in the upper pane shows the time spend in the current
selected function while being called from the function in the list. The numbers
in the Cost column added up will always be 100%. The "Cost" column in the lower
pane shows the time spend while calling the function from the list. While adding
the numbers in this list up, you will most likely never reach 100% as the
selected function itself will also takes time to execute.</p>

<p>The "All Callers" and "All Calls" tabs show not only the direct call from
<img class="l" src="/images/docs/kc-right-callers.png" align="left"/>
which the function was called respectively all directly made
function calls but also function calls made more levels up and down.
The upper pane in the screenshot on the left shows all functions calling the
current selected one, both directly and indirectly with other functions
inbetween them on the stack. The "Distance" column shows how many function
calls are between the listed and the current selected one (-1). If there are
different distances between two functions, it is shown as a range (for example
"5-24". The number in parentheses is the median distance. The lower pane is
similar except that it shows information on functions called from the current
selected one, again either direct or indirect.</p>
		'
	),
	'remote' => array(
		'Remote Debugging',
		FUNC_REMOTE,
		'Xdebug provides an interface for debugger clients that interact with
		running PHP scripts. This section explains how to set-up PHP and Xdebug
		to allow this, and introduces a few clients.',
		'
<a name="introduction"></a>
<span class="sans">INTRODUCTION</span><br />

<p>Xdebug\'s (remote) debugger allows you to examine data structure, 
interactively walk through your and debug your code. There are two different
protocols to communicate with the debugger: the old GDB-like command protocol
(GDB) which is implemented in Xdebug 1.3 and 2; and the <a
href="/docs-dbgp.php">DBGp</a> protocol which is implemented in Xdebug 2.
</p>

<a name="clients"></a>
<span class="sans">CLIENTS</span><br />
<p>
Xdebug 2 is bundled with a <b>simple command line client</b> for the
<a href="/docs-dbgp.php">DBGp</a> protocol.
There are a few other client implementations (both free and commercial) as well:
<ul>
<li><b>Eclipse
<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=169408">plugin</a></b>, which
has been submitted as an enhancement for the
<a href="http://www.eclipse.org/php/">PDT</a>.</li>
<li>ActiveState\'s <b><a href="http://activestate.com/products/komodo_ide/?src=AScom&type=bn&X=HP&campaign=KMD">Komodo</a></b>.</li>
<li>WaterProof\'s <b><a href="http://www.waterproof.fr/products/PHPEdit/">PHPEdit</a></b> (from version 2.10).</li>
<li>Anchor System\'s <b><a href="http://www.anchorsystems.co.jp/anchor/ashp/peggy/pegindex.html">Peggy</a></b> (Japanese).</li>
<li><b><a href="http://protoeditor.sourceforge.net/">Protoeditor</a></b>.</li>
<li><b><a href="http://tswebeditor.net.tc/">tsWebeditor</a></b>.</li>
<li>Xored\'s <b><a href="http://www.xored.com/trustudio">TrueStudio IDE</a></b>.</li>
<li><b>VIM <a href="http://www.vim.org/scripts/script.php?script_id=1152">plugin</a></b>.</li>
<li>Maguma\'s <b><a href="http://www.maguma.com/products/?article=Workbench">WorkBench</a></b>.</li>
</ul>
</p>
<p>
A simple command line client for the GDB protocol is bundled with <b>Xdebug
1.3</b>. A client implementation of the deprecated GDB protocol can also be found in the free editor
<a href="http://weaverslave.ws">WeaverSlave</a>.
</p>

<a name="starting"></a>
<span class="sans">STARTING THE DEBUGGER</span><br />

<p>In order to enable Xdebug\'s debugger you need to make some configuration
settings in php.ini. These settings are [CFG:remote_enable] to enable the
debugger, [CFG:remote_host] and [CFG:remote_port] to configure the IP address
and port where the debugger should connect to and [CFG:remote_handler] to
configure which debug backend to use ("gdb" or "dbgp"). If you want the
debugger to initiate a session when an error situation occurs (php error or
exception) then you also need to change the [CFG:remote_mode] setting.
Allowed values for this setting are "req" (the default) which makes the
debugger initiate a session as soon as a script is started, or "jit" when a
session should only be initiated on an error.
</p>

<a name="activate_debugger"></a>
<p>
After made all those settings Xdebug will still not start a debugging session
automatically when a script is run. You need to activate Xdebug\'s debugger
and you can do that in two ways:
<ol>
<li>When running the script from the command line you need to set an
environment variable, like:
<pre class="example">
export XDEBUG_CONFIG="[CFGS:idekey]=session_name [CFGS:remote_enable]=1"
php myscript.php
</pre>
You can also configure the [CFG:remote_host], [CFG:remote_port],
[CFG:remote_mode] and [CFG:remote_handler] in this same environment variable.
All those configurable settings can also be set with normal php.ini
settings.</li>

<li>If you want to debug a script started through a web browser, simply add
<code>XDEBUG_SESSION_START=session_name</code> as parameter to the URL. Refer
to the <a href="#browser_session">next section</a> to read on how debug
sessions work from within a browser window.</li>
</ol>
</p>

<p>
Before you start your script you will need to tell your client that it can
receive debug connections, please refer to the documentation of the specific
client on how to do this. To use the bundled client simply start it after
<a href=install.php#debugclient>compiling and installing</a> it. You can
start it by running "debugclient". If you want to use the GDB commandset
to debug your scripts, make sure you use a debugclient as bundled with 
Xdebug 1.3 as the one bundled with Xdebug 2 only works with the DBGp
commandset.
</p>
<p>
When the debugclient starts it will show the following information and then
waits until a connection is initiated by the debug server:
</p>
<pre class="example">
Xdebug Simple DBGp client (0.8.0)
Copyright 2002-2004 by Derick Rethans.
- libedit support: enabled
	 
Waiting for debug server to connect.
</pre>
<p>
After a connection is made the output of the debug server is shown:
</p>
<pre class="example">
Connect
&lt;init fileuri="file:///home/derick/foo5.php" language="PHP"
      protocol_version="1.0" appid="27010"&gt;
    &lt;engine version="2.0.0dev"&gt;Xdebug&lt;/engine&gt;
    &lt;author&gt;Derick Rethans&lt;/author&gt;
    &lt;url&gt;http://xdebug.org&lt;/url&gt;
    &lt;copyright&gt;Copyright (c) 2002-2004 by Derick Rethans&lt;/copyright&gt;
&lt;/init&gt;
(cmd)
</pre>
<p>
Now you can use the commandset as explained on the
<a href="docs-gdb.php">GDB</a> or
<a href="docs-dbgp.php">DBGp</a> documentation page. When the script ends the
debug server disconnects from the client and the debugclient resumes with
waiting for a new connection.
</p>


<a name="browser_session"></a>
<span class="sans">HTTP DEBUG SESSIONS</span><br />
<p>
Xdebug contains functionality to keep track of a debug session when started
through a browser: cookies. This works like this:
<ul>
<li>When the URL variable <code>XDEBUG_SESSION_START=name</code> is appended to
an URL Xdebug emits a cookie with the name "XDEBUG_SESSION" and as value the
value of the XDEBUG_SESSION_START URL parameter. The expiry of the cookie is
one hour. The DBGp protocol also passes this same value to the init packet
when connecting to the debugclient in the "idekey" attribute.</li>
<li>When there is a GET (or POST) variable XDEBUG_SESSION_START or the
XDEBUG_SESSION cookie is set, Xdebug will try to connect to a debugclient.</li>
<li>To stop a debug session (and to destroy the cookie) simply add the URL
parameter <code>XDEBUG_SESSION_STOP</code>. Xdebug will then no longer try
to make a connection to the debugclient.</li>
</ul>
</p>
		'
	),
	'faq' => array(
		'FAQ',
		0,
		'Frequently Asked Questions',
		'
<span class="sans">USING XDEBUG</span>
<dl class="faq">
<dt>Q: phpinfo() reports that Xdebug is installed and enabled, yet I
still don\'t get any stacktraces when an error happens.
</dt>
<dd>A: You have to search through all your PHP libraries and include files for any
"set_error_handler" calls. If there are any, you have to either comment it out,
or change the body of the handler function to call xdebug_* api functions.
</dd>

<dt>Q: The debug client doesn\'t receive any connections, what do I do
wrong?</dt>
<dd>A: You probably forgot to set the environment variable or to add 
the necessary information to your URL. See the 
<a href=\'docs-debugger.php#activate_debugger\'>documentation</a> for
more information.</dd>

<dt>Q: I\'m using XAMPP, but I can\'t seem to get the packaged xdebug extension
to work properly.</dt>
<dd>A: If you uncommented the "extension=php_xdebug.dll" line, that is to be
expected. Xdebug <b>needs</b> to be loaded with the zend_extension_ts=
"C:\path\to\php_xdebug.dll" directive. You\'ll also likely have to disable the
loading of the Zend Optimizer, since it\'s enabled by default, and doesn\'t work
well with Xdebug. So look for the related entry in php.ini, and comment it
out.</dd>

</dl>
		'
	),
);
?>
