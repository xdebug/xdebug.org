<?php $title = "Xdebug"; include "include/header.php"; hits ('xdebug'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP</span><br />

<?php include "include/menu.php"; ?>

<a name="functionality"></a>
<span class="sans">FUNCTIONALITY</span><br />

<p>
The Xdebug extension helps you debugging your script by providing a lot of
valuable debug information. The debug information that Xdebug can
provide includes the following:
</p>
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
<p>
Xdebug also provides:
</p>
<p>
<ul>
<li><a href='docs-profiling.php'>profiling</a> information for PHP scripts</li>
<li><a href='docs.php#xdebug_start_code_coverage'>script execution analysis</a></li>
<li>capabilities to debug your scripts interactively with a debug client</li>
</ul>
</p>

<a name="announcements"></a>
<span class="sans">ANNOUNCEMENTS</span><br />

<dl class="main">
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
href="http://www.maguma.com"><img align="left" class="l"
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
