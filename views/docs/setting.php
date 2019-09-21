<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Setting
 */
?>
<a name='<?= $this->name ?>'></a>
<hr class='light'/>
<div class='name'>xdebug.<?= $this->name ?></div>
Type: <span class='type'><?= $this->type ?></span>, 
Default value: <span class='default'><?= $this->default ?>
</span><?php if ($this->version) : ?>, Introduced in <span class='type'>Xdebug <?= $this->version ?></span><?php endif ?>
<div class='description'><?= $this->text ?></div>