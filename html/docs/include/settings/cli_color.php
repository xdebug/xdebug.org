<p>If this setting is 1, Xdebug will color var_dumps and stack traces
		output when in CLI mode and when the output is a tty. On Windows, the
		<a href="http://adoxa.110mb.com/ansicon/">ANSICON</a> tool needs to be
		installed.</p>
		<p>If the setting is 2, then Xdebug will always color var_dumps and stack
		trace, no matter whether it's connected to a tty or whether ANSICON is
		installed. In this case, you might end up seeing escape codes.</p>
		<p>See <a href="http://drck.me/clicolor-9cr">this article</a> for some
		more information.</p>