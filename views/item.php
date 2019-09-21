<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\NewsItem
 */
?>
<a name='<?= $this->date->format("Y-m-d") ?>'></a>
<dt class='main'>[<?= $this->date->format("Y-m-d") ?>] - <?= $this->title ?></dt>
<dd class='main'><?= $this->contents ?></dd>
<hr>
