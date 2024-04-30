<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support — Thanks');
?>

<h1>Thanks!</h1>

<p>
Dear <?= $this->data->customer->contact_name; ?>,
</p>
<p>
Thank you for supporting the
<a href="/funding/<?= $this->model->data->customer->package ?>"><?=
$this->model->data->customer->projects->{$this->model->data->customer->package}
?></a> project.
</p>
<p>
Once your support contribution has been verified, it will be added to the
<a href="/funding/<?= $this->model->data->customer->package ?>">project
page</a>. You will then also receive an invoice for your records at your
<?= is_string( $this->data->customer->billing_email ) ? 'billing' : 'contact'; ?> email
address.
</p>
<p>
We appreciate your commitment to the Xdebug project and look forward to
working with you. If you have any questions or feedback, please don't hesitate
to contact us.
</p>
<p>
Once again, thank you for your support and for helping to ensure the continued
success of Xdebug!
</p>
