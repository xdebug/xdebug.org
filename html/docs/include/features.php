<?php
$features = array(
	'all_functions' => array(
		'All Functions',
		FUNC_ALL,
		'This section describes all available functions available in Xdebug.',
		''
	),

	'all_settings' => array(
		'All Settings',
		FUNC_ALL,
		'This section describes all available configuration settings available in Xdebug.',
		''
	),

	'install' => array(
		'Installation',
		FUNC_INSTALL,
		'This section describes on how to install Xdebug.',
		"
<h2>Precompiled Modules</h2>

<p>
There are a few precompiled modules for Windows, they are all for the non-debug
version of PHP.  See the links on the right side.
</p>
<p>
Installing the precompiled modules is easy. Just place them in a directory, and
add the following line to php.ini: (don't forget to change the path and
filename to the correct one &mdash; but make sure you use the <b>full
path</b>)
<pre>
zend_extension_ts=\"c:/php/modules/php_xdebug-4.4.1-[KW:last_release_version].dll\"
</pre>
</p>

<a name='pecl'></a>
<h2>PECL Installation</h2>

<p>
As of Xdebug 0.9.0 you can install Xdebug through PEAR/PECL. This only works
with with PEAR version 0.9.1-dev or higher and some UNIX.
</p>
<p>
Installing with PEAR/PECL is as easy as:
</p>
<pre>
# pecl install xdebug
</pre>
<p>
but you still need to add the correct line to your php.ini: (don't forget to
change the path and filename to the correct one &mdash; but make sure you use
the <b>full path</b>)
</p>
<pre>
zend_extension=\"/usr/local/php/modules/xdebug.so\"
</pre>

<a name='source'></a>
<h2>Installation From Source</h2>

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
You can also browse the source at <a href='http://cvs.xdebug.org/cgi-bin/viewvc.cgi/xdebug/'>http://cvs.xdebug.org</a>.
</p>

<a name='compile'></a>
<h2>Compiling</h2>

<p>
You compile Xdebug separately from the rest of PHP.  Note, however,
that you need access to the scripts 'phpize' and 'php-config'.  If
your system does not have 'phpize' and 'php-config', you will need to
compile and install PHP from a source tarball first, as these script
are by-products of the PHP compilation and installation processes. (Debian users
can install the required tools with <code>apt-get install php4-dev</code>, or
<code>apt-get install php5-dev</code>). It is important that the source version
matches the installed version as there are slight, but important, differences
between PHP versions.  Once you have access to 'phpize' and
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
<h2>Configure PHP to Use Xdebug</h2>

<ol>
<li>add the following line to php.ini:
zend_extension=\"/wherever/you/put/it/xdebug.so\" (for non-threaded use of PHP,
for example the CLI, CGI or Apache 1.3 module) or:
zend_extension_ts=\"/wherever/you/put/it/xdebug.so\" (for threaded usage of PHP,
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
<h2>Compatibility</h2>
<p>
Xdebug does not work together with the Zend Optimizer or any other Zend
extension (DBG, APD etc).  This is due to compatibility problems with those
modules. We will be working on figuring out what the problems are, and of
course try to fix those.
</p>


<a name='phpize'></a>
<h2>phpize Output Table</h2>
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
<h2>Debugclient Installation</h2>

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
		'
<h2>Effect of settings on var_dump()</h2>
<p>
There is a number of settings that control the output of Xdebug\'s modified
[FUNC:var_dump] function: [CFG:var_display_max_children],
[CFG:var_display_max_data]
and [CFG:var_display_max_depth]. The effect of these three settings is best
shown with an example. The script below is run four time, each time with
different settings. You can use the tabs to see the difference.
</p>
<h3>The script</h3>
<div class="example">
<p>
<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">class&nbsp;</span><span style="color: #0000BB">test&nbsp;</span><span style="color: #007700">{<br />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;</span><span style="color: #0000BB">$pub&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;</span><span style="color: #0000BB">$priv&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">true</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;protected&nbsp;</span><span style="color: #0000BB">$prot&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">42</span><span style="color: #007700">;<br />}<br /></span><span style="color: #0000BB">$t&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">test</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$t</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">pub&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$t</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$data&nbsp;</span><span style="color: #007700">=&nbsp;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'one\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">\'a&nbsp;somewhat&nbsp;long&nbsp;string!\'</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'two\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'two.one\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'two.one.zero\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">210</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'two.one.one\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'two.one.one.zero\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">3.141592564</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'two.one.one.one\'&nbsp;&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">2.7</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;),<br />&nbsp;&nbsp;&nbsp;&nbsp;),<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'three\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$t</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #DD0000">\'four\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">range</span><span style="color: #007700">(</span><span style="color: #0000BB">0</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">5</span><span style="color: #007700">),<br />);<br /></span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$data&nbsp;</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;<br /></span>

</span>
</code>
</p>
</div>
<h3>The results</h3>
    <div id="demosettings" class="yui-navset">
        <ul class="yui-nav">
            <li class="selected"><a href="#default"><em>default</em></a></li>
            <li><a href="#children"><em>children=2</em></a></li>
            <li><a href="#data"><em>data=16</em></a></li>
            <li><a href="#depth"><em>depth=2</em></a></li>
			<li><a href="#multiple"><em>children=3, data=8, depth=1</em></a></li>
        </ul>
        <div class="yui-content">
            <div id="default">
<pre>
<b>array</b>
  \'one\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'a somewhat long string!\'</font> <i>(length=23)</i>
  \'two\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      \'two.one\' <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b>
          \'two.one.zero\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>210</font>
          \'two.one.one\' <font color=\'#888a85\'>=&gt;</font> 
            <b>array</b>
              ...
  \'three\' <font color=\'#888a85\'>=&gt;</font> 
    <b>object</b>(<i>test</i>)[<i>1</i>]
      <i>public</i> \'pub\' <font color=\'#888a85\'>=&gt;</font> 
        <i>&</i><b>object</b>(<i>test</i>)[<i>1</i>]
      <i>private</i> \'priv\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
      <i>protected</i> \'prot\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>42</font>
  \'four\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      0 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>0</font>
      1 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>1</font>
      2 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>2</font>
      3 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>3</font>
      4 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>4</font>
      5 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>5</font>
</pre>
            </div>
            <div id="children">
<pre>
<b>array</b>
  \'one\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'a somewhat long string!\'</font> <i>(length=23)</i>
  \'two\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      \'two.one\' <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b>
          \'two.one.zero\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>210</font>
          \'two.one.one\' <font color=\'#888a85\'>=&gt;</font> 
            <b>array</b>
              ...
  <i>more elements...</i>
</pre>
            </div>
            <div id="data">
<pre>
<b>array</b>
  \'one\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'a somewhat long \'...</font> <i>(length=23)</i>
  \'two\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      \'two.one\' <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b>
          \'two.one.zero\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>210</font>
          \'two.one.one\' <font color=\'#888a85\'>=&gt;</font> 
            <b>array</b>
              ...
  \'three\' <font color=\'#888a85\'>=&gt;</font> 
    <b>object</b>(<i>test</i>)[<i>1</i>]
      <i>public</i> \'pub\' <font color=\'#888a85\'>=&gt;</font> 
        <i>&</i><b>object</b>(<i>test</i>)[<i>1</i>]
      <i>private</i> \'priv\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
      <i>protected</i> \'prot\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>42</font>
  \'four\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      0 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>0</font>
      1 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>1</font>
      2 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>2</font>
      3 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>3</font>
      4 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>4</font>
      5 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>5</font>
</pre>
            </div>
            <div id="depth">
<pre>
<b>array</b>
  \'one\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'a somewhat long string!\'</font> <i>(length=23)</i>
  \'two\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      \'two.one\' <font color=\'#888a85\'>=&gt;</font> 
        <b>array</b>
          ...
  \'three\' <font color=\'#888a85\'>=&gt;</font> 
    <b>object</b>(<i>test</i>)[<i>1</i>]
      <i>public</i> \'pub\' <font color=\'#888a85\'>=&gt;</font> 
        <i>&</i><b>object</b>(<i>test</i>)[<i>1</i>]
      <i>private</i> \'priv\' <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>true</font>
      <i>protected</i> \'prot\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>42</font>
  \'four\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      0 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>0</font>
      1 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>1</font>
      2 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>2</font>
      3 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>3</font>
      4 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>4</font>
      5 <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>5</font>
</pre>
            </div>
            <div id="multiple">
<pre>
<b>array</b>
  \'one\' <font color=\'#888a85\'>=&gt;</font> <small>string</small> <font color=\'#cc0000\'>\'a somewh\'...</font> <i>(length=23)</i>
  \'two\' <font color=\'#888a85\'>=&gt;</font> 
    <b>array</b>
      ...
  \'three\' <font color=\'#888a85\'>=&gt;</font> 
    <b>object</b>(<i>test</i>)[<i>1</i>]
      ...
  <i>more elements...</i>
</pre>
            </div>
        </div>
    </div>',
		array( 'tabfields' => array( 'demosettings' ) )
	),
	'stack_trace' => array(
		'Stack Traces',
		FUNC_STACK_TRACE,
		'When Xdebug is activated it will show a stack trace whenever PHP
		decides to show a notice, warning, error etc. The information that
		stack traces display, and the way how they are presented, can be
		configured to suit your needs.',
		'
<p>
The stack traces that Xdebug shows on error situations (if <a
href="http://www.php.net/manual/en/ref.errorfunc.php#ini.display-errors">display_errors</a>
is set to On in php.ini) are quite conservative in the amount of
information that they show. This is because large amounts of information can
slow down both the execution of the scripts and the rendering of the stack
traces themselves in the browser. However, it is possible to make the stack
traces show more detailed information with different settings.
</p>
<h2>Variables in Stack Traces</h2>
<p>
By default Xdebug will now show variable information in the stack traces that
it produces. Variable information can take quite a bit of resources, both while
collecting or displaying. However, in many cases it is useful that variable
information is displayed, and that is why Xdebug has the setting
[CFG:collect_params]. The script below, in combination with what the output
will look like with different values of this setting is shown in the example
below.
</p>
<h3>The script</h3>
<div class="example">
<p>
<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">function&nbsp;</span><span style="color: #0000BB">foo</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$a&nbsp;</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;for&nbsp;(</span><span style="color: #0000BB">$i&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">1</span><span style="color: #007700">;&nbsp;</span><span style="color: #0000BB">$i&nbsp;</span><span style="color: #007700">&lt;&nbsp;</span><span style="color: #0000BB">$a</span><span style="color: #007700">[</span><span style="color: #DD0000">\'foo\'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">$i</span><span style="color: #007700">++)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span><span style="color: #0000BB">$i&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">500000</span><span style="color: #007700">)&nbsp;</span><span style="color: #0000BB">xdebug_break</span><span style="color: #007700">();<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />}<br /><br /></span><span style="color: #0000BB">set_time_limit</span><span style="color: #007700">(</span><span style="color: #0000BB">1</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$c&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">stdClass</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$c</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">bar&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">100</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">$a&nbsp;</span><span style="color: #007700">=&nbsp;array(<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">42&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">\'foo\'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">912124</span><span style="color: #007700">,<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$c</span><span style="color: #007700">,&nbsp;new&nbsp;</span><span style="color: #0000BB">stdClass</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">fopen</span><span style="color: #007700">(&nbsp;</span><span style="color: #DD0000">\'/etc/passwd\'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">\'r\'&nbsp;</span><span style="color: #007700">)<br />);<br /></span><span style="color: #0000BB">foo</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$a&nbsp;</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">?&gt;<br /></span>
	</span>
	</code>
</p>
</div>

<h3>The results</h3>
<p>
Different values for the [CFG:collect_params] setting give different output,
which you can see below:
</p>

    <div id="collectparams" class="yui-navset">
        <ul class="yui-nav">
            <li class="selected"><a href="#default"><em>default</em></a></li>
            <li><a href="#collect-params-1"><em>1</em></a></li>
            <li><a href="#collect-params-2"><em>2</em></a></li>
            <li><a href="#collect-params-3"><em>3</em></a></li>
            <li><a href="#collect-params-4"><em>4</em></a></li>
        </ul>
        <div class="yui-content">
            <div id="default">
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>34</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58564</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>

<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62764</td><td bgcolor=\'#eeeeec\'>foo(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
</table></font>
            </div>
            <div id="collect-params-1">
<pre>
ini_set(\'xdebug.collect_params\', \'1\');
</pre>
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>31</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58132</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62380</td><td bgcolor=\'#eeeeec\'>foo( <span><font color=\'#ce5c00\'>array(5)</font></span> )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
</table></font>
            </div>
            <div id="collect-params-2">
<pre>
ini_set(\'xdebug.collect_params\', \'2\');
</pre>
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>31</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58564</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62812</td><td bgcolor=\'#eeeeec\'>foo( <span title=\'array (42 =&gt; FALSE, &apos;foo&apos; =&gt; 912124, 43 =&gt; class stdClass { public $bar = 100 }, 44 =&gt; class stdClass {  }, 45 =&gt; resource(2) of type (stream))\'><font color=\'#ce5c00\'>array(5)</font></span> )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
</table></font>
            </div>
            <div id="collect-params-3">
<pre>
ini_set(\'xdebug.collect_params\', \'3\');
</pre>
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>31</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58564</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62812</td><td bgcolor=\'#eeeeec\'>foo( <span>array (42 =&gt; FALSE, &apos;foo&apos; =&gt; 912124, 43 =&gt; class stdClass { public $bar = 100 }, 44 =&gt; class stdClass {  }, 45 =&gt; resource(2) of type (stream))</span> )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
</table></font>
            </div>
            <div id="collect-params-4">
<pre>
ini_set(\'xdebug.collect_params\', \'4\');
</pre>
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>31</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58132</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62380</td><td bgcolor=\'#eeeeec\'>foo( <span>$a = </span><span>array (42 =&gt; FALSE, &apos;foo&apos; =&gt; 912124, 43 =&gt; class stdClass { public $bar = 100 }, 44 =&gt; class stdClass {  }, 45 =&gt; resource(2) of type (stream))</span> )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
</table></font>
            </div>
        </div>
    </div>
<h2>Additional Information</h2>
<p>
On top of showing the values of variables that were passed to each function
Xdebug can also optionally show information about selected superglobals by using
the [CFG:dump_globals] and [CFG:dump.*] settings. The settings [CFG:dump_once]
and [CFG:dump_undefined] slightly modify when and which information is shown
from the available superglobals. With the [CFG:show_local_vars] setting you can
instruct Xdebug to show all variables available in the top-most stack level for
a user defined function as well. The examples below show this (the script is
used from the example above).
</p>
	<div id="othersettings" class="yui-navset">
        <ul class="yui-nav">
            <li class="selected"><a href="#add-default"><em>default</em></a></li>
            <li><a href="#add-superglobals"><em>dump_superglobals=1</em></a></li>
            <li><a href="#add-local-vars"><em>show_local_vars=1</em></a></li>
        </ul>
        <div class="yui-content">
            <div id="add-default">
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>34</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58564</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>

<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62764</td><td bgcolor=\'#eeeeec\'>foo(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
</table></font>
            </div>
            <div id="add-superglobals">
<pre>
ini_set(\'xdebug.collect_vars\', \'on\');
ini_set(\'xdebug.collect_params\', \'4\');
ini_set(\'xdebug.dump_globals\', \'on\');
ini_set(\'xdebug.dump.SERVER\', \'REQUEST_URI\');
</pre>
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>33</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58132</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0004</td><td bgcolor=\'#eeeeec\' align=\'right\'>62436</td><td bgcolor=\'#eeeeec\'>foo(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
<tr><th colspan=\'5\' align=\'left\' bgcolor=\'#e9b96e\'>Dump <i>$_SERVER</i></th></tr>
<tr><td colspan=\'2\' align=\'right\' bgcolor=\'#eeeeec\' valign=\'top\'><pre>$_SERVER[\'REQUEST_URI\']&nbsp;=</pre></td><td colspan=\'3\' bgcolor=\'#eeeeec\'><pre><small>string</small> <font color=\'#cc0000\'>\'/test/xdebug/docs/stack.php?level=5\'</font> <i>(length=35)</i>
</pre></td></tr>
</table></font>
            </div>
            <div id="add-local-vars">
<pre>
ini_set(\'xdebug.collect_vars\', \'on\');
ini_set(\'xdebug.collect_params\', \'4\');
ini_set(\'xdebug.dump_globals\', \'on\');
ini_set(\'xdebug.dump.SERVER\', \'REQUEST_URI\');
ini_set(\'xdebug.show_local_vars\', \'on\');
</pre>
<br />
<font size=\'1\'><table border=\'1\' cellspacing=\'0\' cellpadding=\'1\'>
<tr><th align=\'left\' bgcolor=\'#f57900\' colspan="5"><span style=\'background-color: #cc0000; color: #fce94f; font-size: x-large;\'>( ! )</span> Fatal error: Maximum execution time of 1 second exceeded in /home/httpd/html/test/xdebug/docs/stack.php on line <i>31</i></th></tr>
<tr><th align=\'left\' bgcolor=\'#e9b96e\' colspan=\'5\'>Call Stack</th></tr>
<tr><th align=\'center\' bgcolor=\'#eeeeec\'>#</th><th align=\'left\' bgcolor=\'#eeeeec\'>Time</th><th align=\'left\' bgcolor=\'#eeeeec\'>Memory</th><th align=\'left\' bgcolor=\'#eeeeec\'>Function</th><th align=\'left\' bgcolor=\'#eeeeec\'>Location</th></tr>
<tr><td bgcolor=\'#eeeeec\' align=\'center\'>1</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0001</td><td bgcolor=\'#eeeeec\' align=\'right\'>58132</td><td bgcolor=\'#eeeeec\'>{main}(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>0</td></tr>

<tr><td bgcolor=\'#eeeeec\' align=\'center\'>2</td><td bgcolor=\'#eeeeec\' align=\'center\'>0.0005</td><td bgcolor=\'#eeeeec\' align=\'right\'>62588</td><td bgcolor=\'#eeeeec\'>foo(  )</td><td title=\'/home/httpd/html/test/xdebug/docs/stack.php\' bgcolor=\'#eeeeec\'>../stack.php<b>:</b>47</td></tr>
<tr><th colspan=\'5\' align=\'left\' bgcolor=\'#e9b96e\'>Dump <i>$_SERVER</i></th></tr>
<tr><td colspan=\'2\' align=\'right\' bgcolor=\'#eeeeec\' valign=\'top\'><pre>$_SERVER[\'REQUEST_URI\']&nbsp;=</pre></td><td colspan=\'3\' bgcolor=\'#eeeeec\'><pre><small>string</small> <font color=\'#cc0000\'>\'/test/xdebug/docs/stack.php?level=6\'</font> <i>(length=35)</i>

</pre></td></tr>
<tr><th align=\'left\' colspan=\'5\' bgcolor=\'#e9b96e\'>Variables in local scope (#2)</th></tr>
<tr><td colspan=\'2\' align=\'right\' bgcolor=\'#eeeeec\' valign=\'top\'><pre>$a&nbsp;=</pre></td><td colspan=\'4\' bgcolor=\'#eeeeec\'><pre>
<b>array</b>
  42 <font color=\'#888a85\'>=&gt;</font> <small>boolean</small> <font color=\'#75507b\'>false</font>
  \'foo\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>912124</font>
  43 <font color=\'#888a85\'>=&gt;</font> 
    <b>object</b>(<i>stdClass</i>)[<i>1</i>]
      <i>public</i> \'bar\' <font color=\'#888a85\'>=&gt;</font> <small>int</small> <font color=\'#4e9a06\'>100</font>
  44 <font color=\'#888a85\'>=&gt;</font> 
    <b>object</b>(<i>stdClass</i>)[<i>2</i>]
  45 <font color=\'#888a85\'>=&gt;</font> <b>resource</b>(<i>2</i><font color=\'#2e3436\'>,</font> <i>stream</i>)
</pre></td></tr>
<tr><td colspan=\'2\' align=\'right\' bgcolor=\'#eeeeec\' valign=\'top\'><pre>$i&nbsp;=</pre></td><td colspan=\'4\' bgcolor=\'#eeeeec\'><pre><small>int</small> <font color=\'#4e9a06\'>275447</font>
</pre></td></tr>
</table></font>
            </div>
        </div>
    </div>',
		array( 'tabfields' => array( 'collectparams', 'othersettings' ) )
	),
	'execution_trace' => array(
		'Function Traces',
		FUNC_FUNCTION_TRACE,
		'Xdebug allows you to log all function calls, including parameters and
		return values to a file in different formats.',
		'
<p>
Those so-called "function traces" can be a help for when you are new to an
application or when you are trying to figure out what exactly is going on when
your application is running. The function traces can optionally also show the
values of variables passed to the functions and methods, and also return
values. In the default traces those two elements are not available.
</p>

<h2>Output Formats</h2>
<p>
There are two output formats. One is meant as a human readable trace, the other
one is more suited for computer programs as it is easier to parse. You can
switch between the two different formats with the [CFG:trace_format]
setting. There are a few settings that control which information is written to
the trace files. There are settings for including variables
([CFG:collect_params]) and for including return values ([CFG:collect_return])
for example. The example below shows what effect the different settings have
for the human readable function traces.
</p>

<h3>The Script</h3>
<div class="example">
<p>
<code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$str&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"Xdebug"</span><span style="color: #007700">;<br />function&nbsp;</span><span style="color: #0000BB">ret_ord</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$c&nbsp;</span><span style="color: #007700">)<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;</span><span style="color: #0000BB">ord</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$c&nbsp;</span><span style="color: #007700">);<br />}<br /><br />foreach&nbsp;(&nbsp;</span><span style="color: #0000BB">str_split</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$str&nbsp;</span><span style="color: #007700">)&nbsp;as&nbsp;</span><span style="color: #0000BB">$char&nbsp;</span><span style="color: #007700">)<br />{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #0000BB">$char</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">":&nbsp;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">ret_ord</span><span style="color: #007700">(&nbsp;</span><span style="color: #0000BB">$char&nbsp;</span><span style="color: #007700">),&nbsp;</span><span style="color: #DD0000">"\n"</span><span style="color: #007700">;<br />}<br /></span><span style="color: #0000BB">?&gt;<br /></span>
</span>
</code>
</p>
</div>

<h3>The Results</h3>

<p>
Below are the results with different settings of the [CFG:collect_params]
setting. As this is not a web environment the value of 2 does not have any
meaning as tool tips don\'t work in text files.
</p>

<div id="collectparams" class="yui-navset">
	<ul class="yui-nav">
		<li class="selected"><a href="#default1"><em>default</em></a></li>
		<li><a href="#collect-params-1"><em>collect_params=1</em></a></li>
		<li><a href="#collect-params-3"><em>collect_params=3</em></a></li>
		<li><a href="#collect-params-4"><em>collect_params=4</em></a></li>
	</ul>
	<div class="yui-content">
		<div id="default1">
<pre class="shell">
TRACE START [2007-05-06 14:37:06]
    0.0003     114112   -> {main}() ../trace.php:0
    0.0004     114272     -> str_split() ../trace.php:8
    0.0153     117424     -> ret_ord() ../trace.php:10
    0.0165     117584       -> ord() ../trace.php:5
    0.0166     117584     -> ret_ord() ../trace.php:10
    0.0167     117584       -> ord() ../trace.php:5
    0.0168     117584     -> ret_ord() ../trace.php:10
    0.0168     117584       -> ord() ../trace.php:5
    0.0170     117584     -> ret_ord() ../trace.php:10
    0.0170     117584       -> ord() ../trace.php:5
    0.0172     117584     -> ret_ord() ../trace.php:10
    0.0172     117584       -> ord() ../trace.php:5
    0.0173     117584     -> ret_ord() ../trace.php:10
    0.0174     117584       -> ord() ../trace.php:5
    0.0177      41152
TRACE END   [2007-05-06 14:37:07]
</pre>
		</div>
		<div id="collect-params-1">
<pre class="shell">
TRACE START [2007-05-06 14:37:11]
    0.0003     114112   -> {main}() ../trace.php:0
    0.0004     114272     -> str_split(string(6)) ../trace.php:8
    0.0007     117424     -> ret_ord(string(1)) ../trace.php:10
    0.0007     117584       -> ord(string(1)) ../trace.php:5
    0.0009     117584     -> ret_ord(string(1)) ../trace.php:10
    0.0009     117584       -> ord(string(1)) ../trace.php:5
    0.0010     117584     -> ret_ord(string(1)) ../trace.php:10
    0.0011     117584       -> ord(string(1)) ../trace.php:5
    0.0012     117584     -> ret_ord(string(1)) ../trace.php:10
    0.0013     117584       -> ord(string(1)) ../trace.php:5
    0.0014     117584     -> ret_ord(string(1)) ../trace.php:10
    0.0014     117584       -> ord(string(1)) ../trace.php:5
    0.0016     117584     -> ret_ord(string(1)) ../trace.php:10
    0.0016     117584       -> ord(string(1)) ../trace.php:5
    0.0019      41152
TRACE END   [2007-05-06 14:37:11]
</pre>
		</div>
		<div id="collect-params-3">
<pre class="shell">
TRACE START [2007-05-06 14:37:13]
    0.0003     114112   -> {main}() ../trace.php:0
    0.0004     114272     -> str_split(\'Xdebug\') ../trace.php:8
    0.0007     117424     -> ret_ord(\'X\') ../trace.php:10
    0.0007     117584       -> ord(\'X\') ../trace.php:5
    0.0009     117584     -> ret_ord(\'d\') ../trace.php:10
    0.0009     117584       -> ord(\'d\') ../trace.php:5
    0.0010     117584     -> ret_ord(\'e\') ../trace.php:10
    0.0011     117584       -> ord(\'e\') ../trace.php:5
    0.0012     117584     -> ret_ord(\'b\') ../trace.php:10
    0.0013     117584       -> ord(\'b\') ../trace.php:5
    0.0014     117584     -> ret_ord(\'u\') ../trace.php:10
    0.0014     117584       -> ord(\'u\') ../trace.php:5
    0.0016     117584     -> ret_ord(\'g\') ../trace.php:10
    0.0016     117584       -> ord(\'g\') ../trace.php:5
    0.0019      41152
TRACE END   [2007-05-06 14:37:13]
</pre>
		</div>
		<div id="collect-params-4">
<pre class="shell">
TRACE START [2007-05-06 14:37:16]
    0.0003     114112   -> {main}() ../trace.php:0
    0.0004     114272     -> str_split(\'Xdebug\') ../trace.php:8
    0.0007     117424     -> ret_ord($c = \'X\') ../trace.php:10
    0.0007     117584       -> ord(\'X\') ../trace.php:5
    0.0009     117584     -> ret_ord($c = \'d\') ../trace.php:10
    0.0009     117584       -> ord(\'d\') ../trace.php:5
    0.0010     117584     -> ret_ord($c = \'e\') ../trace.php:10
    0.0011     117584       -> ord(\'e\') ../trace.php:5
    0.0012     117584     -> ret_ord($c = \'b\') ../trace.php:10
    0.0013     117584       -> ord(\'b\') ../trace.php:5
    0.0014     117584     -> ret_ord($c = \'u\') ../trace.php:10
    0.0014     117584       -> ord(\'u\') ../trace.php:5
    0.0016     117584     -> ret_ord($c = \'g\') ../trace.php:10
    0.0016     117584       -> ord(\'g\') ../trace.php:5
    0.0019      41152
TRACE END   [2007-05-06 14:37:16]
</pre>
		</div>
	</div>
</div>

<p>
Besides the [CFG:collect_params] settings there is another number of settings
that affect the output of trace files. The first tab "default" shows the same
as the default as above. The second tab "show_mem_delta=1" also shows the
memory usage difference between two different lines in the output file. On the
"collect_return=1" tab the return values of all the function calls are also
visible. This you turn on with the [CFG:collect_return] setting.  The last tab
shows a different output format that is much easier to parse, but harder to
read. The [CFG:trace_format] setting is therefore mostly useful if there is an
additional tool to interpret the trace files.
</p>

<div id="othersettings" class="yui-navset">
	<ul class="yui-nav">
		<li class="selected"><a href="#default2"><em>default</em></a></li>
		<li><a href="#mem-delta"><em>show_mem_delta=1</em></a></li>
		<li><a href="#collect-return"><em>collect_return=1</em></a></li>
		<li><a href="#trace-format"><em>trace_format=1</em></a></li>
	</ul>
	<div class="yui-content">
		<div id="default2">
<pre class="shell">
TRACE START [2007-05-06 14:37:06]
    0.0003     114112   -> {main}() ../trace.php:0
    0.0004     114272     -> str_split() ../trace.php:8
    0.0153     117424     -> ret_ord() ../trace.php:10
    0.0165     117584       -> ord() ../trace.php:5
    0.0166     117584     -> ret_ord() ../trace.php:10
    0.0167     117584       -> ord() ../trace.php:5
    0.0168     117584     -> ret_ord() ../trace.php:10
    0.0168     117584       -> ord() ../trace.php:5
    0.0170     117584     -> ret_ord() ../trace.php:10
    0.0170     117584       -> ord() ../trace.php:5
    0.0172     117584     -> ret_ord() ../trace.php:10
    0.0172     117584       -> ord() ../trace.php:5
    0.0173     117584     -> ret_ord() ../trace.php:10
    0.0174     117584       -> ord() ../trace.php:5
    0.0177      41152
TRACE END   [2007-05-06 14:37:07]
</pre>
		</div>
		<div id="mem-delta">
<pre class="shell">
TRACE START [2007-05-06 14:37:26]
    0.0003     114112  +114112   -> {main}() ../trace.php:0
    0.0004     114272     +160     -> str_split(\'Xdebug\') ../trace.php:8
    0.0007     117424    +3152     -> ret_ord($c = \'X\') ../trace.php:10
    0.0007     117584     +160       -> ord(\'X\') ../trace.php:5
    0.0009     117584       +0     -> ret_ord($c = \'d\') ../trace.php:10
    0.0009     117584       +0       -> ord(\'d\') ../trace.php:5
    0.0011     117584       +0     -> ret_ord($c = \'e\') ../trace.php:10
    0.0011     117584       +0       -> ord(\'e\') ../trace.php:5
    0.0013     117584       +0     -> ret_ord($c = \'b\') ../trace.php:10
    0.0013     117584       +0       -> ord(\'b\') ../trace.php:5
    0.0014     117584       +0     -> ret_ord($c = \'u\') ../trace.php:10
    0.0015     117584       +0       -> ord(\'u\') ../trace.php:5
    0.0016     117584       +0     -> ret_ord($c = \'g\') ../trace.php:10
    0.0017     117584       +0       -> ord(\'g\') ../trace.php:5
    0.0019      41152
TRACE END   [2007-05-06 14:37:26]
</pre>
		</div>
		<div id="collect-return">
<pre class="shell">
TRACE START [2007-05-06 14:37:35]
    0.0003     114112   -> {main}() ../trace.php:0
    0.0004     114272     -> str_split(\'Xdebug\') ../trace.php:8
                          >=> array (0 => \'X\', 1 => \'d\', 2 => \'e\', 3 => \'b\', 4 => \'u\', 5 => \'g\')
    0.0007     117424     -> ret_ord($c = \'X\') ../trace.php:10
    0.0007     117584       -> ord(\'X\') ../trace.php:5
                            >=> 88
                          >=> 88
    0.0009     117584     -> ret_ord($c = \'d\') ../trace.php:10
    0.0009     117584       -> ord(\'d\') ../trace.php:5
                            >=> 100
                          >=> 100
    0.0011     117584     -> ret_ord($c = \'e\') ../trace.php:10
    0.0011     117584       -> ord(\'e\') ../trace.php:5
                            >=> 101
                          >=> 101
    0.0013     117584     -> ret_ord($c = \'b\') ../trace.php:10
    0.0013     117584       -> ord(\'b\') ../trace.php:5
                            >=> 98
                          >=> 98
    0.0015     117584     -> ret_ord($c = \'u\') ../trace.php:10
    0.0016     117584       -> ord(\'u\') ../trace.php:5
                            >=> 117
                          >=> 117
    0.0017     117584     -> ret_ord($c = \'g\') ../trace.php:10
    0.0018     117584       -> ord(\'g\') ../trace.php:5
                            >=> 103
                          >=> 103
                        >=> 1
    0.0021      41152
TRACE END   [2007-05-06 14:37:35]
</pre>
		</div>
		<div id="trace-format">
<pre class="shell">
Version: 2.0.0RC4-dev
TRACE START [2007-05-06 18:29:01]
1	0	0	0.010870	114112	{main}	1	../trace.php	0
2	1	0	0.032009	114272	str_split	0	../trace.php	8
2	1	1	0.032073	116632
2	2	0	0.033505	117424	ret_ord	1	../trace.php	10
3	3	0	0.033531	117584	ord	0	../trace.php	5
3	3	1	0.033551	117584
2	2	1	0.033567	117584
2	4	0	0.033718	117584	ret_ord	1	../trace.php	10
3	5	0	0.033740	117584	ord	0	../trace.php	5
3	5	1	0.033758	117584
2	4	1	0.033770	117584
2	6	0	0.033914	117584	ret_ord	1	../trace.php	10
3	7	0	0.033936	117584	ord	0	../trace.php	5
3	7	1	0.033953	117584
2	6	1	0.033965	117584
2	8	0	0.034108	117584	ret_ord	1	../trace.php	10
3	9	0	0.034130	117584	ord	0	../trace.php	5
3	9	1	0.034147	117584
2	8	1	0.034160	117584
2	10	0	0.034302	117584	ret_ord	1	../trace.php	10
3	11	0	0.034325	117584	ord	0	../trace.php	5
3	11	1	0.034342	117584
2	10	1	0.034354	117584
2	12	0	0.034497	117584	ret_ord	1	../trace.php	10
3	13	0	0.034519	117584	ord	0	../trace.php	5
3	13	1	0.034536	117584
2	12	1	0.034549	117584
1	0	1	0.034636	117584
TRACE END   [2007-05-06 18:29:01]
</pre>
		</div>
	</div>
</div>

<a name="vim"></a>
<h2>VIM syntax file</h2>

<p>
Xdebug ships with a VIM syntax file that syntax highlights the trace files:
xt.vim. In order to make VIM recognise this new format you need to perform the
following steps:
</p>
<ol>
<li>Copy the <i>xt.vim</i> file to <i>~/.vim/syntax</i></li>
<li>Edit, or create, <i>~/.vim/filetype.vim</i> and add the following lines:
<pre>
augroup filetypedetect
au BufNewFile,BufRead *.xt  setf xt
augroup END
</pre>
</li>
</ol>
<p>
With those settings made an opened trace file looks like:
</p>
<pre style="background-color: #000000; color: #fff;">
<font color="#ffff00"><b>TRACE START</b></font> <font color="#ffff00"><b>[2007-05-15 20:06:02]</b></font>
    0.0003     115208   <font color="#ff40ff"><b>-&gt;</b></font> <font color="#ff6060"><b>{main}()</b></font> ../trace.php<font color="#ff40ff"><b>:0</b></font>
    0.0004     115368     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>str_split(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:8</b></font>
    0.0006     118520     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ret_ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:10</b></font>
    0.0007     118680       <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:5</b></font>
    0.0008     118680     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ret_ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:10</b></font>
    0.0009     118680       <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:5</b></font>
    0.0010     118680     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ret_ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:10</b></font>
    0.0010     118680       <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:5</b></font>
    0.0012     118680     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ret_ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:10</b></font>
    0.0012     118680       <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:5</b></font>
    0.0014     118680     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ret_ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:10</b></font>
    0.0014     118680       <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:5</b></font>
    0.0016     118680     <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ret_ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:10</b></font>
    0.0016     118680       <font color="#ff40ff"><b>-&gt;</b></font> <font color="#00ffff"><b>ord(</b></font><font color="#00ffff"><b>) </b></font>../trace.php<font color="#ff40ff"><b>:5</b></font>
    0.0019      54880
<font color="#ffff00"><b>TRACE END</b></font>   <font color="#ffff00"><b>[2007-05-15 20:06:02]</b></font>
</pre>
<p>
Folding also sorta works so you can use <i>zc</i> and <i>zo</i> to fold away
parts of the trace files.
</p>
',
		array( 'tabfields' => array( 'collectparams', 'othersettings' ) )
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
<h2>Introduction</h2>

<p>Xdebug\'s Profiler is a powerful tool that gives you the ability to analyze
your PHP code and determine bottlenecks or generally see which parts of your
code are slow and could use a speed boost. The profiler in Xdebug 2 outputs
profiling information in the form of a cachegrind compatible file.  This allows
you to use the excellent <a href="http://kcachegrind.sf.net">KCacheGrind</a>
tool (Linux, KDE) to analyse your profiling data. Users of the Windows
operating system can use <a
href="http://sourceforge.net/projects/wincachegrind">WinCacheGrind</a>, the
functionality is different from KCacheGrind so the section that documents the
use of KCacheGrind on this page doesn\'t apply to this program. There is also a
standalone client for Mac OSX called
<a href="http://www.maccallgrind.com/">MacCallGrind</a>, an alternative profile
information presentation tool called <a
href="http://code.google.com/p/xdebugtoolkit/">xdebugtoolkit</a> and an
upcoming web front end called <a href="http://ccg.wiki.sourceforge.net/">Carica
CacheGrind</a>.</p>

<p>In case you can not use KDE (or do not want to use KDE) the kcachegrind
package also comes with a perl script "ct_annotate" which produces ASCII output
from the profiler trace files.</p>

<a name="starting"></a>
<h2>Starting The Profiler</h2>

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
like <a href="http://ez.no">eZ Publish</a>.</p>

<a name="misc"></a>
<h2>Analysing Profiles</h2>

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
example) or absolute time (1 unit is 1/1.000.000th of a second). You can
switch between the two modes with the button you see on the right.</p>

<p>The pane on the right contains an upper and lower pane. The upper one
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
<h2>Introduction</h2>

<p>Xdebug\'s (remote) debugger allows you to examine data structure, 
interactively walk through your and debug your code. There are two different
protocols to communicate with the debugger: the old GDB-like command protocol
(GDB) which is implemented in Xdebug 1.3 and 2; and the <a
href="/docs-dbgp.php">DBGp</a> protocol which is implemented in Xdebug 2.
</p>

<a name="clients"></a>
<h2>Clients</h2>
<p>
Xdebug 2 is bundled with a <b>simple command line client</b> for the
<a href="/docs-dbgp.php">DBGp</a> protocol.
There are a few other client implementations (both free and commercial) as
well. I am not the author of any of those, so please refer to the original
authors for <b>support</b>:
<ul>
<li><b><a href="http://devphp.sf.net/">Dev-PHP</a></b> (IDE: Windows)</li>
<li><b>Eclipse <a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=169408">plugin</a></b>, which has been submitted as an enhancement for the <a href="http://www.eclipse.org/php/">PDT</a> (IDE).</li>
<li><b>Emacs <a href="http://code.google.com/p/geben-on-emacs/">plugin</a></b> (Editor Plugin).</li>
<li>ActiveState\'s <b><a href="http://activestate.com/products/komodo_ide/?src=AScom&type=bn&X=HP&campaign=KMD">Komodo</a></b> (IDE: Windows, Linux, Mac; Commercial).</li>
<li><b><a href="http://www.bluestatic.org/software/macgdbp/index.php">MacGDBP</a></b> - Standalone Mac client.</li>
<li><b><a href="http://php.netbeans.org">NetBeans</a></b> (IDE: Windows, Linux, Mac OS X and Solaris.</li>
<li><b><a href="http://notepad-plus.sourceforge.net/uk/site.htm">Notepad++</a></b> <a href="http://sourceforge.net/project/showfiles.php?group_id=189927&package_id=236520">plugin</a> (IDE: Windows).</li>
<li>WaterProof\'s <b><a href="http://www.waterproof.fr/products/PHPEdit/">PHPEdit</a></b> (IDE, from version 2.10: Windows; Commercial).</li>
<li>Anchor System\'s <b><a href="http://www.anchorsystems.co.jp/anchor/ashp/peggy/pegindex.html">Peggy</a></b> (IDE: Windows, Japanese; Commercial).</li>
<li>MP Software\'s <b><a href="http://www.mpsoftware.dk/products.php">phpDesigner</a></b> (IDE: Windows, Commercial).</li>
<li><b><a href="http://www.phpeclipse.net/">PHPEclipse</a></b> (Editor Plugin).</li>
<li><b><a href="http://protoeditor.sourceforge.net/">Protoeditor</a></b> (Editor: Linux).</li>
<li><b><a href="http://tswebeditor.net.tc/">tsWebeditor</a></b> (Editor: Windows).</li>
<li>Xored\'s <b><a href="http://www.xored.com/trustudio">TrueStudio IDE</a></b> (IDE; Commercial).</li>
<li><b>VIM <a href="http://www.vim.org/scripts/script.php?script_id=1929">plugin</a></b> (<a href="http://tech.blog.box.net/2007/06/20/how-to-debug-php-with-vim-and-xdebug-on-linux/">Tutorial</a>) (Editor Plugin).</li>
<li>jcx software\'s <b><a href="http://www.jcxsoftware.com/vs.php">VS.Php</a></b> (MS Visual Studio Plugin; Commercial).</li>
<li><b><a href="http://code.google.com/p/xdebugclient/">XDebugClient</a></b> - Standalone Windows client.</li>
</ul>
</p>
<p>
A simple command line client for the GDB protocol is bundled with Xdebug 1.3. A
client implementation of the deprecated GDB protocol can also be found in the
free editor <a href="http://weaverslave.ws">WeaverSlave</a>.
</p>

<a name="starting"></a>
<h2>Starting The Debugger</h2>

<p>In order to enable Xdebug\'s debugger you need to make some configuration
settings in php.ini. These settings are [CFG:remote_enable] to enable the
debugger, [CFG:remote_host] and
[CFG:remote_port] to configure the IP address
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
export XDEBUG_CONFIG="[CFGS:idekey]=session_name"
php myscript.php
</pre>
You can also configure the [CFG:remote_host],
[CFG:remote_port],
[CFG:remote_mode] and
[CFG:remote_handler] in this same environment variable.
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
<a href=install#debugclient>compiling and installing</a> it. You can
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
Xdebug Simple DBGp client (0.10.0)
Copyright 2002-2007 by Derick Rethans.
- libedit support: enabled
	 
Waiting for debug server to connect.
</pre>
<p>
After a connection is made the output of the debug server is shown:
</p>
<pre class="example">
Connect
&lt;?xml version="1.0" encoding="iso-8859-1"?>
&lt;init xmlns="urn:debugger_protocol_v1"
      xmlns:xdebug="http://xdebug.org/dbgp/xdebug"
      fileuri="file:///home/httpd/www.xdebug.org/html/docs/index.php"
      language="PHP"
      protocol_version="1.0"
      appid="13202"
      idekey="derick">
  &lt;engine version="2.0.0RC4-dev">&lt;![CDATA[Xdebug]]>&lt;/engine>
  &lt;author>&lt;![CDATA[Derick Rethans]]>&lt;/author>
  &lt;url>&lt;![CDATA[http://xdebug.org]]>&lt;/url>
  &lt;copyright>&lt;![CDATA[Copyright (c) 2002-2007 by Derick Rethans]]>&lt;/copyright>
&lt;/init>
(cmd)
</pre>
<p>
Now you can use the commandset as explained on the <a
href="/docs-dbgp.php">DBGp</a> documentation page. When the script ends the
debug server disconnects from the client and the debugclient resumes with
waiting for a new connection.
</p>


<a name="browser_session"></a>
<h2>HTTP Debug Sessions</h2>
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
<p>
There is also a FireFox 2 extension that allows you to trigger Xdebug\'s
debugger or profiler without having to use XDEBUG_SESSION_START as parameter.
You can configure which [CFG:idekey:IDE key] it uses. You can find this
extension <a href="http://gmckinney.blogspot.com/2008/02/xdebug-firefox-addon-for-profiling-and.html">here</a>.
</p>
		'
	),
	'faq' => array(
		'FAQ',
		0,
		'Frequently Asked Questions',
		'
<h2>Using Xdebug</h2>
<dl class="faq">
<dt>Q: phpinfo() reports that Xdebug is installed and enabled, yet I
still don\'t get any stacktraces when an error happens.
</dt>
<dd>A1: You have to search through all your PHP libraries and include files for any
"set_error_handler" calls. If there are any, you have to either comment it out,
or change the body of the handler function to call xdebug_* api functions.
</dd>
<dd>A2: You do not have set <a href="http://www.php.net/manual/en/ref.errorfunc.php#ini.display-errors">display_errors</a> to 1 in php.ini</dd>

<dt>Q: The debug client doesn\'t receive any connections, what do I do
wrong?</dt>
<dd>A: You probably forgot to set the environment variable or to add 
the necessary information to your URL. See the 
<a href=\'remote#activate_debugger\'>documentation</a> for
more information.</dd>
</dl>

<h2>Compilation and Configuration</h2>
<dl class="faq">
<dt>Q: I\'m using XAMPP, but I can\'t seem to get the packaged xdebug extension
to work properly.</dt>
<dd>A: If you uncommented the "extension=php_xdebug.dll" line, that is to be
expected. Xdebug <b>needs</b> to be loaded with the zend_extension_ts=
"C:\path\to\php_xdebug.dll" directive. You\'ll also likely have to disable the
loading of the Zend Optimizer, since it\'s enabled by default, and doesn\'t work
well with Xdebug. So look for the related entry in php.ini, and comment it
out.</dd>

<dt>Q: On Debian, I am seeing the following problem with the build of
Xdebug.... any fixes?
<pre>
/usr/lib/libc_nonshared.a(stat.oS)(.text.__i686.get_pc_thunk.bx+0x0):
In function `__i686.get_pc_thunk.bx\':
: multiple definition of `__i686.get_pc_thunk.bx\'
/usr/lib/gcc-lib/i486-linux/3.3.5/crtbeginS.o
(.gnu.linkonce.t.__i686.get_pc_thunk.bx+0x0): first defined here
collect2: ld returned 1 exit status
make: *** [xdebug.la] Error 1 </pre>
</dt>
<dd>A: This is an issue with Debian itself, see for more information
<a href="http://www.xdebug.org/archives/xdebug-general/0825.html">here</a> 
and <a href="http://www.xdebug.org/archives/xdebug-general/0825.html">here</a>.
</dd>
</dl>
		'
	),
);
?>
