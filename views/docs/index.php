<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsSections
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation');
?>

<h1>Xdebug 3 — Documentation</h1>
<ul class="doc_list">
	<?php foreach ($this->sections as $section) : ?>
		<li><a href='<?= $section->href ?>'><?= $section->title ?></a></li>
	<?php endforeach ?>

	<li><a href='/docs/all_settings'>All Configuration Settings</a></li>
	<li><a href='/docs/all_functions'>All Functions</a></li>
</ul>
