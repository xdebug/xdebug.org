<?php $title = "Xdebug - Debugger and Profiler Tool for PHP"; include "include/header.php"; hits ('xdebug'); ?>
		<tr>
			<td>&nbsp;</td>
			<td>
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP</span><br />

<?php include "include/menu.php"; ?>

<a name="functionality"></a>
<h2>Functionality</h2>

<img src="/images/xdebug-logo.png" align="right" alt="logo"/>
<p>
The Xdebug extension helps you debugging your script by providing a lot of
valuable debug information. The debug information that Xdebug can
provide includes the following:
</p>
<ul>
<li><a href='/docs/stack_trace'>stack traces</a> and <a href='/docs/execution_trace'>function traces</a> in error messages with:
  <ul>
  <li>full <a href='/docs/display'>parameter display</a> for user defined functions</li> 
  <li>function name, file name and line indications</li>
  <li>support for member functions</li>
  </ul>
</li>
<li>memory allocation</li>
<li>protection for infinite recursions</li>
</ul>
<p>
Xdebug also provides:
</p>
<ul>
<li><a href='docs/profiler'>profiling</a> information for PHP scripts</li>
<li><a href='docs/code_coverage'>code coverage analysis</a></li>
<li>capabilities to <a href='docs/remote'>debug your scripts interactively</a> with a debug client</li>
</ul>

<a name="announcements"></a>
<h2>Announcements</h2>

<dl class="main">
<dt class="main">[28-07-2007]</dt>
<dd class="main">It is finally here, Xdebug 2.0.0 has arrived! After about four
years of work I finally found it ready to release. Have fun!</dd>

<dt class="main">[17-05-2007]</dt>
<dd class="main">Xdebug version 2.0.0RC4 has been released. There are two major
changes that needs some introduction. The first one is that the
profiler_output_name and trace_output_name settings no longer accept simple
values such as "crc32", but instead now accept different format specifiers,
very similar to printf() and strftime() modifiers. This will show up in the
newly organized documentation very soon as well.</dd>

<dt class="main">[31-01-2007]</dt>
<dd class="main">Xdebug version 2.0.0RC3 has been released. This release
fixes a number of bugs and should be the last release candidate before 2.0.0 is
released. Now is your time to test!</dd>

<dt class="main">[24-12-2006]</dt>
<dd class="main">Xdebug version 2.0.0RC2 has been released. This release
features many internal clean ups and bug fixes. Some issues with the newly
introduced layout for stack traces where also addressed.</dd>

<dt class="main">[08-10-2006]</dt>
<dd class="main">Xdebug version 2.0.0RC1 has been released. This release
includes some performance enhancing patches and <a
href='/updates.php'>fixes</a> some problems in the previous beta releases. It
also features a new layout for <a
href='http://derickrethans.nl/pimping_xdebug_stack_traces.php'>stack traces</a>
and features much better code-coverage support.</dd>

<dt class="main">[30-06-2006]</dt>
<dd class="main">Xdebug version 2.0.0beta6 has been released. This release
includes some performance enhancing patches and <a
href='/updates.php'>fixes</a> some problems in the previous beta releases.</dd>

<dt class="main">[31-12-2005]</dt>
<dd class="main">Xdebug version 2.0.0beta5 has been released. This release
<a href='/updates.php'>fixes</a> some problems in the previous beta releases.</dd>

<dt class="main">[29-11-2004]</dt>
<dd class="main">Xdebug version 2.0.0beta2 has been released. This release
<a href='/updates.php'>fixes</a> some problems in the beta1 release.</dd>

<dt class="main">[15-09-2004]</dt>
<dd class="main">Xdebug version 2 has finally reached beta status. We celebrate
that with the release of 2.0.0beta1. For a full changelog, see the <a
href='/updates.php'>updates</a> page.</dd>

<dt class="main">[30-06-2004]</dt>
<dd class="main">Xdebug version 1.3.2 has been released. This release will
compile against the latest CVS of PHP 5 again.</dd>

<dt class="main">[06-04-2004]</dt>
<dd class="main">Xdebug version 1.3.1 has been released. This release just
includes some small bugfixes:
<ul>
<li>Fixed profiler to aggregate class/method calls correctly. (Robert Beenen)</li>
<li>Fixed debugclient to initialize socket structure correctly. (Brandon Philips
  and David Sklar)</li>
<li>GDB: Fixed bug where the source file wasn't closed after a "source" command.
(Derick)</li>
</ul>
</dd>

<dt class="main">[01-04-2004]</dt>
<dd class="main">Added archives for the <a href='/archives/xdebug-general'>Xdebug General</a>
and <a href='/archives/xdebug-dev'>Xdebug Development</a> mailinglists.</dd>

<dt class="main">[28-12-2003]</dt>
<dd class="main">Added the Xdebug <a href="license.php">license</a> to this
website.</dd>

<dt class="main">[26-12-2003]</dt>
<dd class="main">Xdebug version 1.3.0 has been released. Changes since 1.3.0rc1
includes numerous bugfixes and the addition of file/line information to signals.
See the full <a href="updates.php">Changelog</a> to find out what's new. </dd>

<dt class="main">[09-10-2003]</dt>
<dd class="main">Together with Shane Caraveo from <a
href="http://www.activestate.com">ActiveState</a> a new protocol, <a
href="docs-dbgp.php">DBGp</a>, was developed. This will be <a
href="http://www.maguma.com"><img align="left" class="l" alt="maguma"
src="/images/maguma.png" border="0"/></a>implemented for Xdebug 2 and is a true
multi-language protocol. This means that a client written for Xdebug 2 will
also work in combination with the Perl, Python, Tcl and XSLT debuggers from
Active State. For a description of (a draft) of this new protocol, see the <a
href="docs-dbgp.php">documentation - protocol</a> page. The development of the
protocol is sponsored by <a href="http://www.maguma.com">Maguma</a>  and will
also be implemented in Maguma Studio 2.
</dd>

<dt class="main">[18-09-2003]</dt>
<dd class="main">Xdebug version 1.3.0rc1 has been released. This new
version's main enhancements are the increased performance and additional
commands for remote debugging (conditional breakpoints, "full" backtrace, show
local variables) See the full <a href="updates.php">Changelog</a> to find out
what's new. </dd>
<!--
<dt class="main">[16-07-2003] - Clients</dt>
<dd class="main">At this moment there are three clients being written for
Xdebug: <a href="http://xdebug.weaverslave.ws/">XdebugC/Weaverslave</a> by
Thomas Weinert, a native MacOSX client by Bertrand Mansion and <a
href="http://www.maguma.com/en/index.html">Maguma Studio 2</a> will feature a
built-in client too.</dd>
-->
<dt class="main">[16-07-2003]</dt>
<dd class="main">Xdebug version 1.3.0 will have greatly improved performance over older versions.
Changing the folding (creating a string out of a variable) is now only done when it is required:
when being in trace mode (started from <i><a
href='docs.php#xdebug_start_trace'>xdebug_start_trace()</a></i>, or on error. See the full <a
href="updates.php">Changelog</a> for information on other improvements.</dd>

<dt class="main">[21-04-2003]</dt>
<dd class="main">Xdebug version 1.2.0 has been released. This release adds one
extra function in comparison to 1.2.0rc2, <i><a
href='docs.php#xdebug_call_class'>xdebug_call_class()</a></i>.  See the full <a
href="updates.php">Changelog</a> for more information. </dd>

<dt class="main">[15-04-2003]</dt>
<dd class="main">The second release candidate of Xdebug version 1.2.0 has
been released. This RC fixes a few bugs in RC1. See
the full <a href="updates.php">Changelog</a> for more information. </dd>

<dt class="main">[06-04-2003]</dt>
<dd class="main">Xdebug version 1.2.0rc1 has finally been released. This new
version's main enhancements are the profiling support and code coverage.  See
the full <a href="updates.php">Changelog</a> to find out what's new. </dd>

<dt class="main">[16-01-2003]</dt>
<dd class="main">Xdebug supports Zend Engine 2! With the updated OO
functionality in this new engine for PHP Xdebug wouldn't compile anymore, with
this update it works again. Namespaces are not yet supported but will be
implemented soon.</dd>
</dl>

<br /><br />

<!-- MAIN FEATURE END -->

			</td>
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
