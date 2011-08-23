<?php $title = "Xdebug - Debugger and Profiler Tool for PHP"; include "include/header.php"; hits ('xdebug'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP</span><br />

<?php include "include/menu.php"; ?>

<!--<iframe id="flickr" align="right" src="http://www.flickr.com/slideShow/index.gne?user_id=36163802@N00&set_id=72157601485462007" frameBorder=0 width=300 scrolling=no height=300></iframe>-->
<a name="announcements"></a>
<h2>Announcements</h2>

<dl class="main">

<dt class="main">[2011-07-28]</dt>
<dd class="main">
<p>Xdebug 2.1.2 is out! This is the second bug fix release of Xdebug 2.1.
Xdebug 2.1.2 addresses three issues for code coverage as well as a few other
minor issues.  functionality. The full change log can be found on the <a
href="/updates.php#x_2_1_2">updates</a> page and the source code and Windows
binaries can be found on the <a href="/download.php">downloads</a> page.</p>
<p>I would also like to point to an <a
href="http://drck.me/sponsor-xdebug-8ky">article on Derick's website</a>
regarding sponsoring Xdebug.</p>
</dd>

<dt class="main">[2011-03-28]</dt>
<dd class="main">
<p>Xdebug 2.1.1 is out! This is the first bug fix release of Xdebug 2.1.
Xdebug 2.1.1 addresses issues mainly in the profiler and debugger
functionality. This includes the KCacheGrind <a
href="https://bugs.kde.org/show_bug.cgi?id=256425#c10">issue</a>.  The full
change log can be found on the <a href="/updates.php#x_2_1_1">updates</a> page
and the source code and Windows binaries can be found on the <a
href="/download.php">downloads</a> page.</p>
</dd>

<dt class="main">[2011-03-22]</dt>
<dd class="main">
<p>I just released Xdebug 2.1.1rc1 - which addresses issues mainly in the
profiler and debugger functionality. This includes the KCacheGrind <a
href="https://bugs.kde.org/show_bug.cgi?id=256425#c10">issue</a>.  The full
change log can be found on the <a href="/updates.php#x_2_1_1rc1">updates</a>
page and the source code can be found on the <a
href="/download.php">downloads</a> page.</p>
</dd>

<dt class="main">[2010-06-29]</dt>
<dd class="main">
<p>I have just released Xdebug 2.1.0. Xdebug 2.1 includes many new features
that have been added over the past three years. Xdebug 2.1 also provides PHP
5.3 support. Among the new features, it includes
<a href="http://derickrethans.nl/variable-tracing-with-xdebug.html">variable tracing</a> in function traces,
a new <a href="/docs/all_settings#remote_connect_back">setting</a> that tries to call back the same IP address for remote debugging,
<a href="/docs/all_functions#xdebug_get_headers">a function</a> to return all explicitly and implicitly set headers,
a <a href="/docs/all_settings#scream">setting</a> that makes PHP ignore the @ operator and many other smaller features. A huge amount of bugs have been addressed as well.
For a full list, please refer to the <a href="/updates.php#x_2_1_0">updates</a> page.</p>
<p>You can find a more thorough description of all new features at <a
href="http://derickrethans.nl/xdebug-2.1-released.html">http://derickrethans.nl/xdebug-2.1-released.html</a>.</p></dd>

<dt class="main">[2010-04-06]</dt>
<dd class="main">
<p>I just released Xdebug 2.1.0rc1 - which addresses a few issues that were
still left.  The full change log can be found on the <a
href="/updates.php#x_2_1_0rc1">updates</a> page.</p> </dd>

<dt class="main">[2010-02-27]</dt>
<dd class="main">
<p>I just released Xdebug 2.1.0beta3 - which features a few crashes as well
as the "header" problem. The full change log can be found
on the <a href="/updates.php#x_2_1_0beta3">updates</a> page. This will be the 
last beta version, and the next release will be Xdebug 2.1.0rc1.</p> </dd>

<dt class="main">[2010-02-03]</dt>
<dd class="main">
<p>I just released Xdebug 2.1.0beta2 - which features a few bug fixes, as well
as returned Windows binaries for PHP 5.3/VC6. The full change log can be found
on the <a href="/updates.php#x_2_1_0beta2">updates</a> page.</p> </dd>

<dt class="main">[2010-01-03]</dt>
<dd class="main">
<p>I just released Xdebug 2.1.0beta - which features a whole list of new
features, for example PHP 5.3 support, variable assignment tracing, collection
of headers and error messages for later use and improved code coverage.
The full change log can be found on the <a
href="/updates.php#x_2_1_0beta1">updates</a> page.</p> </dd>

<dt class="main">[2009-07-03]</dt>
<dd class="main">
<p>I just released Xdebug 2.0.5 - which features mostly bugfixes. The whole
change log can be found on the <a href="/updates.php#x_2_0_5">updates</a>
page.</p> </dd>

<dt class="main">[2009-01-02]</dt>
<dd class="main">
<p>I moved the downloads from the right side bar to their own <a
href="/download.php">page</a> to provide an easier way of downloading Xdebug
releases.</p></dd>

<dt class="main">[2008-12-30]</dt>
<dd class="main">
<p>I just released Xdebug 2.0.4 - which features bugfixes and PHP 5.3
compatibility. The whole change log can be found on the <a
href="/updates.php#x_2_0_4">updates</a> page.</p> <p>As with most open source
projects, it's very hard to know who are actually the users of the project. As
I would like to know my users better, I would invite everybody who finds Xdebug
useful to send me a postcard with their location. (Address is <a
href="http://derickrethans.nl/who.php">here</a> at the top of the
page). I am looking forwards to find out who you are!</p></dd>

<dt class="main">[2008-04-09]</dt>
<dd class="main">
<p>I just released Xdebug 2.0.3 - which features bugfixes and PHP 5.3
compatibility. The whole change log can be found on the <a
href="/updates.php#x_2_0_3">updates</a> page.</p></dd>

<dt class="main">[2007-11-11]</dt>
<dd class="main">
<p>I just released Xdebug 2.0.2 - which features bugfixes related to the
improved code coverage support that was introduced in 2.0.1.  The whole change
log can be found on the <a href="/updates.php#x_2_0_2">updates</a> page.</p>
<p>As with most open source projects, it's very hard to know who are actually
the users of the project. As I would like to know my users better, I would
invite everybody who finds Xdebug useful to send me a postcard with their
location. (Address is <a href="http://derickrethans.nl/who.php">here</a> at the
top of the page). I am looking forwards to find out who you are!</p></dd>

<dt class="main">[2007-10-20]</dt>
<dd class="main">
<p>I just released Xdebug 2.0.1 - which features some bugfixes,
while the major thing is the immense increase in performance of code
coverage.  The whole change log can be found on the <a
href="/updates.php#x_2_0_1">updates</a> page.</p>

<dt class="main">[2007-07-18]</dt>
<dd class="main">It is finally here, Xdebug 2.0.0 has arrived! After about four
years of work I finally found it ready to release. Have fun!
After almost four years of work, Xdebug 2 is finally ready. With
improved functionality and many new features it is ready to totally
change the way you develop in PHP. Some of the new features and updates
include <a href="/docs/stack_trace">improved stack
traces</a>, <a href="/docs/execution_trace">execution traces to
files</a>, <a href="/docs/code_coverage">code
coverage analysis</a> and much improved <a href="/docs/remote">remote debugging</a> support.
Xdebug's <a href="/docs">documentation</a> has also
been rewritten for more clarity.</dd>

<dt class="main">[2007-05-17]</dt>
<dd class="main">Xdebug version 2.0.0RC4 has been released. There are two major
changes that needs some introduction. The first one is that the
profiler_output_name and trace_output_name settings no longer accept simple
values such as "crc32", but instead now accept different format specifiers,
very similar to printf() and strftime() modifiers. This will show up in the
newly organized documentation very soon as well.</dd>

<dt class="main">[2007-01-31]</dt>
<dd class="main">Xdebug version 2.0.0RC3 has been released. This release
fixes a number of bugs and should be the last release candidate before 2.0.0 is
released. Now is your time to test!</dd>

<dt class="main">[2006-12-24]</dt>
<dd class="main">Xdebug version 2.0.0RC2 has been released. This release
features many internal clean ups and bug fixes. Some issues with the newly
introduced layout for stack traces where also addressed.</dd>

<dt class="main">[2006-10-08]</dt>
<dd class="main">Xdebug version 2.0.0RC1 has been released. This release
includes some performance enhancing patches and <a
href='/updates.php'>fixes</a> some problems in the previous beta releases. It
also features a new layout for <a
href='http://derickrethans.nl/pimping_xdebug_stack_traces.php'>stack traces</a>
and features much better code-coverage support.</dd>

<dt class="main">[2006-06-30]</dt>
<dd class="main">Xdebug version 2.0.0beta6 has been released. This release
includes some performance enhancing patches and <a
href='/updates.php'>fixes</a> some problems in the previous beta releases.</dd>

<dt class="main">[2005-12-31]</dt>
<dd class="main">Xdebug version 2.0.0beta5 has been released. This release
<a href='/updates.php'>fixes</a> some problems in the previous beta releases.</dd>

<dt class="main">[2004-11-29]</dt>
<dd class="main">Xdebug version 2.0.0beta2 has been released. This release
<a href='/updates.php'>fixes</a> some problems in the beta1 release.</dd>

<dt class="main">[2004-09-15]</dt>
<dd class="main">Xdebug version 2 has finally reached beta status. We celebrate
that with the release of 2.0.0beta1. For a full changelog, see the <a
href='/updates.php'>updates</a> page.</dd>

<dt class="main">[2004-06-30]</dt>
<dd class="main">Xdebug version 1.3.2 has been released. This release will
compile against the latest CVS of PHP 5 again.</dd>

<dt class="main">[2004-04-06]</dt>
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

<dt class="main">[2004-04-01]</dt>
<dd class="main">Added archives for the <a href='/archives/xdebug-general'>Xdebug General</a>
and <a href='/archives/xdebug-dev'>Xdebug Development</a> mailinglists.</dd>

<dt class="main">[2003-12-28]</dt>
<dd class="main">Added the Xdebug <a href="license.php">license</a> to this
website.</dd>

<dt class="main">[2003-12-26]</dt>
<dd class="main">Xdebug version 1.3.0 has been released. Changes since 1.3.0rc1
includes numerous bugfixes and the addition of file/line information to signals.
See the full <a href="updates.php">Changelog</a> to find out what's new. </dd>

<dt class="main">[2003-10-09]</dt>
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

<dt class="main">[2003-09-18]</dt>
<dd class="main">Xdebug version 1.3.0rc1 has been released. This new
version's main enhancements are the increased performance and additional
commands for remote debugging (conditional breakpoints, "full" backtrace, show
local variables) See the full <a href="updates.php">Changelog</a> to find out
what's new. </dd>
<!--
<dt class="main">[2003-07-16] - Clients</dt>
<dd class="main">At this moment there are three clients being written for
Xdebug: <a href="http://xdebug.weaverslave.ws/">XdebugC/Weaverslave</a> by
Thomas Weinert, a native MacOSX client by Bertrand Mansion and <a
href="http://www.maguma.com/en/index.html">Maguma Studio 2</a> will feature a
built-in client too.</dd>
-->
<dt class="main">[2003-07-16]</dt>
<dd class="main">Xdebug version 1.3.0 will have greatly improved performance over older versions.
Changing the folding (creating a string out of a variable) is now only done when it is required:
when being in trace mode (started from <i><a
href='docs.php#xdebug_start_trace'>xdebug_start_trace()</a></i>, or on error. See the full <a
href="updates.php">Changelog</a> for information on other improvements.</dd>

<dt class="main">[2003-04-21]</dt>
<dd class="main">Xdebug version 1.2.0 has been released. This release adds one
extra function in comparison to 1.2.0rc2, <i><a
href='docs.php#xdebug_call_class'>xdebug_call_class()</a></i>.  See the full <a
href="updates.php">Changelog</a> for more information. </dd>

<dt class="main">[2003-04-15]</dt>
<dd class="main">The second release candidate of Xdebug version 1.2.0 has
been released. This RC fixes a few bugs in RC1. See
the full <a href="updates.php">Changelog</a> for more information. </dd>

<dt class="main">[2003-04-06]</dt>
<dd class="main">Xdebug version 1.2.0rc1 has finally been released. This new
version's main enhancements are the profiling support and code coverage.  See
the full <a href="updates.php">Changelog</a> to find out what's new. </dd>

<dt class="main">[2003-01-16]</dt>
<dd class="main">Xdebug supports Zend Engine 2! With the updated OO
functionality in this new engine for PHP Xdebug wouldn't compile anymore, with
this update it works again. Namespaces are not yet supported but will be
implemented soon.</dd>
</dl>

<br /><br />

<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
