<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Contributing');
?>

<h1>Contributing</h1>

<a name="git"></a>
<h2>GIT</h2>
<p>Xdebug is hosted in GIT. The source code can be browsed through <a
href='https://github.com/xdebug/xdebug'>github</a> and can be checked out with:
</p>
<pre>
git clone git://github.com/xdebug/xdebug.git
</pre>
<p>
If you think you want to fix a bug or work on a new feature, then you
need to follow the instructions below.
</p>
<a name="setup"></a>
<h2>Initial Set-up</h2>
<ol>
<li>Fork Xdebug on <a href='https://github.com/xdebug/xdebug/fork'>github</a>.</li>
<li>Clone the repository:<br/>
	<code>git clone git@github.com:<i>{your&nbsp;username}</i>/xdebug.git</code><br/>
	for example:<br />
	<code>git clone git@github.com:jamesbond/xdebug.git</code>
</li>
<li>Change into the <code>xdebug</code> repository:<br/>
	<code>cd xdebug</code>.
</li>
<li>Make sure to set your git name and email:<br/>
	<code>git config --get user.name &amp;&amp; git config --get user.email</code><br/>
	If they are not correct, set them to the correct value:<br/>
	<code>git config user.name <i>{your&nbsp;name}</i> &amp;&amp; git config user.email <i>{your&nbsp;email}</i></code><br/>
	for example:<br/>
	<code>git config user.name "Derick Rethans" &amp;&amp; git config user.email "derick@xdebug.org"</code>
</li>
<li>Add the original repository as remote (after removing the old one):<br/>
	<code>git remote add upstream git://github.com/xdebug/xdebug.git &amp;&amp; git fetch upstream</code>
</li>
<li>Add a tracking branch for xdebug 2.5:<br/>
	<code>git checkout --track origin/xdebug_2_5</code>
</li>
</ol>

<a name="uptodate"></a>
<h2>Keeping up-to-date</h2>
<ol>
<li>Change into the <code>xdebug</code> repository (if you haven't done yet):<br/>
	<code>cd xdebug</code>
</li>
<li>Run:<br/><code>git checkout master &amp;&amp; git fetch upstream &amp;&amp; git rebase upstream/master</code></li>
<li>Run:<br/><code>git checkout xdebug_2_5 &amp;&amp; git fetch upstream &amp;&amp; git rebase upstream/xdebug_2_5</code></li>
</ol>

<a name="bugfix"></a>
<h2>Working on a bug fix</h2>
<p>The steps for this are the same as for <a href='#newfeature'>working on new
features</a> except that you make a branch of <b>xdebug_2_5</b> instead of
<b>master</b>.</p>
<ol>
<li>First of all, make sure you're <a href="#uptodate">up-to-date</a>.</li>
<li>Checkout the <code>xdebug_2_5</code> branch:<br/><code>git checkout xdebug_2_5</code>.</li>
<li>Create a feature branch:<br/>
	<code>git checkout -b issue<i>{issue&nbsp;number}</i></code><br/>
	for example:<br/>
	<code>git checkout -b issue681</code><br/>
	If there is no
	<a href='http://bugs.xdebug.org/view_all_bug_page.php'>bug report</a> yet,
	then you need to create one. If you want, you can add a description of the
	feature after the <code>issue681</code> part, for example:
	<code>issue1623-debug-static-properties</code>.</li>
<li>Work on the code, and add one or more tests in the tests directory, with as
	name <code>tests/bug0<i>{issue&nbsp;number}</i>.phpt</code>, for example:
	<code>tests/bug01623.phpt</code>.</li>
<li>Commit it to your local repository: <code>git commit ..</code>, with your main
	commit message's format as <code>Fixed issue #1623: <i>{issue report title}</i></code>.</li>
<li>Repeat the previous two steps as long as you want.</li>
<li>Bring things up-to-date with the original repository, especially important
	if it took some time since you branched:<br/>
	<code>git fetch upstream &amp;&amp; git rebase upstream/xdebug_2_5</code></li>
<li>Push your changes to your remote repository:<br/>
	<code>git push origin <i>{issue&nbsp;number}</i></code><br/>
	for example:<br/>
	<code>git push origin issue681</code></li>
<li>
	<p>Once you're satisfied, generate a pull request, by navigating to your
	repository (<code>https://github.com/<i>{username}</i>/xdebug</code>), select
	the branch you just created (<code>issue681</code>), and then select the "Pull
	Request" button in the upper right. Select the user <code>xdebug</code> as the
	recipient.</p>
	<p>Alternatively you can navigate to
	<code>https://github.com/<i>{username}</i>/xdebug/pull/new/issue{issue&nbsp;number}</code>.</p>
</li>
</ol>

<a name="newfeature"></a>
<h2>Working on a new feature</h2>
<p>The steps for this are the same as for <a href='#bugfix'>fixing bugs</a>
except that you make a branch of <b>master</b> instead of
<b>xdebug_2_5</b>.</p>
<ol>
<li>First of all, make sure you're <a href="#uptodate">up-to-date</a>.</li>
<li>Checkout the <code>master</code> branch:<br/><code>git checkout master</code>.</li>
<li>Create a feature branch:<br/>
	<code>git checkout -b issue<i>{issue&nbsp;number}</i></code><br/>
	for example:<br/>
	<code>git checkout -b issue681</code><br/>
	If there is no
	<a href='http://bugs.xdebug.org/view_all_bug_page.php'>bug report</a> yet,
	then you need to create one. If you want, you can add a description of the
	feature after the <code>issue681</code> part, for example:
	<code>issue1623-debug-static-properties</code>.</li>
<li>Work on the code, and add one or more tests in the tests directory, with as
	name <code>tests/bug0<i>{issue&nbsp;number}</i>.phpt</code>, for example:
	<code>tests/bug01623.phpt</code>.</li>
<li>Commit it to your local repository: <code>git commit ..</code>, with your main
	commit message's format as <code>Fixed issue #1623: <i>{issue report title}</i></code>.</li>
<li>Repeat the previous two steps as long as you want.</li>
<li>Bring things up-to-date with the original repository, especially important
	if it took some time since you branched:<br/>
	<code>git fetch upstream &amp;&amp; git rebase upstream/master</code></li>
<li>Push your changes to your remote repository:<br/>
	<code>git push origin <i>{issue&nbsp;number}</i></code><br/>
	for example:<br/>
	<code>git push origin issue681</code></li>
<li>
	<p>Once you're satisfied, generate a pull request, by navigating to your
	repository (<code>https://github.com/<i>{username}</i>/xdebug</code>), select
	the branch you just created (<code>issue681</code>), and then select the "Pull
	Request" button in the upper right. Select the user <code>xdebug</code> as the
	recipient.</p>
	<p>Alternatively you can navigate to
	<code>https://github.com/<i>{username}</i>/xdebug/pull/new/issue{issue&nbsp;number}</code>.</p>
</li>
</ol>
