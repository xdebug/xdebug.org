<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support — Reporting Bugs');
?>

<h1>Reporting Bugs</h1>

<h2>Bugs</h2>

<p>
	If you think that you found a bug in Xdebug, please file a bugreport at the <a
	href="https://bugs.xdebug.org">Bug Tracking</a> page. You will need to register
	because this prevents abuse by spammers and other abusing parties. Try to give
	as much possible information to reproduce the bug, this will greatly help in
	fixing them. For some hints on what information is useful, see the following
	sections. <b>Versions before <?php echo \XdebugDotOrg\XdebugVersion::NOT_SUPPORTED_BEFORE; ?>
	are not supported</b>.
</p>

<a name='required-info'></a>
<h3>Required Information</h3>
<p>
	Every bug report should be created stating out exactly:
</p>
<ol>
	<li>What you expected to happen.</li>
	<li>What happened instead.</li>
	<li>How <b>I</b> can reproduce the problem.</li>
</ol>

<p>
To prevent endless back-and-forwards, please always provide the following
information:
</p>
<ol>
	<li>
		<p>
			A <strong>short</strong> and <strong>self-contained</strong> script
			that exhibits the issue.
		</p>
		<p>
			Short means about 10-20 lines maximum, and self-contained means
			that it can <strong>not</strong> not depend on any other libraries,
			or databases.
		</p>
		<p>
			If you <strong>really</strong> can't make a short script after
			trying for several hours ;-), then please prepare something that I
			can: clone from GitHub, use something like composer to install
			dependencies, and then can run. The script can still not have
			dependencies on things like databases, as I won't have them
			installed. Please <a href='/support.php#email'>contact me</a> first
			if you are not sure.
		</p>
	</li>
	<li>
		<p>
			The <b>exact</b> version of Xdebug.
		</p>
		<p>
			For example: <code>2.6.1</code>.
		</p>
	</li>
	<li>
		<p>
			The PHP version (or version range).
		</p>
		<p>
			This can be selected in the bug report. If you are using a
			development version of PHP, please use the one with the
			<code>-dev</code> prefix for that version, for example:
			<code>7.4-dev</code>.
		</p>
	</li>
	<li>
		<p>
			The output of <code>php -v</code> on the CLI:
		</p>
		<pre class="example">
derick@gargleblaster:~$ php -v
PHP 7.2.14 (cli) (built: Jan 24 2019 11:47:11) ( NTS DEBUG )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.2.14, Copyright (c) 1999-2018, by Zend Technologies
    with Xdebug v2.7.0beta2-dev, Copyright (c) 2002-2018, by Derick Rethans
		</pre>
		<p>
			Or otherwise the information next to the "zend® engine" logo in the output of <code>phpinfo();</code> :
		</p>
		<img src='images/version-info.png'/>
	</li>
	<li>
		<p>
			Information about the Operating System, and its version.
		</p>
		<p>
			For example: <i>Debian Linux 9.2</i>, <i>OSX 10.10 using MAMP
			5.2</i>. Just "Linux" or "Windows" is often not enough information.
		</p>
	</li>
</ol>
<p>
Please do not include the full output of <code>phpinfo();</code> or add
<b>all</b> configuration settings. If you think that Xdebug's ini settings can
have some effect on the bug, please provide <b>only</b> these configuration
settings.
</p>

<p>
In addition to the above information, I might need some more information
depending on what type of bug that you encountered. There is different
information useful for <a href='#step-debugger'>Step Debugger Bugs</a> and <a
href='#crash'>Crash Bugs</a>. If you are unsure as to what is useful, feel free
to only provide information from the <a href='#required-info'>Required
Information</a> section from above. In which case I will then point you to the
right section on this page for further information if necessary.
</p>

<a name='remote'></a>
<a name='step-debugger'></a>
<h3>Step Debugger Bugs</h3>
<p>
	To make it possible for me to find and fix bugs for the remote debugging
	feature, I need several bits of information. Without this information, I
	can not fix your bug. The information that is required are:
</p>

<ol>
	<li>
		The items needed for every bug report (script, Xdebug version, PHP
		version, distribution, etc, <a href='#required-info'>see above</a>).
	</li>
	<li>A remote debugging log.</li>
</ol>

<p>
	The debugging log contains all the interactions between Xdebug and
	an IDE and is vital to track down where the error occurs, and due
	to which protocol command.
</p>

<p>
	You can make a remote debugging log by using the <a
	href="/docs/all_settings#log">xdebug.log</a> php.ini
	setting. I suggest you set its value to something in the
	<code>/tmp</code> directory (or your operating system's
	equivalent). I have it set as follows:
	<code>xdebug.log=/tmp/xdebug.log</code>. Make sure that the
	user that runs the script (yourself for CLI, or your web server's
	user ID if you're debugging through a web server) can write to the
	file that you have specified.
</p>

<p>
	With the short script prepared, and the remote logging enabled, now
	step through your code in the IDE (or do whatever you need to do to
	reproduce it). When you are done, add both the script as well as
	the remote debugging log to the bug report at <a
	href='https://bugs.xdebug.org'>bugs.xdebug.org</a>.
</p>

<p>
	The contents of the log should start with something like:
</p>
<pre class="example">
[3020307] Log opened at 2020-10-29 03:20:25.076271
[3020307] [Step Debug] INFO: Connecting to configured address/port: 127.0.0.1:43425.
[3020307] [Step Debug] INFO: Connected to debugging client: 127.0.0.1:43425 (through xdebug.client_host/xdebug.client_port). :-)
[3020307] [Step Debug] -&gt; &lt;init
    xmlns="urn:debugger_protocol_v1" xmlns:xdebug="https://xdebug.org/dbgp/xdebug"
    fileuri="file:///home/httpd/www.xdebug.org/html/router.php"
    language="PHP" xdebug:language_version="7.4.11-dev"
    protocol_version="1.0" appid="2693358" idekey="XDEBUG_ECLIPSE"&gt;
        &lt;engine version="3.0.0-dev"&gt;&lt;![CDATA[Xdebug]]&gt;&lt;/engine&gt;
        &lt;author&gt;&lt;![CDATA[Derick Rethans]]&gt;&lt;/author&gt;
        &lt;url&gt;&lt;![CDATA[https://xdebug.org]]&gt;&lt;/url&gt;
        &lt;copyright&gt;&lt;![CDATA[Copyright (c) 2002-2020 by Derick Rethans]]&gt;&lt;/copyright&gt;
&lt;/init&gt;
</pre>

<a name='crash'></a>
<h3>Crash Bugs</h3>
<p>
	To make it a easier, and sometimes even possible, to find and fix crash
	bugs, I need the standard required information (script, Xdebug version, PHP
	version, distribution, etc, <a href='#required-info'>see above</a>) and
	some additional information.
</p>
<p>
	It is always a lot easier to reproduce bugs from the command line (CLI), and
	not through a web browser and web server. The first thing to try is see whether
	your script also crashes when run with the PHP CLI. On the shell, do the
	following steps:
</p>
<pre class="example">
export USE_ZEND_ALLOC=0
export ZEND_DONT_UNLOAD_MODULES=1
php your-script.php
</pre>
<p>
	If this still crashes (you'll see something like "Segmentation Fault" or
	"Bus Error" mentioned), then this is very useful. In order to extract more
	information, and when you are on Linux or OSX, please install the
	<code>gdb</code> (not lldb) and <code>valgrind</code> tools.<!-- If you are on Linux,
	please also install the PHP debugging packages as well.
</p>
<p>
	On <b>Debian<b>, install the debugging symbols <a
	href="https://wiki.debian.org/HowToGetABacktrace#Installing_the_debugging_symbols">apt-repository</a>,
	and then install the <code>php7.3-dbg package</code>. I ran the following command using Debian 9 as root:
</p>
<pre>
echo "deb http://debug.mirrors.debian.org/debian-debug/ stretch-debug main" > /etc/apt/sources.list.d/debug.list
apt-get update
apt-get install

<code>apt-get install as well are the debugging systems for PHP on your
-->
</p>
<p>
To have the best chance to fix crash bugs, I need the following information:
</p>
<ol>
	<li>
		The items needed for every bug report (script, Xdebug version, PHP
		version, distribution, etc, <a href='#required-info'>see above</a>).
	</li>
	<li>
		A <a href='#gdb'>GDB backtrace</a>. See below on how to make one.
	</li>
	<li>
		A memory trace created by <a href='#valgrind'>Valgrind</a>. See below
		on how to make one.
	</li>
</ol>

<a name="gdb"></a>
<h4>Creating a GDB Backtrace</h4>
<p>
	GDB is a tool for debugging C applications, and provides information about
	the state of a process when it crashes (or stops at a breakpoint). A state
	is recorded in a backtrace, which we will be creating here.
</p>
<p>
	In the same shell as above, run your script as follows:
</p>
<pre class="example">
gdb --args php your-script.php
</pre>
<p>
	You get a GDB prompt, on which you need to type:
</p>
<pre class="example">
run
</pre>
<p>
	When the script then crashes, you get back to the GDB prompt, where you
	then can run:
</p>
<pre class="example">
bt full
</pre>
<p>
	That produces a lot of information, that you can then <b>attach</b> as a
	file to the bug report.
</p>

<a name="gdb"></a>
<h4>Creating a Valgrind Trace</h4>
<p>
	<a href="http://valgrind.org">Valgrind</a> is a tool that shows issues with
	accessing memory when a program is running. For example using memory that
	has been freed, or has not been initialised yet. There is an article about
	Valgrind on <a href='https://derickrethans.nl/valgrind-null.html'>Derick's
	blog</a>.
</p>
<p>
	In the same shell as above (with the two exports), run your script as follows:
</p>
<pre class="example">
valgrind php your-script.php &gt;/tmp/valgrind.log 2&gt;&amp;1
</pre>
<p>
	After the command returns back to the prompt, there should be a file
	<code>/tmp/valgrind.log</code> with a lot of information. Please add this
	also as a file to the bug report.
</p>


<br />
