<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Settings
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » All settings');
?>

<h1>Documentation - all settings</h1>

<p>
This section describes all available configuration settings available in Xdebug.
</p>

<div class='settings'>
	<?php foreach ($this->settings as $setting) : ?>
		<?= XdebugDotOrg\Controller\Docs\SettingsController::single($setting)->render() ?>
	<?php endforeach ?>
</div>
<hr />



