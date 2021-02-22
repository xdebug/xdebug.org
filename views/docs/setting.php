<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Setting
 */
?>
<div class="doc_setting">
	<a name='<?= $this->name ?>'></a>
	<a name='xdebug.<?= $this->name ?>'></a>
	<h4><span class='type'><?= $this->type ?></span> xdebug.<?= $this->name ?> = <span class='default'><?= $this->default ?></span> <a href='#<?= $this->name ?>'>#</a></h4>

	<?php if ($this->version && $this->version[0] == '>') : ?><p>Introduced in <span class='type'>Xdebug <?= $this->version ?></span></p><?php endif ?>
	<?php if ($this->version && $this->version[0] == '<') : ?><p>Available in <span class='type'>Xdebug <?= $this->version ?></span></p><?php endif ?>

	<div class='description'><?= $this->text ?></div>
</div>
