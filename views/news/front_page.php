<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\NewsItems
 */
?>
<ul>
<?php foreach ($this->items as $item) : ?>
	<li><?= $item->date->format("Y-m-d") ?> - <a href="/announcements/<?= $item->date->format("Y-m-d") ?>"><?= $item->title ?></a></li>
<?php endforeach ?>
</ul>
