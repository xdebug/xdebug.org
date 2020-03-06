<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Supporters
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug - Debugger and Profiler Tool for PHP');
?>

<div class="front_intro">
	<p> Xdebug is an extension for <a href="https://php.net">PHP</a> to assist with
	debugging and development.</p>

	<ul>
		<li>It contains a <a href='/docs/remote'>single step debugger</a> to use with IDEs</li>
		<li>it upgrades PHP's <a href='/docs/display'>var_dump()</a> function</li>
		<li>it adds <a href='/docs/stack_trace'>stack traces</a> for Notices, Warnings, Errors and Exceptions</li>
		<li>it features functionality for <a href='/docs/execution_trace'>recording every function call and variable assignment</a> to disk</li>
		<li>it contains a <a href='/docs/profiler'>profiler</a></li>
		<li>it provides <a href='/docs/code_coverage'>code coverage</a> functionality for use with <a href='https://phpunit.de'>PHPUnit</a></li>
	</ul>

</div>

<div class="front_announcements">
	<h3>Announcements</h3>

	<?= XdebugDotOrg\Controller\NewsController::front_page()->render() ?>

	<hr>

	<p><a href="/announcements">See all announcements</a></p>
</div>

<div class="front_supporters">

	<p>This work is made possible through the generous support of Xdebug's business-tier sponsors:

	<ul class='supporters'>
	<?php foreach ($this->supporters as list($link, $name)) : ?>
		<li><a href="<?= $link ?>"><?= $name ?></a></li>
	<?php endforeach ?>
	</ul>
	<p>You can also be listed as a supporter by <a href='/support'>signing up</a> for a <i>Business</i> package.</p>
</div>
