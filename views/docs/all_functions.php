<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\Functions
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Documentation » All functions');
?>

<h1>Documentation</h1>

» Documentation for: <b>Xdebug 2</b><br />
» All functions<br />
<hr />

<hr class='light'/>
This section describes all available functions available in Xdebug.
<hr style='clear: both'>

<div class='functions'>
	<?php foreach ($this->functions as $function) : ?>
		<?= XdebugDotOrg\Controller\Docs\FunctionsController::single($function)->render() ?>
	<?php endforeach ?>
</div>
<hr />



