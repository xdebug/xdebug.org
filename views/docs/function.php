<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\FunctionDescription
 */
?>
<div class="doc_function">
	<a name='<?= $this->name ?>'></a>
	<h3 class="name">
		<?php if (!$this->arguments) : ?>
			<?= $this->name ?>()
		<?php else : ?>
			<?= $this->name ?>( <span class='type'><?= $this->arguments ?></span> )
		<?php endif ?>
		<span class='type'> : <?= $this->return_type ?></span>
		<a href='#<?= $this->name ?>'>#</a>
	</h3>

	<div class='short-description'><p><?= $this->short_description ?></p></div>

	<?php if ($this->version) : ?>
	<div class='version'>Introduced in version <?= $this->version ?></div>
	<?php endif ?>

	<div class='description'><?= $this->long_description ?></div>
</div>
