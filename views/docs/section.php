<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSection
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » ' . $this->title);

XdebugDotOrg\Controller\TemplateController::setHeadExtra(
	XdebugDotOrg\Controller\DocsController::sectionHead($this->model)->render()
);
?>

<h1>Documentation</h1>

<?= XdebugDotOrg\Controller\TemplateController::default_menu()->render() ?>

» Documentation for: <b>Xdebug 2</b><br />
» Feature: <b><?= $this->title ?></b><br />
<hr />

<p class='intro'><?= $this->description ?></p>
<hr class='light'/>
<?= $this->text ?>
<hr style='clear: both'>

<?php if ($this->related_settings) : ?>
	<h2>Related Settings</h2>
	<div class='settings'>
		<?php foreach ($this->related_settings as $setting) : ?>
			<?= XdebugDotOrg\Controller\Docs\SettingsController::single($setting)->render() ?>
		<?php endforeach ?>
	</div>
	<hr />
<?php endif ?>

<?php if ($this->related_functions) : ?>
	<h2>Related Functions</h2>
	<div class='functions'>
		<?php foreach ($this->related_functions as $function) : ?>
			<?= XdebugDotOrg\Controller\Docs\FunctionsController::single($function)->render() ?>
		<?php endforeach ?>
	</div>
	<hr />
<?php endif ?>


