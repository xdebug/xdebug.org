<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support — Payment Cancelled');
?>

<h1>Payment Cancelled</h1>

<?php if (isset($this->data->customer->contact_name)): ?>
<p>
Dear <?= $this->data->customer->contact_name; ?>,
</p>
<?php endif; ?>
<p>
Unfortunately, your payment for Xdebug Support did not go through.
</p>
<p>
We understand that sometimes things happen and payments don't go
through, but we would like to remind you that your contribution helps
fund the development and maintenance of Xdebug.
</p>
<p>
If you want to support Xdebug in a different way, please do not
hesitate to reach out to us.
</p>
<p>
Thank you for considering supporting Xdebug.
</p>
