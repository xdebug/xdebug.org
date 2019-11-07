<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Setting
 */
?>
<div class="doc_setting">
	<a name='<?= $this->name ?>'></a>
	<h3><span class='type'><?= $this->type ?></span> xdebug.<?= $this->name ?> = <span class='default'><?= $this->default ?></span></h3>

	<?php if ($this->version) : ?><p>Introduced in <span class='type'>Xdebug <?= $this->version ?></span></p><?php endif ?>

	<div class='description'><?= $this->text ?></div>
</div>
