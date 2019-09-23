<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\FunctionDescription
 */
?>
<a name='<?= $this->name ?>'></a>
<hr class='light'/>
<?php if (!$this->arguments) : ?>
	<div class='name'><span class='type'><?= $this->return_type ?></span> <?= $this->name ?>()</div>
<?php else : ?>
	<div class='name'><span class='type'><?= $this->return_type ?></span> <?= $this->name ?>( <span class='type'><?= $this->arguments ?></span> )</div>
<?php endif ?>

<div class='short-description'><?= $this->short_description ?></div>

<?php if ($this->version) : ?>
<div class='version'>Introduced in version <?= $this->version ?></div>
<?php endif ?>

<div class='description'><?= $this->long_description ?></div>