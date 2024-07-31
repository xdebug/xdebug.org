<?php
/**
 * @psalm-scope-this XdebugDotOrg\Model\StripeSession
 */
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Support — Thanks');
?>

<h1>Thanks!</h1>

<p>
Dear <?= $this->data->customer->contact_name; ?>,
</p>
<p>
Thank you for signing up for Xdebug Support! Your contribution helps fund
the development and maintenance of Xdebug, an essential tool for PHP developers.
</p>
<p>
You will receive an invoice for your records at your
<?= is_string( $this->data->customer->billing_email ) ? 'billing' : 'contact'; ?> email
address in the next few days.
</p>
<p>
As a supporter, you'll be able to email me for personalized technical support.
The support period runs until <?= $this->data->paid_at->toDateTime()->modify("+1 year")->format( 'l F jS, Y' ); ?>.
You will receive an email near that date, for the opportunity to renew.
</p>
<?php if ( $this->data->customer->package === 'business' && isset( $this->data->customer->link_target ) && isset( $this->data->customer->link_text ) ): ?>
<p>
As a business supporter you have the opportunity to be listed as a supporter.
Your provided link will therefore appear on the Xdebug home page after vetting, as:
</p>
<ul class="supporters">
	<li><a href="<?= $this->data->customer->link_target; ?>"><?= $this->data->customer->link_text; ?></a></li>
</ul>
<?php endif; ?>
<p>
Your support also allows us to continue improving Xdebug and adding new
features that make debugging easier and more efficient for developers around
the world.
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
