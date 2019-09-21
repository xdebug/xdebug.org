<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\NewsItems
 */
?>
<?php foreach ($this->items as $item) : ?>
	<a name='<?= $item->date->format("Y-m-d") ?>'></a>
	<dt class='main'>[<?= $item->date->format("Y-m-d") ?>] - <?= $item->title ?></dt>
	<dd class='main'><?= $item->contents ?></dd>
	<hr>
<?php endforeach ?>