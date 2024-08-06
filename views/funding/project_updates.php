<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\FundingProjectUpdates
 */
?>
<ul>
	<?php foreach ($this->items as $item) : ?>
		<li><?= $item->date->format("Y-m-d") ?> - <a href="/funding/<?= $this->project ?>/updates/<?= $item->date->format("Y-m-d") ?>"><?= $item->title ?></a></li>
	<?php endforeach ?>
</ul>
