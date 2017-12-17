<?php $title = "Xdebug: Contributing"; include "include/header.php"; ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | CONTRIBUTING</span><br />

<?php include "include/menu.php"; ?>

<h2>Contributing</h2>

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
<h3>Initial Set-up</h3>
<ol>
<li>Fork Xdebug on <a href='https://github.com/xdebug/xdebug/fork'>github</a>.</li>
<li>Clone the repository:<br/>
	<tt>git clone git@github.com:<i>{your&nbsp;username}</i>/xdebug.git</tt><br/>
	for example:<br />
	<tt>git clone git@github.com:jamesbond/xdebug.git</tt>
</li>
<li>Change into the <tt>xdebug</tt> repository:<br/>
	<tt>cd xdebug</tt>.
</li>
<li>Make sure to set your git name and email:<br/>
	<tt>git config --get user.name &amp;&amp; git config --get user.email</tt><br/>
	If they are not correct, set them to the correct value:<br/>
	<tt>git config user.name <i>{your&nbsp;name}</i> &amp;&amp; git config user.email <i>{your&nbsp;email}</i></tt><br/>
	for example:<br/>
	<tt>git config user.name "Derick Rethans" &amp;&amp; git config user.email "derick@xdebug.org"</tt>
</li>
<li>Add the original repository as remote (after removing the old one):<br/>
	<tt>git remote add upstream git://github.com/xdebug/xdebug.git &amp;&amp; git fetch upstream</tt>
</li>
<li>Add a tracking branch for xdebug 2.5:<br/>
	<tt>git checkout --track origin/xdebug_2_5</tt>
</li>
</ol>

<a name="uptodate"></a>
<h3>Keeping up-to-date</h3>
<ol>
<li>Change into the <tt>xdebug</tt> repository (if you haven't done yet):<br/>
	<tt>cd xdebug</tt>
</li>
<li>Run:<br/><tt>git checkout master &amp;&amp; git fetch upstream &amp;&amp; git rebase upstream/master</tt></li>
<li>Run:<br/><tt>git checkout xdebug_2_5 &amp;&amp; git fetch upstream &amp;&amp; git rebase upstream/xdebug_2_5</tt></li>
</ol>

<a name="bugfix"></a>
<h3>Working on a bug fix</h3>
<p>The steps for this are the same as for <a href='#newfeature'>working on new
features</a> except that you make a branch of <b>xdebug_2_5</b> instead of
<b>master</b>.</p>
<ol>
<li>First of all, make sure you're <a href="#uptodate">up-to-date</a>.</li>
<li>Checkout the <tt>xdebug_2_5</tt> branch:<br/><tt>git checkout xdebug_2_5</tt>.</li>
<li>Create a feature branch:<br/>
	<tt>git checkout -b issue<i>{issue&nbsp;number}</i></tt><br/>
	for example:<br/>
	<tt>git checkout -b issue681</tt><br/>
	If there is no 
	<a href='http://bugs.xdebug.org/view_all_bug_page.php'>bug report</a> yet,
	then you need to create one. If you want, you can add a description of the
	feature after the <tt>issue681</tt> part, for example:
	<tt>issue1623-debug-static-properties</tt>.</li>
<li>Work on the code, and add one or more tests in the tests directory, with as
	name <tt>tests/bug0<i>{issue&nbsp;number}</i>.phpt</tt>, for example:
	<tt>tests/bug01623.phpt</tt>.</li>
<li>Commit it to your local repository: <tt>git commit ..</tt>, with your main
	commit message's format as <tt>Fixed issue #1623: <i>{issue report title}</i></tt>.</li>
<li>Repeat the previous two steps as long as you want.</li>
<li>Bring things up-to-date with the original repository, especially important
	if it took some time since you branched:<br/>
	<tt>git fetch upstream &amp;&amp; git rebase upstream/xdebug_2_5</tt></li>
<li>Push your changes to your remote repository:<br/>
	<tt>git push origin <i>{issue&nbsp;number}</i></tt><br/>
	for example:<br/>
	<tt>git push origin issue681</tt></li>
<li>
	<p>Once you're satisfied, generate a pull request, by navigating to your
	repository (<tt>https://github.com/<i>{username}</i>/xdebug</tt>), select
	the branch you just created (<tt>issue681</tt>), and then select the "Pull
	Request" button in the upper right. Select the user <tt>xdebug</tt> as the
	recipient.</p>
	<p>Alternatively you can navigate to
	<tt>https://github.com/<i>{username}</i>/xdebug/pull/new/issue{issue&nbsp;number}</tt>.</p>
</li>
</ol>

<a name="newfeature"></a>
<h3>Working on a new feature</h3>
<p>The steps for this are the same as for <a href='#bugfix'>fixing bugs</a>
except that you make a branch of <b>master</b> instead of
<b>xdebug_2_5</b>.</p>
<ol>
<li>First of all, make sure you're <a href="#uptodate">up-to-date</a>.</li>
<li>Checkout the <tt>master</tt> branch:<br/><tt>git checkout master</tt>.</li>
<li>Create a feature branch:<br/>
	<tt>git checkout -b issue<i>{issue&nbsp;number}</i></tt><br/>
	for example:<br/>
	<tt>git checkout -b issue681</tt><br/>
	If there is no 
	<a href='http://bugs.xdebug.org/view_all_bug_page.php'>bug report</a> yet,
	then you need to create one. If you want, you can add a description of the
	feature after the <tt>issue681</tt> part, for example:
	<tt>issue1623-debug-static-properties</tt>.</li>
<li>Work on the code, and add one or more tests in the tests directory, with as
	name <tt>tests/bug0<i>{issue&nbsp;number}</i>.phpt</tt>, for example:
	<tt>tests/bug01623.phpt</tt>.</li>
<li>Commit it to your local repository: <tt>git commit ..</tt>, with your main
	commit message's format as <tt>Fixed issue #1623: <i>{issue report title}</i></tt>.</li>
<li>Repeat the previous two steps as long as you want.</li>
<li>Bring things up-to-date with the original repository, especially important
	if it took some time since you branched:<br/>
	<tt>git fetch upstream &amp;&amp; git rebase upstream/master</tt></li>
<li>Push your changes to your remote repository:<br/>
	<tt>git push origin <i>{issue&nbsp;number}</i></tt><br/>
	for example:<br/>
	<tt>git push origin issue681</tt></li>
<li>
	<p>Once you're satisfied, generate a pull request, by navigating to your
	repository (<tt>https://github.com/<i>{username}</i>/xdebug</tt>), select
	the branch you just created (<tt>issue681</tt>), and then select the "Pull
	Request" button in the upper right. Select the user <tt>xdebug</tt> as the
	recipient.</p>
	<p>Alternatively you can navigate to
	<tt>https://github.com/<i>{username}</i>/xdebug/pull/new/issue{issue&nbsp;number}</tt>.</p>
</li>
</ol>
<!-- MAIN FEATURE END -->

			</span></td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
