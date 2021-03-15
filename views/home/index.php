<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Supporters
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug - Debugger and Profiler Tool for PHP');
?>

<div class="front_intro">
	<p class="intro">Xdebug is an extension for <a href="https://php.net">PHP</a>, and
	provides a range of features to improve the PHP development experience.</p>

	<dl class="features">
		<dt><a href='/docs/step_debug'>Step Debugging</a></dt>
		<dd>A way to step through your code in your IDE or editor while the script is executing.</dd>

		<dt><a href='/docs/develop'>Improvements to PHP's error reporting</a></dt>
		<dd>An improved <code><a href='/docs/develop#display'>var_dump()</a></code> function, stack traces for
		Notices, Warnings, Errors and Exceptions to highlight the code path to
		the error</dd>

		<dt><a href='/docs/trace'>Tracing</a></dt>
		<dd>Writes every function call, with arguments and invocation location
		to disk. Optionally also includes every variable assignment and return
		value for each function.</dd>

		<dt><a href='/docs/profiler'>Profiling</a></dt>
		<dd>Allows you, with the help of visualisation tools, to analyse the
		performance of your PHP application and find bottlenecks.</a>

		<dt><a href='/docs/code_coverage'>Code Coverage Analysis</a></dt>
		<dd>To show which parts of your code base are executed when running
		unit tests with PHP Unit.</dd>
	</dl>
</div>

<div class="front_announcements">
	<h3>Announcements</h3>

	<?= XdebugDotOrg\Controller\NewsController::front_page()->render() ?>

	<hr>

	<p><a href="/announcements">See all announcements</a></p>
</div>

<a name="business_supporters"></a>
<div class="front_supporters">

	<p>Xdebug is made possible through the generous support of Xdebug's business-tier sponsors:</p>

	<ul class='supporters'>
	<?php foreach ($this->supporters as list($link, $name)) : ?>
		<li><a href="<?= $link ?>"><?= $name ?></a></li>
	<?php endforeach ?>
	</ul>
	<p>You can also be listed as a supporter by <a href='/support'>signing up</a> for a <i>Business</i> package.</p>
</div>
