<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\WizardFailure
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Wizard failure');
?>

<h1>Installation Wizard</h1>

<h2><?= $this->reason ?></h2>
<p>
The wizard could not help in your situation, so please read the installation
<a href="/docs/install">documentation</a>. If the wizard indicated that your
current PHP version is not supported, please see whether there is a file
available for download or compilation on the <a href="/download">download</a>
page.
</p>
