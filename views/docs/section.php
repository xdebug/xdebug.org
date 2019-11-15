<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSection
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » ' . $this->title);

XdebugDotOrg\Controller\TemplateController::setHeadExtra(
	XdebugDotOrg\Controller\DocsController::sectionHead($this->model)->render()
);
?>

<h1><?= $this->title ?></h1>

<div class="doc_section">
	<p class='intro'><?= $this->description ?></p>
	<?= $this->text ?>

	<?php if ($this->related_settings) : ?>
		<div class='settings'>
			<h2>Related Settings</h2>

			<?php foreach ($this->related_settings as $setting) : ?>
				<hr>
				<?= XdebugDotOrg\Controller\Docs\SettingsController::single($setting)->render() ?>
			<?php endforeach ?>
		</div>
	<?php endif ?>

	<?php if ($this->related_functions) : ?>
		<div class='functions'>
			<h2>Related Functions</h2>

			<?php foreach ($this->related_functions as $function) : ?>
				<hr>
				<?= XdebugDotOrg\Controller\Docs\FunctionsController::single($function)->render() ?>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>


