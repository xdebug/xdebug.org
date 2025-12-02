<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\DocsCategories
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation');
?>

<h1>Xdebug 3 — Documentation</h1>

<?php foreach ($this->categories as $category) : ?>
	<h2><?= $category->title ?></h2>
	<?php if (in_array($category->title, ['Installation', 'Features', 'Compatibility'])) : ?>
	<div class="doc_overview_category" id="cat_<?= strtolower($category->title); ?>">
		<?php foreach ($category->sections as $section) : ?>
			<?php if ($section->href == '/docs/garbage_collection') { continue; } ?>
			<div class="doc_overview_section">
				<div class="doc_overview_section_icon">
					<a href='<?= $section->href ?>'>
						<?php if (in_array($category->title, ['Features', 'Compatibility'])) : ?>
						<img id="doc-<?= $section->href; ?>" src="/images<?= $section->href ?>.png" alt="<?= $section->title ?>">
						<?php else : ?>
						<img id="doc-<?= $section->href; ?>" src="/images<?= $section->href ?>.svg" alt="<?= $section->title ?>">
						<?php endif; ?>
					</a>
				</div>
				<div class="doc_overview_section_text"><?= $section->title; ?></div>
			</div>
		<?php endforeach ?>
	</div>
	<?php else: ?>
	<dl>
		<?php foreach ($category->sections as $section) : ?>
		<dt><a href='<?= $section->href; ?>'><?= $section->title; ?></a></dt>
		<dd><?= $section->description; ?></dd>
		<?php endforeach ?>
	</dl>
	<?php endif; ?>
<?php endforeach ?>
