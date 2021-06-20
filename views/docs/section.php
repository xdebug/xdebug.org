<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSection
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » ' . $this->title);

/** @psalm-suppress UndefinedThisPropertyFetch because of slight cheats */
XdebugDotOrg\Controller\TemplateController::setHeadExtra(
	XdebugDotOrg\Controller\DocsController::sectionHead($this->model)->render()
);
?>

<h1><?= $this->title ?></h1>

<?php if (count($this->supported_languages) > 1) : ?>
	<div class="supported_languages">
		<?php foreach ($this->supported_languages as $language) : ?>
			<?= "<span class=\"language\"><a href='{$language['url']}'>{$language['name']}</a></span>"; ?>
		<?php endforeach ?>
	</div>
<?php endif ?>

<div class="doc_section">
	<p class='intro'><?= $this->description ?></p>
	<?= $this->text ?>

	<a name='related_content'></a>
	<?php if ($this->related_content) : ?>
		<div class="content">
			<h2>Related Content <a name="related_content" href="#related_content">#</a></h2>

			<ul>
				<?php foreach ($this->related_content as $content) : ?>
					<?= XdebugDotOrg\Controller\Docs\RelatedContentController::singleLine($content)->render() ?>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endif ?>

	<?php if ($this->related_settings || $this->related_functions) : ?>
		<h2>Related Settings and Functions <a name="related_settings_and_functions" href="#related_settings_and_functions">#</a></h2>
		<ul>
			<?php foreach ($this->related_settings as $setting) : ?>
				<?= XdebugDotOrg\Controller\Docs\SettingsController::singleLine($setting)->render() ?>
			<?php endforeach ?>
		</ul>
		<ul>
			<?php foreach ($this->related_functions as $function) : ?>
				<?= XdebugDotOrg\Controller\Docs\FunctionsController::singleLine($function)->render() ?>
			<?php endforeach ?>
		</ul>
	<?php endif ?>

	<a name='settings'></a>
	<?php if ($this->related_settings) : ?>
		<div class='settings'>
			<h3>Settings <a name="related_settings" href="#related_settings">#</a></h3>

			<?php foreach ($this->related_settings as $setting) : ?>
				<hr>
				<?= XdebugDotOrg\Controller\Docs\SettingsController::single($setting)->render() ?>
			<?php endforeach ?>
		</div>
	<?php endif ?>

	<a name='functions'></a>
	<?php if ($this->related_functions) : ?>
		<div class='functions'>
			<h3>Functions <a name="related_functions" href="#related_functions">#</a></h3>

			<?php foreach ($this->related_functions as $function) : ?>
				<hr>
				<?= XdebugDotOrg\Controller\Docs\FunctionsController::single($function)->render() ?>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>


