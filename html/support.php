<?php $title = "Xdebug: Support"; include "include/header.php"; hits ('xdebug-support'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | SUPPORT</span><br />

<?php include "include/menu.php"; ?>

<h2>Bugs</h2>

<p>
If you think that you found a bug in Xdebug, please file a bugreport at the <a
href="http://bugs.xdebug.org">Bug Tracking</a> page. You will need to register
because this prevents abuse by smammers and other abusing parties. Try to give
as much possible information to reproduce the bug, this will greatly help in
fixing them. For some hints on what information is useful, see the following
sections.
</p>

<h3>Remote Debugger Bugs</h3>
<p>
To provide sufficient it is important to provide both a short reproducable
script (that means a self-contained script without external requirements such
as a database and/or other files) and a remote debugging log. This log will be
created automatically for each debug session when the
<a href="/docs/all_settings#remote_log">xdebug.remote_log</a> setting is not
empty. The setting configures the filename where Xdebug will try to write all
incoming commands and outgoing response to. Make sure that the user under which
Xdebug runs (either the user with CLI, or the Apache/Webserver user when Xdebug
runs as extension in a web server environment).
</p>

<br />

<h2>Mailinglist</h2>

<p>
Discussions about Xdebug, feature requests etc. can be held on the Xdebug
mailinglist. You can subscribe to it by sending e-mail to <u>ecartis@<span
class="hide">remove-this-first@</span>lists.xdebug.org</u> with subject
<b>subscribe xdebug-general</b>.  Posts to the list (<u>xdebug-general@<span
class="hide">remove-this-first@</span>lists.xdebug.org</u>) are
moderated unless you are subscribed to the list. To unsubscribe send e-mail to
the same address, but then use the subject <b>unsubscribe xdebug-general</b>.
You need to do this from the same e-mail address as from the address you
subscribe with. You can find an archive for the Xdebug General list <a
href="http://xdebug.org/archives/xdebug-general/">here</a> and one for the
closed developers list <a
href="http://xdebug.org/archives/xdebug-dev/">here</a>.
</p>

<br />

<h2>E-mail</h2>

<p>
If you have a general question about Xdebug, please send an email to
<u>xdebug-general@<span
class="hide">remove-this-first@</span>lists.xdebug.org</u>.  If you like Xdebug
and make use of it, feel free to checkout my <?php url('giftlist', 'wishlist');
?>.  This improves chances that I will be continuing developing Xdebug as an
open source extension.
</p>
<p>
If you have other questions, feel free to send me an e-mail (but read <a
href="http://www.derickrethans.nl/20020430.php">this</a> first) to
<u>derick@<span class="hide">remove-this-first@</span>xdebug.org</u>.</p>

<br /><br />

<!-- MAIN FEATURE END -->

			</span></td>
			<td>&nbsp;</td>
			<td>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>
<?php include "include/side.php"; ?>
						</td>
					</tr>
				</table>
			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
