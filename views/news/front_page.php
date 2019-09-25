<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\NewsItems
 */
?>
<ul>
<?php foreach ($this->items as $item) : ?>
	<li><a href="/announcements/<?= $item->date->format("Y-m-d") ?>">[<?= $item->date->format("Y-m-d") ?>] - <?= $item->title ?></a></li>
<?php endforeach ?>
</ul>
