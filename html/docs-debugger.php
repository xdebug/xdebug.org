<?php $title = "Xdebug: Documentation - Debugger"; include "include/header.php"; hits ('xdebug-docs-debugger'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - DEBUGGER</span><br />

<?php include "include/menu-docs.php"; ?>

<a name="introduction"></a>
<span class="sans">INTRODUCTION</span><br />

<p>Xdebug's (remote) debugger allows you to examine data structure, 
interactively walk through your and debug your code. There are two different
protocols to communicate with the debugger: the old GDB-like command protocol
(GDB) which is implemented in Xdebug 1.3 and 2; and the <a
href='/docs-dbgp.php'>DBGp</a> protocol which is implemented in Xdebug 2.
</p>

<a name="clients"></a>
<span class="sans">CLIENTS</span><br />
<p>
Xdebug 2 is bundled with a <b>simple command line client</b> for the
<a href='/docs-dbgp.php'>DBGp</a> protocol.
There are a few other client implementations (both free and commercial) as well:
<ul>
<li><b>Eclipse
<a href='https://bugs.eclipse.org/bugs/show_bug.cgi?id=169408'>plugin</a></b>, which
has been submitted as an enhancement for the
<a href='http://www.eclipse.org/php/'>PDT</a>.</li>
<li>ActiveState's <b><a href='http://activestate.com/products/komodo_ide/?src=AScom&type=bn&X=HP&campaign=KMD'>Komodo</a></b>.</li>
<li>WaterProof's <b><a href='http://www.waterproof.fr/products/PHPEdit/'>PHPEdit</a></b> (from version 2.10).</li>
<li>Anchor System's <b><a href='http://www.anchorsystems.co.jp/anchor/ashp/peggy/pegindex.html'>Peggy</a></b> (Japanese).</li>
<li><b><a href='http://protoeditor.sourceforge.net/'>Protoeditor</a></b>.</li>
<li><b><a href='http://tswebeditor.net.tc/'>tsWebeditor</a></b>.</li>
<li>Xored's <b><a href='http://www.xored.com/trustudio'>TrueStudio IDE</a></b>.</li>
<li><b>VIM <a href='http://www.vim.org/scripts/script.php?script_id=1152'>plugin</a></b>.</li>
<li>Maguma's <b><a href='http://www.maguma.com/products/?article=Workbench'>WorkBench</a></b>.</li>
</ul>
</p>
<p>
A simple command line client for the GDB protocol is bundled with <b>Xdebug
1.3</b>. A client implementation of the deprecated GDB protocol can also be found in the free editor
<a href='http://weaverslave.ws'>WeaverSlave</a>.
</p>

<a name="starting"></a>
<span class="sans">STARTING THE DEBUGGER</span><br />

<p>In order to enable Xdebug's debugger you need to make some configuration
settings in php.ini. These settings are
<a href='docs-settings.php#remote_enable'>xdebug.remote_enable</a> to enable
the debugger,
<a href='docs-settings.php#remote_host'>xdebug.remote_host</a> and
<a href='docs-settings.php#remote_port'>xdebug.remote_port</a> to configure
the IP address and port where the debugger should connect to and 
<a href='docs-settings.php#remote_handler'>xdebug.remote_handler</a> to
configure which debug backend to use ("gdb" or "dbgp"). If you want the
debugger to initiate a session when an error situation occurs (php error
or exception) then you also need to change the 
<a href='docs-settings.php#remote_mode'>xdebug.remote_mode</a> setting.
Allowed values for this setting are "req" (the default) which makes the
debugger initiate a session as soon as a script is started, or "jit" when
a session should only be initiated on an error.
</p>

<a name='activate_debugger'></a>
<p>
After made all those settings Xdebug will still not start a debugging session
automatically when a script is run. You need to activate Xdebug's debugger
and you can do that in two ways:
<ol>
<li>When running the script from the command line you need to set an
environment variable, like:
<pre class="example">
export XDEBUG_CONFIG="<a href="/docs-settings.php#idekey">idekey</a>=session_name <a href="/docs-settings.php#remote_enable">remote_enable</a>=1"
php myscript.php
</pre>
You can also configure the <a href="/docs-settings.php#remote_host">remote_host</a>,
<a href="/docs-settings.php#remote_port">remote_port</a>,
<a href="/docs-settings.php#remote_mode">remote_mode</a> and
<a href="/docs-settings.php#remote_handler">remote_handler</a> in this same
environment variable. All those configurable settings can also be set with
normal php.ini settings.</li>

<li>If you want to debug a script started through a web browser, simply add
<code>XDEBUG_SESSION_START=session_name</code> as parameter to the URL. Refer
to the <a href='#browser_session'>next section</a> to read on how debug
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
when connecting to the debugclient in the 'idekey' attribute.</li>
<li>When there is a GET (or POST) variable XDEBUG_SESSION_START or the
XDEBUG_SESSION cookie is set, Xdebug will try to connect to a debugclient.</li>
<li>To stop a debug session (and to destroy the cookie) simply add the URL
parameter <code>XDEBUG_SESSION_STOP</code>. Xdebug will then no longer try
to make a connection to the debugclient.</li>
</ul>
</p>

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
