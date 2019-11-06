<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Functions
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » All functions');
?>

<h1>Documentation - all functions</h1>

<p>
This section describes all available functions available in Xdebug.
</p>

<div class='functions'>
	<?php foreach ($this->functions as $function) : ?>
		<hr>
		<?= XdebugDotOrg\Controller\Docs\FunctionsController::single($function)->render() ?>
	<?php endforeach ?>
</div>
<hr />



