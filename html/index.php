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

<dt class="main">[28-11-2002]</dt>
<dd class="main">Work on a profiler in Xdebug has started by Ilia
Alshanetsky. A few different output sortings will be implemented,
more about this later.</dd>

<dt class="main">[13-11-2002]</dt>
<dd class="main">Xdebug version 1.1.0 has finally been released. This new
version's main enhancements are support for remote clients. The client-server
works on both unices and Windows.  See the full <a
href="updates.php">Changelog</a> to find out what's new. </dd>

<dt class="main">[09-11-2002]</dt>
<dd class="main"><a href="http://www.subjective.de/en/weaverslave/index.php">Weaverslave</a>
will be the first IDE that supports Xdebug as debugging back-end. The author,
Thomas Weinert, is currently including support for the remote debugging
capabilities. More information in this will follow later.</dd>

<dt class="main">[08-11-2002]</dt>
<dd class="main">Slides <a
href="http://pres.derickrethans.nl/ze-xdebug">on-line</a> of my
presentation on Zend Internals and Xdebug
at the <a href="http://www.derickrethans.nl/20021107.php">International PHP Conference</a>.</dd>
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
