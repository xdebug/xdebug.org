<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\NewsItems
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug - Announcements');
?>
<h2>Announcements</h2>

<ul>
<?php foreach ($this->items as $item) : ?>
	<li><a href="/announcements/<?= $item->date->format("Y-m-d") ?>">[<?= $item->date->format("Y-m-d") ?>] - <?= $item->title ?></a></li>
<?php endforeach ?>
</ul>
