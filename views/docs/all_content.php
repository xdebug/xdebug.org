<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Settings
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » All related content');
?>

<h1>Documentation - all related content</h1>

<?php foreach ($this->content as $content) : ?>
	<hr>
	<?= XdebugDotOrg\Controller\Docs\RelatedContentController::single($content)->render() ?>
<?php endforeach ?>
