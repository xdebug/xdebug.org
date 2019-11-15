<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\NewsItem
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug - ' . $this->title);
?>

<h3><?= $this->date->format("Y-m-d") ?></h3>
<h2><?= $this->title ?></h2>

<?= $this->contents ?>
