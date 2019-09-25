<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Setting
 */
?>
<div class="doc_setting">
	<a name='<?= $this->name ?>'></a>
	<h3>xdebug.<?= $this->name ?></h3>

	<p>Type: <span class='type'><?= $this->type ?></span>,
	Default value: <span class='default'><?= $this->default ?>
	</span><?php if ($this->version) : ?>, Introduced in <span class='type'>Xdebug <?= $this->version ?></span><?php endif ?>
	</p>

	<div class='description'><?= $this->text ?></div>
</div>
