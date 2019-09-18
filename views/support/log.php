<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\SupportLog
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Log');
?>

<h1>Log and Supporters Xdebug</h1>

<?= XdebugDotOrg\Controller\TemplateController::support_menu()->render() ?>

<div class="left">

<?php // this is lazy of me ?>
<?php foreach ($this->files as $file) : ?>
	<?= XdebugDotOrg\Controller\SupportController::get_report( $file ) ?>
	<br/>
<?php endforeach ?>
</div>

<div class="right">
<h2>Current Supporters</h2>

<ul class='supporters'>
<?php foreach ($this->supporters as list($link, $name)) : ?>
	<li><a href="<?= $link ?>"><?= $name ?></a></li>
<?php endforeach ?>
</ul>

<p>You can also be listed as a supporter by <a href='/support'>signing up</a> for a <i>Company</i> package.</p>

</div>