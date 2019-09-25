<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSections
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation');
?>

<h1>Documentation</h1>

<div class="doc_list">
	<?php foreach ($this->sections as $section) : ?>
		<h3><a href='<?= $section->href ?>'><?= $section->title ?></a></h3>
	<?php endforeach ?>

	<h3><a href='/docs/all_settings'>All Configuration Settings</a></h3>
	<h3><a href='/docs/all_functions'>All Functions</a></h3>
</div>
