<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Settings
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » All settings');
?>

<h1>Documentation</h1>

<?= XdebugDotOrg\Controller\TemplateController::default_menu()->render() ?>

» Documentation for: <b>Xdebug 2</b><br />
» All settings<br />
<hr />

<hr class='light'/>
This section describes all available configuration settings available in Xdebug.
<hr style='clear: both'>

<div class='settings'>
	<?php foreach ($this->settings as $setting) : ?>
		<?= XdebugDotOrg\Controller\Docs\SettingsController::single($setting)->render() ?>
	<?php endforeach ?>
</div>
<hr />



