<?php $title = "Xdebug: Support"; include "include/header.php"; require 'include/phpinfo-scanner.php'; ?>
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
because this prevents abuse by spammers and other abusing parties. Try to give
as much possible information to reproduce the bug, this will greatly help in
fixing them. For some hints on what information is useful, see the following
sections. <b>Versions before 2.3 are no longer supported</b>.
</p>

<a name='remote'></a>
<h3>Remote Debugger Bugs</h3>
<p>
To make it possible for me to find and fix bugs for the remote debugging
feature, I need several bits of information. Without this information, I can
not fix your bug.
</p>

<p>
First of all, I need a <strong>short</strong> and
<strong>self-contained</strong> script that exhibits the issue. Short means
about 10-20 lines maximum, and self-contained means that it can
<strong>not</strong> not depend on any other libraries, or databases.
</p>

<p>
If you <strong>really</strong> can't make a short script after trying for
several hours ;-), then please prepare something that I can: clone from
GitHub, use something like composer to install dependencies, and then can
run. The script can still not have dependencies on things like databases, as
I won't have them installed. Please <a href='/support.php#email'>contact
me</a> first if you are not sure.
</p>

<p>
Secondly, I need a remote debugging log. This debugging log contains all the
interactions between Xdebug and an IDE and is vital to track down where the
error occurs, and due to which protocol command.
</p>

<p>
You can make a remote debugging log by using the <a
href="/docs/all_settings#remote_log">xdebug.remote_log</a> php.ini setting.
I suggest you set its value to something in the <code>/tmp</code> directory
(or your operating system's equivalent). I have it set as follows:
<code>xdebug.remote_log=/tmp/xdebug.log</code>. Make sure that the user that
runs the script (yourself for CLI, or your web server's user ID if you're
debugging through a web server) can write to the file that you have
specified.
</p>

<p>
With the short script prepared, and the remote logging enabled, now step
through your code in the IDE (or do whatever you need to do to reproduce
it). When you are done, add both the script as well as the remote debugging
log to the bug report at <a href='//bugs.xdebug.org'>bugs.xdebug.org</a>.
</p>

<br />

<a name="list"></a>
<h2>Mailinglist</h2>

<p>
Discussions about Xdebug, feature requests etc. can be held on the Xdebug
mailinglist. You can subscribe to it by sending e-mail to <em>ecartis@<span
class="hide">remove-this-first@</span>lists.xdebug.org</em> with subject
<b>subscribe xdebug-general</b>.  Posts to the list (<em>xdebug-general@<span
class="hide">remove-this-first@</span>lists.xdebug.org</em>) are
moderated unless you are subscribed to the list. To unsubscribe send e-mail to
the same address, but then use the subject <b>unsubscribe xdebug-general</b>.
You need to do this from the same e-mail address as from the address you
subscribe with. You can find an archive for the Xdebug General list <a
href="http://xdebug.org/archives/xdebug-general/">here</a> and one for the
closed developers list <a
href="http://xdebug.org/archives/xdebug-dev/">here</a>.
</p>

<br />

<a name="email"></a>
<h2>E-mail</h2>

<p>
If you have a general question about Xdebug, please send an email to
<em>xdebug-general@<span
class="hide">remove-this-first@</span>lists.xdebug.org</em>.  If you like Xdebug
and make use of it, feel free to checkout my <?php url('giftlist', 'wishlist');
?> or make a <a href='/donate.php'>donation</a>.  This improves chances that I
will be continuing developing Xdebug as an open source extension.
</p>
<p>
If you have other questions, feel free to send me an e-mail (but read <a
href="http://catb.org/~esr/faqs/smart-questions.html">this</a> first) to
<em>derick@<span class="hide">remove-this-first@</span>xdebug.org</em>.</p>

<br /><br />

<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
