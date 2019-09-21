<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSections
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation');
?>

<h1>Documentation</h1>

<?= XdebugDotOrg\Controller\TemplateController::default_menu()->render() ?>

» Documentation for: <b>Xdebug 2</b><br />
<hr />

<?php foreach ($this->sections as $section) : ?>
	» <a href='<?= $section->href ?>'><?= $section->title ?></a><br>
	<p class="shortdesc"><?= $section->description ?></p>
	<hr class="light">
<?php endforeach ?>
<hr />
» <a href='/docs/all_settings'>All Configuration Settings</a><br />
» <a href='/docs/all_functions'>All Functions</a><br />
<hr />
