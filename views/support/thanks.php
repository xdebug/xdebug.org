<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support - thanks!');
?>

<h1>Thanks!</h1>

<?= XdebugDotOrg\Controller\TemplateController::support_menu()->render() ?>

<?php if ( isset( $_GET['pdf'] ) && $_GET['pdf'] == 'yes' ) { ?>
<h1>Thank you for buying your PDF</h1>
<p>
I will soon e-mail you the PDF and send a thank you note!
</p>
<?php } else { ?>
<h1>Thank you for buying your support agreement</h1>
<p>
I will soon e-mail you a thank you note!
</p>
<?php } ?>

<p>cheers,<br />
Derick
</p>

<br /><br />
