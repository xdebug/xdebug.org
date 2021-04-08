<?php
XdebugDotOrg\Controller\TemplateController::setTitle('Xdebug: Updates');

function bug(int $nr) : string {
	return "bug <a href='https://bugs.xdebug.org/bug_view_page.php?bug_id=".
		sprintf("%08d", $nr). "' target='_blank'>#$nr</a>";
}

function issue(int $nr) : string {
	return "issue <a href='https://bugs.xdebug.org/bug_view_page.php?bug_id=".
		sprintf("%08d", $nr). "' target='_blank'>#$nr</a>";
}
?>

<?php
/*
:'<,'>s/bug \#\(\d\+\)/<?= bug(\1); ?>/
:'<,'>s/issue \#\(\d\+\)/<?= bug(\1); ?>/
*/
?>
<h1>Updates</h1>

<span class='quote'>
<dl>
<dt><a name='x_3_0_4'></a>[2021-04-08] &mdash; Xdebug 3.0.4</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1802); ?>: Improve xdebug.org home page</dd>
<dd>Fixed <?= bug(1944); ?>: tracing is started without trigger, when profiler is also enabled</dd>
<dd>Fixed <?= bug(1947); ?>: xdebug_info() settings section does not show the modes that are overridden by XDEBUG_MODE</dd>
<dd>Fixed <?= bug(1950); ?>: Assignment trace with ASSIGN_OBJ_REF crashes</dd>
<dd>Fixed <?= bug(1954); ?>: Calling xdebug_start_trace without mode including tracing results in a fatal error</dd>

<hr/>

<dt><a name='x_3_0_3'></a>[2021-02-22] &mdash; Xdebug 3.0.3</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1930); ?>: No local variables with trigger and xdebug_break()</dd>
<dd>Fixed <?= bug(1931); ?>: xdebug_info() output misses configuration settings if phpinfo() has been called</dd>
<dd>Fixed <?= bug(1932); ?>: One line in multi-line string concatenation is not covered</dd>
<dd>Fixed <?= bug(1940); ?>: Wrong type used for showing GC Stats reports</dd>

<hr/>

<dt><a name='x_3_0_2'></a>[2021-01-04] &mdash; Xdebug 3.0.2</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1907); ?>: Empty exception message when setting the $message property to a stringable object</dd>
<dd>Fixed <?= bug(1910); ?>: Code coverage misses constructor property promotion code</dd>
<dd>Fixed <?= bug(1914); ?>: Compillation failure on OpenBSD</dd>
<dd>Fixed <?= bug(1915); ?>: Debugger should only start with XDEBUG_SESSION and not XDEBUG_PROFILE</dd>
<dd>Fixed <?= bug(1918); ?>: Warn if PHP's Garbage Collection is disabled in gc_stats mode</dd>
<dd>Fixed <?= bug(1919); ?>: Crash when enabling filter without the right mode active</dd>
<dd>Fixed <?= bug(1921); ?>: Xdebug does not start step debugging if start_with_request=trigger</dd>
<dd>Fixed <?= bug(1922); ?>: Code coverage misses array assignment lines</dd>
<dd>Fixed <?= bug(1924); ?>: Deprecated INI settings displayed in phpinfo()</dd>
<dd>Fixed <?= bug(1925); ?>: xdebug.start_with_request and start_upon_error display inconsistent values</dd>
<dd>Fixed <?= bug(1926); ?>: Add Xdebug mode's source to xdebug_info() output</dd>
<dd>Fixed <?= bug(1927); ?>: Crash when calling xdebug_stop_trace without a trace in progress</dd>
<dd>Fixed <?= bug(1928); ?>: xdebug_stop_gcstats() can also return false</dd>

<hr/>

<dt><a name='x_3_0_1'></a>[2020-12-04] &mdash; Xdebug 3.0.1</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1893); ?>: Crash with ext-fiber and xdebug.mode=coverage</dd>
<dd>Fixed <?= bug(1896); ?>: Segfault with closures that are not created from user code</dd>
<dd>Fixed <?= bug(1897); ?>: Crash when removing a breakpoint</dd>
<dd>Fixed <?= bug(1900); ?>: Update README and add run-xdebug-tests.php to package</dd>
<dd>Fixed <?= bug(1901); ?>: Stack traces are shown (with a broken time) when Xdebug's mode includes 'debug' but not 'develop' or 'trace'</dd>
<dd>Fixed <?= bug(1902); ?>: Compillation failure on AIX</dd>
<dd>Fixed <?= bug(1903); ?>: Constants should always be available, regardless of which mode Xdebug is in</dd>
<dd>Fixed <?= bug(1904); ?>: Profile and trace files using %t or %u do not get the right names</dd>
<dd>Fixed <?= bug(1905); ?>: Debugger does not disable request timeouts</dd>

<hr/>


<dt><a name='x_3_0_0'></a>[2020-11-25] &mdash; Xdebug 3.0.0</dt>

<dd>
<p>
Xdebug 3 includes major changes in functionality compared to Xdebug 2. The
primary way how you turn on functionality is through the new xdebug.mode PHP
configuration setting. This made it possible to massively increase performance
in many of Xdebug's sub systems as Xdebug is now much more conservative in
which hooks are enabled.
</p>
<p>
Configuration changes, massive performance improvements, and PHP 8 support are
the primary features in Xdebug 3, but there is much more. The
<a href="https://xdebug.org/docs/upgrade_guide">Upgrade Guide</a>
lists the changes in great detail, please read it.
</p>
</dd>

<dd><h3>New features</h3></dd>

<dd>Implemented <?= issue(1762); ?>: Introduce feature modes</dd>
<dd>Implemented <?= issue(1793); ?>: Add xdebug.start_upon_error setting to cover the removed xdebug.remote_mode=jit feature.</dd>
<dd>Implemented <?= issue(1797); ?>: Implement generic logging</dd>
<dd>Implemented <?= issue(1801); ?>: Rename mode 'display' to mode 'develop'</dd>
<dd>Implemented <?= issue(1831); ?>: Add diagnostics function xdebug_info()</dd>
<dd>Implemented <?= issue(1833); ?>: Add links to documentation in diagnostic log</dd>
<dd>Implemented <?= issue(1837); ?>: Support for associative variadic variable names (PHP 8)</dd>
<dd>Implemented <?= issue(1841); ?>: Add support for PHP 8 'match' keyword</dd>

<dd><h3>Improvements</h3></dd>

<dd>Implemented <?= issue(1680); ?>: Update var dumping routines to include relevant information for interned strings and immutable arrays</dd>
<dd>Implemented <?= issue(1712); ?>: Add unit to profiler data types</dd>
<dd>Implemented <?= issue(1743); ?>: Figuring out whether a call is a closure uses string comparisions instead of checking the ACC flag (Benjamin Eberlei)</dd>
<dd>Implemented <?= issue(1752); ?>: Use a stack pool to manage stack entries instead of allocating and deallocating entries</dd>
<dd>Implemented <?= issue(1755); ?>: Overload pcntl_fork() to prevent performance degradation by calling xdebug_get_pid often (Carlos Granados)</dd>
<dd>Implemented <?= issue(1781); ?>: Include 'Xdebug' in max nesting level error message</dd>
<dd>Implemented <?= issue(1783); ?>: Stacktrace needs vertical scrolling on small screens (Tobias Tom)</dd>
<dd>Implemented <?= issue(1789); ?>: Provide PHP stubs for Xdebug's functions</dd>
<dd>Implemented <?= issue(1807); ?>: Document Xdebug installation with yum and apt</dd>
<dd>Implemented <?= issue(1813); ?>: Make sure that the xdebug_init_*_globals don't do more than they need to, and that init is only done when xdebug.mode != off</dd>
<dd>Implemented <?= issue(1817); ?>: Switch filename storage from char*/size_t to zend_string*</dd>
<dd>Implemented <?= issue(1818); ?>: Switch variable storage from char*/size_t to zend_string*</dd>
<dd>Implemented <?= issue(1820); ?>: Increase time tracing precision (Michael Voříšek)</dd>
<dd>Implemented <?= issue(1824); ?>: Allow Xdebug's mode to be set through an environment variable</dd>
<dd>Implemented <?= issue(1825); ?>: Improve profiler performance by not calling fflush after every function (Michael Voříšek)</dd>
<dd>Implemented <?= issue(1826); ?>: Reduce profiler memory allocation and call overhead</dd>
<dd>Implemented <?= issue(1829); ?>: Switch to 10ns profiler resolution (Michael Voříšek)</dd>
<dd>Implemented <?= issue(1832); ?>: If connect back host can not be contacted, fallback to remote_host/port</dd>
<dd>Implemented <?= issue(1858); ?>: Only open/close log if there is an actual message to log</dd>
<dd>Implemented <?= issue(1860); ?>: Allow xdebug.cloud_id to be set through an environment variable</dd>
<dd>Implemented <?= issue(1814); ?>: Don't obtain the current time when it's not needed</dd>
<dd>Implemented <?= issue(1835); ?>: Add current trace and profile file name, to diagnostic page</dd>
<dd>Implemented <?= issue(1885); ?>: Change xdebug.start_with_ settings to PHP_INI_SYSTEM|PHP_INI_PERDIR</dd>
<dd>Implemented <?= issue(1889); ?>: max_nesting_level should only trigger in "develop" mode</dd>

<dd><h3>Removed features</h3></dd>

<dd>Implemented <?= issue(1795); ?>: Deprecate PHP 7.1 support</dd>
<dd>Implemented <?= issue(1786); ?>: Remove idekey value fallback to USER/USERNAME environment variable</dd>
<dd>Implemented <?= issue(1809); ?>: Remove "overload_var_dump" setting</dd>
<dd>Implemented <?= issue(1810); ?>: Remove collect_vars and xdebug_get_declared_vars()</dd>
<dd>Implemented <?= issue(1812); ?>: Remove show_mem_delta setting</dd>
<dd>Implemented <?= issue(1838); ?>: Remove collect_params setting, and always default it to "4"</dd>
<dd>Implemented <?= issue(1847); ?>: Remove xdebug.remote_cookie_expire_time setting</dd>
<dd>Implemented <?= issue(1016); ?>: Removed support for pause-execution (introduced in beta1)</dd>
<dd>Implemented <?= issue(1868); ?>: Remove xdebug_disable and xdebug_enabled</dd>
<dd>Implemented <?= issue(1883); ?>: Function xdebug_is_enabled has been removed</dd>

<dd><h3>Changes</h3></dd>

<dd>Implemented <?= issue(1378); ?>: Unfortunate coupling of default_enable=1 and remote_mode=jit</dd>
<dd>Implemented <?= issue(1773); ?>: Replace all xdebug.*_output_dir settings with xdebug.output_dir</dd>
<dd>Implemented <?= issue(1785); ?>: Replace xdebug.remote_mode and xdebug.auto_trace with generic "start-with-request" setting</dd>
<dd>Implemented <?= issue(1791); ?>: Replace xdebug.*trigger*, xdebug.*trigger_value*, with xdebug.start_with_request=trigger and xdebug.trigger_value</dd>
<dd>Implemented <?= issue(1792); ?>: Change start_with_request=always/never to start_with_request=yes/no</dd>
<dd>Implemented <?= issue(1794); ?>: Replace the filter's blacklist/whitelist with exclude/include</dd>
<dd>Implemented <?= issue(1811); ?>: Remove xdebug.collect_includes setting and always include them</dd>
<dd>Implemented <?= issue(1843); ?>: Adjust XDEBUG_CONFIG checks, and document what can be set through it</dd>
<dd>Implemented <?= issue(1844); ?>: Add deprecation warning for removed and renamed configuration setting names</dd>
<dd>Implemented <?= issue(1845); ?>: Rename xdebug.remote_{host,port} to xdebug.client_{host,port}</dd>
<dd>Implemented <?= issue(1846); ?>: Rename setting xdebug.remote_timeout to xdebug.connect_timeout_ms</dd>
<dd>Implemented <?= issue(1848); ?>: Change default Xdebug port from 9000 to 9003</dd>
<dd>Implemented <?= issue(1850); ?>: Change array variable output in tracing to use modern [] syntax</dd>
<dd>Implemented <?= issue(1856); ?>: Rename xdebug.remote_connect_back to xdebug.discover_client_host</dd>
<dd>Implemented <?= issue(1857); ?>: Rename xdebug.remote_addr_header to xdebug.client_discovery_header</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1608); ?>: XDEBUG_CONFIG env var make sessions automatically START ever (at least send the XDEBUG_SESSION cookie)</dd>
<dd>Fixed <?= bug(1726); ?>: Memory leaks spotted in various places in typical error code paths</dd>
<dd>Fixed <?= bug(1757); ?>: Pause-execution feature degrades performance</dd>
<dd>Fixed <?= bug(1864); ?>: Incompatibility with PCS and protobuf extensions</dd>
<dd>Fixed <?= bug(1870); ?>: XDEBUG_SESSION_START URL parameter does not override XDEBUG_SESSION cookie</dd>
<dd>Fixed <?= bug(1871); ?>: The "idekey" is not set when debugging is started through XDEBUG_SESSION cookie</dd>
<dd>Fixed <?= bug(1873); ?>: xdebug_info() segfaults if the diagnostic buffer is empty</dd>
<dd>Fixed <?= bug(1874); ?>: Incompatibility with protobuf extension</dd>
<dd>Fixed <?= bug(1875); ?>: Overflow with large amounts of elements for variadics</dd>
<dd>Fixed <?= bug(1878); ?>: Compilation failure: Socket options TCP_KEEPCNT and TCP_KEEPINTVL do not exist on Solaris 10 Sparc</dd>
<dd>Fixed <?= bug(1880); ?>: Bundled unit test tests/debugger/bug00886.phar misses to load phar extension</dd>
<dd>Fixed <?= bug(1887); ?>: Crash bug with xdebug_call_class and xdebug_call_file</dd>
<dd>Fixed <?= bug(1756); ?>: Php process won't exit after running connected to a client</dd>
<dd>Fixed <?= bug(1823); ?>: Profiler generates negative data for memory usage</dd>
<dd>Fixed <?= bug(1834); ?>: Return type must be bool in overloaded set_time_limit</dd>
<dd>Fixed <?= bug(1888); ?>: Make headers sticky in xdebug_info() output</dd>

<dd><h3>Documentation</h3></dd>

<dd>Fixed <?= bug(1865); ?>: Document XDEBUG_TRIGGER environment variable</dd>
<dd>Fixed <?= bug(1866); ?>: Document comma separated xdebug.mode values</dd>
<dd>Fixed <?= bug(1884); ?>: Document where Xdebug's settings can be set</dd>
<dd>Fixed <?= bug(1892); ?>: Document changed/removed ini settings in the upgrade guide with the links provided</dd>

<hr/>


<dt><a name='x_3_0_0RC1'></a>[2020-11-16] &mdash; Xdebug 3.0.0RC1</dt>

<dd>
<p class="warning">This is a <strong>BETA</strong> release, and not ready for production
environments. It adds support for PHP 8.0, and drops support for PHP 7.1.</p>

<p>Xdebug 3 has many changes. Please read the <a
href="https://3.xdebug.org/docs/upgrade_guide">Upgrade Guide</a>.

<p><a href="https://3.xdebug.org/docs">Xdebug 3 documentation</a> is available
on a sub-domain.</p>
</dd>

<dd><h3>Improvements</h3></dd>

<dd>Implemented <?= issue(1814); ?>: Don't obtain the current time when it's not needed</dd>
<dd>Implemented <?= issue(1885); ?>: Change xdebug.start_with_ settings to PHP_INI_SYSTEM|PHP_INI_PERDIR</dd>

<dd><h3>Removed features</h3></dd>

<dd>Implemented <?= issue(1016); ?>: Removed support for pause-execution (introduced in beta1)</dd>
<dd>Implemented <?= issue(1868); ?>: Remove xdebug_disable and xdebug_enabled</dd>
<dd>Implemented <?= issue(1883); ?>: Function xdebug_is_enabled has been removed</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1608); ?>: XDEBUG_CONFIG env var make sessions automatically START ever (at least send the XDEBUG_SESSION cookie)</dd>
<dd>Fixed <?= bug(1757); ?>: Pause-execution feature degrades performance</dd>
<dd>Fixed <?= bug(1864); ?>: Incompatibility with PCS and protobuf extensions</dd>
<dd>Fixed <?= bug(1870); ?>: XDEBUG_SESSION_START URL parameter does not override XDEBUG_SESSION cookie</dd>
<dd>Fixed <?= bug(1871); ?>: The "idekey" is not set when debugging is started through XDEBUG_SESSION cookie</dd>
<dd>Fixed <?= bug(1873); ?>: xdebug_info() segfaults if the diagnostic buffer is empty</dd>
<dd>Fixed <?= bug(1874); ?>: Incompatibility with protobuf extension</dd>
<dd>Fixed <?= bug(1875); ?>: Overflow with large amounts of elements for variadics</dd>
<dd>Fixed <?= bug(1878); ?>: Compilation failure: Socket options TCP_KEEPCNT and TCP_KEEPINTVL do not exist on Solaris 10 Sparc</dd>
<dd>Fixed <?= bug(1880); ?>: Bundled unit test tests/debugger/bug00886.phar misses to load phar extension</dd>
<dd>Fixed <?= bug(1887); ?>: Crash bug with xdebug_call_class and xdebug_call_file</dd>

<dd><h3>Documentation</h3></dd>

<dd>Fixed <?= issue(1865); ?>: Document XDEBUG_TRIGGER environment variable</dd>
<dd>Fixed <?= issue(1866); ?>: Document comma separated xdebug.mode values</dd>
<dd>Fixed <?= issue(1884); ?>: Document where Xdebug's settings can be set</dd>

<hr/>

<dt><a name='x_3_0_0beta1'></a>[2020-10-14] &mdash; Xdebug 3.0.0beta1</dt>

<dd>
<p class="warning">This is a <strong>BETA</strong> release, and not ready for production
environments. It adds support for PHP 8.0, and drops support for PHP 7.1.</p>

<p>Xdebug 3 has many changes. Please read the <a
href="https://3.xdebug.org/docs/upgrade_guide">Upgrade Guide</a>.

<p><a href="https://3.xdebug.org/docs">Xdebug 3 documentation</a> is available
on a sub-domain.</p>
</dd>

<dd><h3>New features</h3></dd>

<dd>Implemented <?= issue(1762); ?>: Introduce feature modes</dd>
<dd>Implemented <?= issue(1793); ?>: Add xdebug.start_upon_error setting to cover the removed xdebug.remote_mode=jit feature.</dd>
<dd>Implemented <?= issue(1797); ?>: Implement generic logging</dd>
<dd>Implemented <?= issue(1801); ?>: Rename mode 'display' to mode 'develop'</dd>
<dd>Implemented <?= issue(1831); ?>: Add diagnostics function xdebug_info()</dd>
<dd>Implemented <?= issue(1833); ?>: Add links to documentation in diagnostic log</dd>
<dd>Implemented <?= issue(1837); ?>: Support for associative variadic variable names (PHP 8)</dd>
<dd>Implemented <?= issue(1841); ?>: Add support for PHP 8 'match' keyword</dd>

<dd><h3>Removed features</h3></dd>

<dd>Implemented <?= issue(1795); ?>: Deprecate PHP 7.1 support</dd>
<dd>Implemented <?= issue(1786); ?>: Remove idekey value fallback to USER/USERNAME environment variable</dd>
<dd>Implemented <?= issue(1809); ?>: Remove "overload_var_dump" setting</dd>
<dd>Implemented <?= issue(1810); ?>: Remove collect_vars and xdebug_get_declared_vars()</dd>
<dd>Implemented <?= issue(1812); ?>: Remove show_mem_delta setting</dd>
<dd>Implemented <?= issue(1838); ?>: Remove collect_params setting, and always default it to "4"</dd>
<dd>Implemented <?= issue(1847); ?>: Remove xdebug.remote_cookie_expire_time setting</dd>

<dd><h3>Changes</h3></dd>

<dd>Implemented <?= issue(1378); ?>: Unfortunate coupling of default_enable=1 and remote_mode=jit</dd>
<dd>Implemented <?= issue(1773); ?>: Replace all xdebug.*_output_dir settings with xdebug.output_dir</dd>
<dd>Implemented <?= issue(1785); ?>: Replace xdebug.remote_mode and xdebug.auto_trace with generic "start-with-request" setting</dd>
<dd>Implemented <?= issue(1791); ?>: Replace xdebug.*trigger*, xdebug.*trigger_value*, with xdebug.start_with_request=trigger and xdebug.trigger_value</dd>
<dd>Implemented <?= issue(1792); ?>: Change start_with_request=always/never to start_with_request=yes/no</dd>
<dd>Implemented <?= issue(1794); ?>: Replace the filter's blacklist/whitelist with exclude/include</dd>
<dd>Implemented <?= issue(1811); ?>: Remove xdebug.collect_includes setting and always include them</dd>
<dd>Implemented <?= issue(1844); ?>: Add deprecation warning for removed and renamed configuration setting names</dd>
<dd>Implemented <?= issue(1845); ?>: Rename xdebug.remote_{host,port} to xdebug.client_{host,port}</dd>
<dd>Implemented <?= issue(1846); ?>: Rename setting xdebug.remote_timeout to xdebug.connect_timeout_ms</dd>
<dd>Implemented <?= issue(1848); ?>: Change default Xdebug port from 9000 to 9003</dd>
<dd>Implemented <?= issue(1850); ?>: Change array variable output in tracing to use modern [] syntax</dd>
<dd>Implemented <?= issue(1856); ?>: Rename xdebug.remote_connect_back to xdebug.discover_client_host</dd>
<dd>Implemented <?= issue(1857); ?>: Rename xdebug.remote_addr_header to xdebug.client_discovery_header</dd>

<dd><h3>Improvements</h3></dd>

<dd>Implemented <?= issue(1016); ?>: Support for pause-execution (Robert Lu)</dd>
<dd>Implemented <?= issue(1680); ?>: Update var dumping routines to include relevant information for interned strings and immutable arrays</dd>
<dd>Implemented <?= issue(1712); ?>: Add unit to profiler data types</dd>
<dd>Implemented <?= issue(1743); ?>: Figuring out whether a call is a closure uses string comparisions instead of checking the ACC flag (Benjamin Eberlei)</dd>
<dd>Implemented <?= issue(1752); ?>: Use a stack pool to manage stack entries instead of allocating and deallocating entries</dd>
<dd>Implemented <?= issue(1755); ?>: Overload pcntl_fork() to prevent performance degradation by calling xdebug_get_pid often (Carlos Granados)</dd>
<dd>Implemented <?= issue(1781); ?>: Include 'Xdebug' in max nesting level error message</dd>
<dd>Implemented <?= issue(1783); ?>: Stacktrace needs vertical scrolling on small screens (Tobias Tom)</dd>
<dd>Implemented <?= issue(1789); ?>: Provide PHP stubs for Xdebug's functions</dd>
<dd>Implemented <?= issue(1807); ?>: Document Xdebug installation with yum and apt</dd>
<dd>Implemented <?= issue(1813); ?>: Make sure that the xdebug_init_*_globals don't do more than they need to, and that init is only done when xdebug.mode != off</dd>
<dd>Implemented <?= issue(1817); ?>: Switch filename storage from char*/size_t to zend_string*</dd>
<dd>Implemented <?= issue(1818); ?>: Switch variable storage from char*/size_t to zend_string*</dd>
<dd>Implemented <?= issue(1820); ?>: Increase time tracing precision (Michael Voříšek)</dd>
<dd>Implemented <?= issue(1824); ?>: Allow Xdebug's mode to be set through an environment variable</dd>
<dd>Implemented <?= issue(1825); ?>: Improve profiler performance by not calling fflush after every function (Michael Voříšek)</dd>
<dd>Implemented <?= issue(1826); ?>: Reduce profiler memory allocation and call overhead</dd>
<dd>Implemented <?= issue(1829); ?>: Switch to 10ns profiler resolution (Michael Voříšek)</dd>
<dd>Implemented <?= issue(1832); ?>: If connect back host can not be contacted, fallback to remote_host/port</dd>
<dd>Implemented <?= issue(1858); ?>: Only open/close log if there is an actual message to log</dd>
<dd>Implemented <?= issue(1860); ?>: Allow xdebug.cloud_id to be set through an environment variable</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1756); ?>: Php process won't exit after running connected to a client</dd>
<dd>Fixed <?= bug(1823); ?>: Profiler generates negative data for memory usage</dd>
<dd>Fixed <?= bug(1834); ?>: Return type must be bool in overloaded set_time_limit</dd>

<hr/>

<dt><a name='x_2_9_8'></a>[2020-09-28] &mdash; Xdebug 2.9.8</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1851); ?>: Paths are not counted as coveraged with loops calling function</dd>
<dd>Fixed <?= bug(1855); ?>: Build issues on FreeBSD</dd>


<dt><a name='x_2_9_7'></a>[2020-09-16] &mdash; Xdebug 2.9.7</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1839); ?>: Add keepalive options to debugging socket</dd>


<dt><a name='x_2_9_6'></a>[2020-05-29] &mdash; Xdebug 2.9.6</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1782); ?>: Cookie <code>XDEBUG_SESSION</code> will be soon rejected because it has the “sameSite” attribute set to none</dd>
<dd>Fixed <?= bug(1787); ?>: Branch coverage data does not always follow the lines/functions format</dd>
<dd>Fixed <?= bug(1790); ?>: Segfault in var_dump() or while debugging with protobuf extension</dd>


<dt><a name='x_2_9_5'></a>[2020-04-25] &mdash; Xdebug 2.9.5</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1772); ?>: Crash with exception thrown inside a destructor</dd>
<dd>Fixed <?= bug(1775); ?>: Segfault when another extension compiles a PHP file during RINIT</dd>
<dd>Fixed <?= bug(1779); ?>: Nested multi-line built-in function in namespace are not covered</dd>


<dt><a name='x_2_9_4'></a>[2020-03-23] &mdash; Xdebug 2.9.4</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1763); ?>: Crash while setting opcode overrides in ZTS mode.</dd>
<dd>Fixed <?= bug(1766); ?>: Using the DBGp detach command disables remote debugging for the whole process.</dd>


<dt><a name='x_2_9_3'></a>[2020-03-13] &mdash; Xdebug 2.9.3</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1753); ?>: Resolved breakpoints use information from wrong files</dd>
<dd>Fixed <?= bug(1758); ?>: Xdebug changes error_get_last results inside a try catch</dd>
<dd>Fixed <?= bug(1759); ?>: User registered opcode handlers should call ones already set by other extensions</dd>


<dt><a name='x_2_9_2'></a>[2020-01-31] &mdash; Xdebug 2.9.2</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1735); ?>: DBGp eval warning promoted to Exception can cause out-of-sync responses</dd>
<dd>Fixed <?= bug(1736); ?>: Segmentation fault when other extensions run PHP in RINIT</dd>
<dd>Fixed <?= bug(1739); ?>: Tracing footer not written</dd>


<dt><a name='x_2_9_1'></a>[2020-01-16] &mdash; Xdebug 2.9.1</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1721); ?>: Header may not contain NUL bytes in Unknown on line 0</dd>
<dd>Fixed <?= bug(1727); ?>: Debugger stops more often than expected due to resolving breakpoints</dd>
<dd>Fixed <?= bug(1728); ?>: INIT_STATIC_METHOD_CALL is not overloaded</dd>
<dd>Fixed <?= bug(1731); ?>: var_dump with DateTime does not output properties</dd>
<dd>Fixed <?= bug(1733); ?>: SEND_VAR_NO_REF_EX opcode, used for require(), is not overloaded</dd>
<dd>Fixed <?= bug(1734); ?>: Segfault with DBGp "source" with a out-of-range start line number</dd>


<dt><a name='x_2_9_0'></a>[2019-12-09] &mdash; Xdebug 2.9.0</dt>

<dd><h3>Improvements</h3></dd>

<dd>Fixed <?= bug(1723); ?>: Class/function pre-analysis for code coverage speed improvements</dd>

<dd><h3>Removed Features</h3></dd>

<dd>Fixed <?= bug(1301); ?>: Removed aggregated profiler feature</dd>
<dd>Fixed <?= bug(1720); ?>: Remove superfluous xdebug.remote_handler setting</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1722); ?>: Build warning issues on FreeBSD</dd>
<dd>Fixed <?= bug(1724); ?>: Missing property types and uninitialised values in variable dumping routines</dd>


<dt><a name='x_2_8_1'></a>[2019-12-02] &mdash; Xdebug 2.8.1</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1717); ?>: Code coverage turned slow after update from 2.7.2 to 2.8.0</dd>


<dt><a name='x_2_8_0'></a>[2019-10-31] &mdash; Xdebug 2.8.0</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1664); ?>: Segfault with garbage collection and complex function arguments</dd>
<dd>Fixed <?= bug(1699); ?>: Crash during debugging Phalcon project</dd>
<dd>Fixed <?= bug(1705); ?>: Crash while debugging with ionCube being used</dd>
<dd>Fixed <?= bug(1708); ?>: Crash on evaluating object with properties</dd>
<dd>Fixed <?= bug(1709); ?>: Wrong data type breaks tests on Big Endian build</dd>
<dd>Fixed <?= bug(1713); ?>: INIT_FCALL is not overloaded in code coverage</dd>


<dt><a name='x_2_8_0beta2'></a>[2019-08-26] &mdash; Xdebug 2.8.0beta2</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1540); ?>: Code coverage should not run when turned off in php.ini</dd>
<dd>Fixed <?= bug(1573); ?>: Using an exception_handler creates an extra broken profiler file</dd>
<dd>Fixed <?= bug(1589); ?>: function names used in auto_prepend_file missing from profile file</dd>
<dd>Fixed <?= bug(1613); ?>: Wrong name displayed for Recoverable fatal error</dd>
<dd>Fixed <?= bug(1652); ?>: Problems with detach in debugger init stage</dd>
<dd>Fixed <?= bug(1676); ?>: Xdebug doesn't write trace footer for shutdown functions</dd>
<dd>Fixed <?= bug(1689); ?>: Traces show return values and exit information for functions without entry information</dd>
<dd>Fixed <?= bug(1691); ?>: Code Coverage misses fluent interface function call</dd>
<dd>Fixed <?= bug(1698); ?>: Switch PHP 7.4 Windows builds back to VS17</dd>
<dd>Fixed <?= bug(1700); ?>: Xdebug abuses possibilty immutable class flags</dd>


<dt><a name='x_2_8_0beta1'></a>[2019-07-25] &mdash; Xdebug 2.8.0beta1</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1679); ?>: Code Coverage misses static property as function argument</dd>
<dd>Fixed <?= bug(1682); ?>: Invalid NULL byte in debugger XML with anonymous classes</dd>
<dd>Fixed <?= bug(1683); ?>: Xdebug does not compile due to changes to ASSIGN_ADD and friends operations in PHP 7.4alpha3</dd>
<dd>Fixed <?= bug(1687); ?>: Use appropriate process ID for logging and "right process" tracking</dd>
<dd>Fixed <?= bug(1688); ?>: Improve performance by using getpid() only when step debugger is active</dd>


<dt><a name='x_2_8_0alpha1'></a>[2019-06-28] &mdash; Xdebug 2.8.0alpha1</dt>

<dd><h3>Added features</h3></dd>

<dd>Implemented <?= issue(1599); ?>: Add support for PHP 7.4</dd>

<dd><h3>Improvements</h3></dd>

<dd>Implemented <?= issue(1388); ?>: Support 'resolved' flag for breakpoints</dd>
<dd>Implemented <?= issue(1664); ?>: Run breakpoint resolver when after a new breakpoint is added as well</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1660); ?>: Return breakpoints for methods don't break immediately</dd>

<dd><h3>Removed features</h3></dd>

<dd>Fixed <?= bug(1666); ?>: Remove xdebug.extended_info setting</dd>


<dt><a name='x_2_7_2'></a>[2019-05-06] &mdash; Xdebug 2.7.2</dt>

<dd><h3>Fixed Bugs</h3></dd>

<dd>Fixed <?= bug(1488); ?>: Rewrite DBGp 'property_set' to always use eval</dd>
<dd>Fixed <?= bug(1586); ?>: error_reporting()'s return value is incorrect during debugger's 'eval' command</dd>
<dd>Fixed <?= bug(1615); ?>: Turn off Zend OPcache when remote debugger is turned on</dd>
<dd>Fixed <?= bug(1656); ?>: remote_connect_back alters header if multiple values are present</dd>
<dd>Fixed <?= bug(1662); ?>: __debugInfo should not be used for user-defined classes</dd>


<dt><a name='x_2_7_1'></a>[2019-04-05] &mdash; Xdebug 2.7.1</dt>

<dd><h3>Fixed Bugs</h3></dd>

<dd>Fixed <?= bug(1646); ?>: Missing newline in error message</dd>
<dd>Fixed <?= bug(1647); ?>: Memory corruption when a conditional breakpoint is used</dd>
<dd>Fixed <?= bug(1641); ?>: Perfomance degradation with getpid syscall (Kees Hoekzema)</dd>


<dt><a name='x_2_7_0'></a>[2019-03-06] &mdash; Xdebug 2.7.0</dt>

<dd><h3>Fixed Bugs</h3></dd>

<dd>Fixed <?= bug(1520); ?>: Xdebug does not handle variables and properties with "-" in their name</dd>
<dd>Fixed <?= bug(1577); ?>: Code coverage path analysis with chained catch fails in PHP 7.3</dd>
<dd>Fixed <?= bug(1639); ?>: Compile warning/error on GCC 8 or Clang due to "break intentionally missing"</dd>
<dd>Fixed <?= bug(1642); ?>: Debugger gives: "Warning: Header may not contain NUL bytes"</dd>


<dt><a name='x_2_7_0RC2'></a>[2019-02-15] &mdash; Xdebug 2.7.0RC2</dt>

<dd><h3>Fixed Bugs</h3></dd>

<dd>Fixed <?= bug(1551); ?>: Property with value null is not represented well</dd>
<dd>Fixed <?= bug(1621); ?>: Xdebug fails to compile cleanly on 32-bit platforms</dd>
<dd>Fixed <?= bug(1625); ?>: Work around ABI conflicts in PHP 7.3.0/PHP 7.3.1</dd>
<dd>Fixed <?= bug(1628); ?>: The PHP function name being constructed to record when GC Collection runs, is not freed</dd>
<dd>Fixed <?= bug(1629); ?>: SOAP Client/Server detection code does not handle inherited classes</dd>


<dt><a name='x_2_7_0rc1'></a>[2019-02-01] &mdash; Xdebug 2.7.0rc1</dt>

<dd><h3>Fixed Bugs</h3></dd>

<dd>Fixed <?= bug(1571); ?>: File/line information is not shown for closures in namespaces.</dd>
<dd>Fixed <?= bug(1578); ?>: Compile error due to redefinition of "zif_handler" with old GCCs.</dd>
<dd>Fixed <?= bug(1583); ?>: Xdebug crashes when OPcache's compact literals optimisation is on.</dd>
<dd>Fixed <?= bug(1598); ?>: Make path/branch coverage work with OPcache loaded for PHP 7.3 and later.</dd>
<dd>Fixed <?= bug(1620); ?>: Division by zero when GC Stats Collection runs with memory manager disabled.</dd>



<dt><a name='x_2_7_0beta1'></a>[2018-09-20] &mdash; Xdebug 2.7.0beta1</dt>

<dd><h3>Improvements</h3></dd>

<dd>Fixed <?= bug(1519); ?>: PHP 7.3 support (with a contribution by Christoph M. Becker)</dd>


<dt><a name='x_2_6_1'></a>[2018-08-01] &mdash; Xdebug 2.6.1</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1525); ?>: Namespace filter does equality match instead of prefix match</dd>
<dd>Fixed <?= bug(1532); ?>: SIGABRT when using remote debugging and an error is thrown in eval() (Philip Hofstetter)</dd>
<dd>Fixed <?= bug(1543); ?>: Various memory leaks due to changes in (internal) string handling</dd>
<dd>Fixed <?= bug(1556); ?>: Crash when register_shutdown_function() is called with a function named call_user_func*</dd>
<dd>Fixed <?= bug(1557); ?>: Remove 'return' in void xdebug_build_fname</dd>
<dd>Fixed <?= bug(1568); ?>: Can't debug object properties that have numeric keys</dd>

<dd><h3>Improvements</h3></dd>

<dd>Fixed <?= bug(1487); ?>: Re-enable IPv6 test on Travis</dd>


<dt><a name='x_2_7_0alpha1'></a>[2018-04-01] &mdash; Xdebug 2.7.0alpha1</dt>

<dd><h3>Improvements</h3></dd>

<dd>Fixed <?= bug(938); ?>: Support remote debugging for PHP scripts that fork. (Sponsored by Brad Wilson)</dd>
<dd>Fixed <?= bug(1487); ?>: Re-enable IPv6 test on Travis.</dd>


<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1526); ?>: Namespace filter does equality match instead of prefix match.</dd>
<dd>Fixed <?= bug(1532); ?>: SIGABRT when using remote debugging and an error is thrown in eval().</dd>
<dd>Fixed <?= bug(1543); ?>: Various memory leaks due to changes in (internal) string handling.</dd>


<dt><a name='x_2_6_0'></a>[2018-01-29] &mdash; Xdebug 2.6.0</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1522); ?>: Remote debugging test failures on s390 (Big Endian).</dd>


<dt><a name='x_2_6_0RC2'></a>[2018-01-23] &mdash; Xdebug 2.6.0RC2</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1521); ?>: xdebug_gc_stats.* missing from 2.6.0RC1 tarball.</dd>


<dt><a name='x_2_6_0RC1'></a>[2018-01-22] &mdash; Xdebug 2.6.0RC1</dt>

<dd><h3>Added features</h3></dd>

<dd>Fixed <?= bug(1506); ?>: Add <a href="/docs/garbage_collection">garbage collection</a> statistics feature (Benjamin Eberlei).</dd>
<dd>Fixed <?= bug(1507); ?>: Add functions to access Zend Engine garbage collection metrics (Benjamin Eberlei).</dd>

<dd><h3>Improvements</h3></dd>

<dd>Fixed <?= bug(1510); ?>: Change switch/case "break intentionally missing" comments to use GCC 7's new "fallthrough" attribute.</dd>
<dd>Fixed <?= bug(1511); ?>: Detect and use compiler flags through new configure option.</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1335); ?>: Debugging with PhpStorm sometimes gives "can not get property".</dd>
<dd>Fixed <?= bug(1454); ?>: Invalid memory read or segfaults from a __call() method.</dd>
<dd>Fixed <?= bug(1508); ?>: Code coverage filter not checked in xdebug_common_assign_dim handler.</dd>
<dd>Fixed <?= bug(1509); ?>: Code coverage missing for case inside switch with PHP 7.2.</dd>
<dd>Fixed <?= bug(1512); ?>: Xdebug does not properly encode and escape properties with quotes and \0 characters.</dd>
<dd>Fixed <?= bug(1514); ?>: Variable names with a NULL char are cut off at NULL char.</dd>
<dd>Fixed <?= bug(1515); ?>: Object property names with a NULL char are cut off at NULL char.</dd>
<dd>Fixed <?= bug(1516); ?>: Can't fetch variables or object properties which have \0 characters in them.</dd>
<dd>Fixed <?= bug(1517); ?>: Notifications incorrectly specify the error type in "type_string" instead of "type".</dd>


<dt><a name='x_2_6_0beta1'></a>[2017-12-28] &mdash; Xdebug 2.6.0beta1</dt>

<dd><h3>Added features</h3></dd>

<dd>Fixed <?= bug(1059); ?>: Add filter capabilities to tracing, stack traces, and code coverage.</dd>
<dd>Fixed <?= bug(1437); ?>: Add X-Profile-File-Name header when a profile file has been generated.</dd>

<dd><h3>Improvements</h3></dd>

<dd>Fixed <?= bug(1493); ?>: Run test suite in AppVeyor for Windows CI.</dd>
<dd>Fixed <?= bug(1498); ?>: Use new ZEND_EXTENSION API in config.w32 build scripts. (Kalle)</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(702); ?>: Check whether variables tracing also works with =&amp;.</dd>
<dd>Fixed <?= bug(1501); ?>: Xdebug var dump tries casting properties.</dd>
<dd>Fixed <?= bug(1502); ?>: SEND_REF lines are not marked as covered.</dd>


<dt><a name='x_2_6_0alpha1'></a>[2017-12-02] &mdash; Xdebug 2.6.0alpha1</dt>

<dd><h3>Added features</h3></dd>

<dd>Implemented <?= bug(474); ?>: Added "memory" output to profiling files, to find out where memory is allocated.</dd>
<dd>Implemented <?= bug(575); ?>: Dump super globals contents to error log upon errors, just like when this would happen for stack traces.</dd>
<dd>Implemented <?= bug(964); ?>: Parse X-Forwarded-For for the first IP address when selecting the remote_connect_back host (Steve Easley).</dd>
<dd>Implemented <?= bug(990); ?>: Add DBGp: notifications for notices and warnings to be shown in IDEs.</dd>
<dd>Implemented <?= bug(1312); ?>: Implement extended_properties feature to remote debugging to support names and values with low ASCII values.</dd>
<dd>Implemented <?= bug(1323); ?>: Added xdebug.filename_format setting to configure the formatting of filenames when tracing.</dd>
<dd>Implemented <?= bug(1379); ?>: Added support for Unix domain sockets to xdebug.remote_host (Sara Golemon).</dd>
<dd>Implemented <?= bug(1380); ?>: Added xdebug_is_debugger_active() that returns true when debugger is connected.</dd>
<dd>Implemented <?= bug(1391); ?>: Added support for earlier stack frames through new argument for xdebug_call_* functions.</dd>
<dd>Implemented <?= bug(1420); ?>: Handle PHP 7.2's new methods for switch/case</dd>
<dd>Implemented <?= bug(1470); ?>: Added xdebug.remote_timeout to make connect timeout configurable.</dd>
<dd>Implemented <?= bug(1495); ?>: Make var_dump() also use the new xdebug.filename_format when formatting filenames.</dd>

<dd><h3>Improvements</h3></dd>

<dd>Implemented <?= bug(847); ?>: Added support for "%s" specifier for xdebug.trace_output_name.</dd>
<dd>Implemented <?= bug(1384); ?>: Compile warning on Ubuntu 16.04 with GCC 5.4.x.</dd>
<dd>Implemented <?= bug(1401); ?>: Improved error message in case the connection breaks.</dd>
<dd>Implemented <?= bug(1430); ?>: Change DBGp tests to use TEST_PHP_EXECUTABLE instead of hard coded 'php'</dd>
<dd>Implemented <?= bug(1484); ?>: Use FD_CLOEXEC with debugging sockets to prevent FDs from leaking to forked processes (Chris Wright).</dd>
<dd>Improve the foldexpr in xt.vim to fold lines correctly (Donie Leigh).</dd>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(1272); ?>: property_get doesn't return @attributes for SimpleXMLElement.</dd>
<dd>Fixed <?= bug(1305); ?>: Property names with quotes can not be fetch while debugging.</dd>
<dd>Fixed <?= bug(1431); ?>: Fix "use after free" with in add_name_attribute_or_element.</dd>
<dd>Fixed <?= bug(1432); ?>: Fixed memory leak with xdebug_path_info_dtor.</dd>
<dd>Fixed <?= bug(1449); ?>: Debugging breaks with array element keys containing low-ASCII variables.</dd>
<dd>Fixed <?= bug(1471); ?>: Tracing crashes with return_assignments and ternairy operator.</dd>
<dd>Fixed <?= bug(1474); ?>: Crashes due to variable resolving/reading mechanism not taking care of temporary hash tables correctly (Nikita Popov, Derick).</dd>
<dd>Fixed <?= bug(1481); ?>: Fixed s390x and ppc64 builds (Remi Collet).</dd>
<dd>Fixed <?= bug(1486); ?>: Crash on ZEND_SWITCH_LONG / ZEND_SWITCH_STRING with more than 32 cases.</dd>
<dd>Fixed <?= bug(1496); ?>: Rewrite README.rst to be more clear on how to install and build Xdebug.</dd>

<dd><h3>Changes</h3></dd>

Fixed <?= bug(1411); ?>: Use Error (Throwable) instead of fatal error when maximum nesting level is reached.

<dd><h3>Removed features</h3></dd>

<dd>Implemented <?= bug(1377); ?>: Drop support for PHP 5.5 and 5.6, only PHP 7 is now supported</dd>


<dt><a name='x_2_5_5'></a>[2017-06-21] &mdash; Xdebug 2.5.5</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1439); ?>: TYPE_CHECK needs overloading due to smart branches</dd>
<dd>Fixed <?= bug(1444); ?>: Code Coverage misses a variable in a multi-line function call</dd>
<dd>Fixed <?= bug(1446); ?>: Code Coverage misses elseif if it uses an isset with a property</dd>


<dt><a name='x_2_5_4'></a>[2017-05-15] &mdash; Xdebug 2.5.4</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(799); ?>: Function traces report base class instead of object name</dd>
<dd>Fixed <?= bug(1421); ?>: Fix set_time_limit hanging on PHP 5.6 when pcntl_exec does not exist (Frode E. Moe)</dd>
<dd>Fixed <?= bug(1429); ?>: Code coverage does not cover null coalesce</dd>
<dd>Fixed <?= bug(1434); ?>: Code coverage segfaults on 32-bit arch</dd>


<dt><a name='x_2_5_3'></a>[2017-04-18] &mdash; Xdebug 2.5.3</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1421); ?>: Xdebug crashes when it is loaded without pcntl being present</dd>


<dt><a name='x_2_5_2'></a>[2017-04-17] &mdash; Xdebug 2.5.2</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(701); ?>: Functions as array indexes show ??? in trace</dd>
<dd>Fixed <?= bug(1403); ?>: Code coverage does not cover BIND_STATIC</dd>
<dd>Fixed <?= bug(1404); ?>: Execution time is calculated incorrectly</dd>
<dd>Fixed <?= bug(1413); ?>: Code coverage mishap with PHP 7.1.3</dd>
<dd>Fixed <?= bug(1414); ?>: Missing variable assignment in traces with OPcache loaded</dd>
<dd>Fixed <?= bug(1415); ?>: Crash with multiple catch constructs with OPcache loaded</dd>
<dd>Fixed <?= bug(1416); ?>: Trace files should not include the first result of a generator if it hasn't started yet</dd>
<dd>Fixed <?= bug(1417); ?>: Fetching properties of static class contexts fails due to incorrect fetch mode</dd>
<dd>Fixed <?= bug(1419); ?>: Summary not written when script ended with "pcntl_exec()"</dd>


<dt><a name='x_2_5_1'></a>[2017-02-26] &mdash; Xdebug 2.5.1</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1057); ?>: Add xdebug.ini of all settings to package</dd>
<dd>Fixed <?= bug(1165); ?>: DBGp: step_out skips subsequent function calls</dd>
<dd>Fixed <?= bug(1180); ?>: Code coverage crashes with non-standard start/stops</dd>
<dd>Fixed <?= bug(1278); ?>: Xdebug with PHP 7 does not handle prefill-from-oparray for XDEBUG_CC_UNUSED</dd>
<dd>Fixed <?= bug(1300); ?>: Xdebug functions are not exposing their signature to Reflection</dd>
<dd>Fixed <?= bug(1313); ?>: Arguments to __call() trampoline picked from the wrong memory location</dd>
<dd>Fixed <?= bug(1329); ?>: While printing out a stack with and function parameters, Xdebug reads uninitialized zvals or free()d memory</dd>
<dd>Fixed <?= bug(1381); ?>: Code Coverage misses line due to missing FETCH_DIM_W overload</dd>
<dd>Fixed <?= bug(1385); ?>: can not fetch IS_INDIRECT properties</dd>
<dd>Fixed <?= bug(1386); ?>: Executable code not shown as executed/executable</dd>
<dd>Fixed <?= bug(1392); ?>: Unable to compile on FreeBSD due to missing struct definition</dd>
<dd>Fixed <?= bug(1394); ?>: Code coverage does not cover instanceof (in elseif)</dd>


<dt><a name='x_2_5_0'></a>[2016-12-04] &mdash; Xdebug 2.5.0</dt>

<dd><h3>Improvements</h3></dd>
<dd>Implemented <?= bug(1232); ?>: add memory delta to HTML traces</dd>
<dd>Implemented <?= bug(1365); ?>: Allow remote_connect_back to be set through XDEBUG_CONFIG</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1168); ?>: Added defensive check to prevent infinite loop</dd>
<dd>Fixed <?= bug(1242); ?>: Xdebug on Windows with Eclipse has issues with breakpoint IDs</dd>
<dd>Fixed <?= bug(1343); ?>: Wrong values of numerical keys outside 32bit range</dd>
<dd>Fixed <?= bug(1357); ?>: Function signature using variadics is reported as being not executed</dd>
<dd>Fixed <?= bug(1361); ?>: Remote debugging connection issues with Windows (Anatol Belski)</dd>
<dd>Fixed <?= bug(1373); ?>: Crash in zend_hash_apply_with_arguments when debugging, due to unset symbol table</dd>


<dt><a name='x_2_5_0RC1'></a>[2016-11-12] &mdash; Xdebug 2.5.0RC1</dt>

<dd><h3>Improvements</h3></dd>
<dd>Implemented <?= bug(998); ?>: Added support for IPv6 (Thomas Vanhaniemi)</dd>
<dd>Implemented <?= bug(1297); ?>: Initial PHP 7.1 support</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1295); ?>: Apache crashes (SIGSEGV) when trying to establish connection when sockfd is large</dd>
<dd>Fixed <?= bug(1303); ?>: POLLRDHUP is not supported outside of Gnu/Linux</dd>
<dd>Fixed <?= bug(1331); ?>: Segfault in code coverage</dd>

<dd><h3>Removed features</h3></dd>
<dd>Support for PHP versions lower than PHP 5.5 has been dropped</dd>


<dt><a name='x_2_4_1'></a>[2016-08-02] &mdash; Xdebug 2.4.1</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1106); ?>: A thrown Exception after a class with __debugInfo gives 2 errors</dd>
<dd>Fixed <?= bug(1241); ?>: FAST_CALL/FAST_RET take #2</dd>
<dd>Fixed <?= bug(1246); ?>: Path and branch coverage should be initialised per request, not globally</dd>
<dd>Fixed <?= bug(1263); ?>: Code coverage segmentation fault with opcache enabled</dd>
<dd>Fixed <?= bug(1277); ?>: Crash when using a userland function from RSHUTDOWN with profiling enabled</dd>
<dd>Fixed <?= bug(1282); ?>: var_dump() of integers &gt; 32 bit is broken on Windows</dd>
<dd>Fixed <?= bug(1288); ?>: Segfault when uncaught exception message does not contain " in "</dd>
<dd>Fixed <?= bug(1291); ?>: Debugclient installation fails on Mac OS X</dd>
<dd>Fixed <?= bug(1326); ?>: Tracing and generators crashes with PHP 7.x.</dd>
<dd>Fixed <?= bug(1333); ?>: Profiler accesses memory structures after freeing</dd>


<dt><a name='x_2_4_0'></a>[2016-03-03] &mdash; Xdebug 2.4.0</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1258); ?>: Case in PHP 7.0 and code coverage</dd>
<dd>Fixed <?= bug(1261); ?>: segmentation fault in xdebug.so with PHP 7.0 version of 'pkgtools' due to spl_autoload()</dd>
<dd>Fixed <?= bug(1262); ?>: overload_var_dump=0 messes with xdebug_var_dump()</dd>
<dd>Fixed <?= bug(1266); ?>: xdebug_dump_superglobals() always dumps empty  stack on PHP 7</dd>
<dd>Fixed <?= bug(1267); ?>: AIX build issues</dd>
<dd>Fixed <?= bug(1270); ?>: String parsing marked not covered with PHP 7</dd>


<dt><a name='x_2_4_0RC4'></a>[2016-01-25] &mdash; Xdebug 2.4.0RC4</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1220); ?>: Segmentation fault if var_dump() output is too large.</dd>
<dd>Fixed <?= bug(1223); ?>: Xdebug crashes on PHP 7 when doing a DBGp eval command.</dd>
<dd>Fixed <?= bug(1229); ?>: Issues with GCC 4.8, which in -O2 move removes some required code.</dd>
<dd>Fixed <?= bug(1235); ?>: Xdebug does not compile against PHP 7.1-dev due to ZEND_FETCH_STATIC_PROP*.</dd>
<dd>Fixed <?= bug(1236); ?>: Can't remove breakpoints with negative IDs.</dd>
<dd>Fixed <?= bug(1238); ?>: Xdebug crashes with SIGSEGV while enumerating references in variables.</dd>
<dd>Fixed <?= bug(1239); ?>: Crash due to changes with the CATCH opcode's jump mechanism in 7.1</dd>
<dd>Fixed <?= bug(1241); ?>: Xdebug doesn't handle FAST_RET and FAST_CALL opcodes for branch/dead code analysis, and path coverage.</dd>
<dd>Fixed <?= bug(1245); ?>: xdebug_dump_superglobals dumps *uninitialized* with PHP 7.</dd>
<dd>Fixed <?= bug(1250); ?>: Add PHP version descriptors to debugging log and profile files.</dd>


<dt><a name='x_2_4_0RC3'></a>[2015-12-12] &mdash; Xdebug 2.4.0RC3</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1221); ?>: Sort out Windows x64 PHP 7 support</dd>
<dd>Fixed <?= bug(1229); ?>: Detect GCC 4.8 and disable optimisations when it is found</dd>
<dd>Made the test suite work for Windows too. Finally, after 13 years.</dd>


<dt><a name='x_2_4_0RC2'></a>[2015-12-02] &mdash; Xdebug 2.4.0RC2</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1181); ?>: Remote debugging does not handle exceptions after using zend_read_property</dd>
<dd>Fixed <?= bug(1189); ?>: Remove address attribute from remote debugging responses</dd>
<dd>Fixed <?= bug(1194); ?>: The error message is doubly HTML-encoded with assert()</dd>
<dd>Fixed <?= bug(1210); ?>: Segfault with code coverage dead code analysis and foreach on PHP 7</dd>
<dd>Fixed <?= bug(1215); ?>: SIGSEGV if xdebug.trace_output_dir directory does not exist</dd>
<dd>Fixed <?= bug(1217); ?>: xdebug.show_error_trace should not be enabled by default</dd>
<dd>Fixed <?= bug(1218); ?>: Xdebug messes with the exception code, by casting it to int</dd>
<dd>Fixed <?= bug(1219); ?>: Set default value for xdebug.overload_var_dump to 2 to include file / line numbers by default</dd>
<dd>Use long for PHP 5, and zend_long for PHP 7 for ini settings in the globals</dd>


<dt><a name='x_2_4_0rc1'></a>[2015-11-21] &mdash; Xdebug 2.4.0RC1</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1195); ?>: Segfault with code coverage and foreach</dd>
<dd>Fixed <?= bug(1200); ?>: Additional opcodes need to be overloaded for PHP 7</dd>
<dd>Fixed <?= bug(1202); ?>: Anonymous classes are not handled properly while remote debugging</dd>
<dd>Fixed <?= bug(1203); ?>: Accessing static property of a class that has no static properties crashes while remote debugging</dd>
<dd>Fixed <?= bug(1209); ?>: Segfault with building a function name for create_function</dd>


<dt><a name='x_2_4_0beta1'></a>[2015-11-05] &mdash; Xdebug 2.4.0beta1</dt>

<dd><h3>Improvements</h3></dd>
<dd>Implemented <?= bug(1109); ?>: Added support for PHP 7.</dd>
<dd>Implemented <?= bug(1153); ?>: Add function monitor functionality.</dd>
<dd>Implemented <?= bug(1183); ?>: Add xdebug.show_error_trace setting to allow/disallow to show a stack trace for every Error (throwable)</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1070); ?>: Too many open files error with php-fpm: connections not closed. (Patch by Sean Dubois)</dd>
<dd>Fixed <?= bug(1123); ?>: With Xdebug 2.3.1, PHPUnit with coverage is exponentially slower than without</dd>
<dd>Fixed <?= bug(1166); ?>: Using $this in __debugInfo() causes infinite recursion</dd>
<dd>Fixed <?= bug(1173); ?>: Segmentation fault in xdebug_get_monitored_functions()</dd>
<dd>Fixed <?= bug(1182); ?>: Using PHPStorm with PHP 7 RC1 and xdebug 2.4-dev break points are passed by including setting break point at start of script</dd>
<dd>Fixed <?= bug(1192); ?>: Dead code analysis does not work for generators with 'return;'</dd>


<dt><a name='x_2_3_3'></a>[2015-06-19] &mdash; Xdebug 2.3.3</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1130); ?>: Escaping issues with docrefs and HTML characters in error messages
<dd>Fixed <?= bug(1133); ?>: PDO exception code value type is changed
<dd>Fixed <?= bug(1137); ?>: Windows does not support %zu formatting for sprintf
<dd>Fixed <?= bug(1140); ?>: Tracing with __debugInfo() crashes Xdebug due to a stack overflow
<dd>Fixed <?= bug(1148); ?>: Can't disable max_nesting_function
<dd>Fixed <?= bug(1151); ?>: Crash when another extension calls call_user_function() during RINIT
<dd>Fixed crash with code coverage (Antony Dovgal)
<dd>Fixed usage of virtual_file_ex and STR_FREE (Remi Collet)
<dd>Reset overloaded opcodes at the end of each request (Eran Ifrah)

<dd><h3>Improvements</h3></dd>
<dd>Fixed <?= bug(686); ?>: Not possible to inspect SplObjectStorage instances with Xdebug
<dd>Fixed <?= bug(864); ?>: No attributes are shown if an object extends ArrayIterator
<dd>Fixed <?= bug(996); ?>: Can't evaluate property of class that extends ArrayObject
<dd>Fixed <?= bug(1134); ?>: Allow introspection of ArrayObject implementation's internal storage
<dd>Get rid of setlocale hack, by using %F instead of %f (and speed up tracing by 15-20%)


<dt><a name='x_2_3_2'></a>[2015-03-22] &mdash; Xdebug 2.3.2</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1117); ?>: Path/branch coverage sometimes crashes</dd>
<dd>Fixed <?= bug(1121); ?>: Segfaults with path/branch coverage</dd>


<dt><a name='x_2_3_1'></a>[2015-02-24] &mdash; Xdebug 2.3.1</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1112); ?>: Setting an invalid xdebug.trace_format causes Xdebug to crash</dd>
<dd>Fixed <?= bug(1113); ?>: xdebug.*_trigger do no longer work, due to NULL not being an empty string</dd>


<dt><a name='x_2_3_0'></a>[2015-02-22] &mdash; Xdebug 2.3.0</dt>

<dd><h3>Fixed bugs</h3></dd>

<dd>Fixed <?= bug(932); ?>: Added an error message in case the remote debug log couldn't be opened</dd>
<dd>Fixed <?= bug(982); ?>: Incorrect file paths in exception stack trace</dd>
<dd>Fixed <?= bug(1094); ?>: Segmentation fault when attempting to use branch/path coverage</dd>
<dd>Fixed <?= bug(1101); ?>: Debugger is not triggered on xdebug_break() in JIT mode</dd>
<dd>Fixed <?= bug(1102); ?>: Stop Xdebug from crashing when debugging PHP Code with "php -r".</dd>
<dd>Fixed <?= bug(1103); ?>: XDEBUG_SESSION_STOP_NO_EXEC only stops first script executed with auto_prepend|append_files</dd>
<dd>Fixed <?= bug(1104); ?>: One character non-public properties cause issues with debugging</dd>
<dd>Fixed <?= bug(1105); ?>: Setting properties without specifying a type only works in topmost frame (Dominik del Bondio)</dd>
<dd>Fixed <?= bug(1095); ?>: Crash when using a non-associate array key in GLOBALS</dd>
<dd>Fixed <?= bug(1111); ?>: eval does not work when debugger is stopped in xdebug_throw_exception_hook (Dominik del Bondio)</dd>

<dd><h3>Added features</h3></dd>

<dd><h4>General</h4></dd>

<dd>Implemented <?= bug(304); ?>: File name and line number info for overloaded var_dump()</dd>
<dd>Implemented <?= bug(310); ?>: Allow class vars and array keys with xdebug_debug_zval()</dd>
<dd>Implemented <?= bug(722); ?>: Add stack trace limit setting.</dd>
<dd>Implemented <?= bug(1003); ?>: Add option to xdebug_print_function_stack() to suppress filename and line number</dd>
<dd>Implemented <?= bug(1004); ?>: Ability to halt on warning/notice</dd>
<dd>Implemented <?= bug(1015); ?>: Added the xdebug.force_display_errors and xdebug.force_error_reporting php.ini-only settings to always override PHP's settings for display_errors and error_reporting</dd>
<dd>Implemented <?= bug(1023); ?>: Add support for PHP 5.6 variadics</dd>
<dd>Implemented <?= bug(1024); ?>: Add support for PHP 5.6's ASSIGN_POW</dd>

<dd><h4>Debugging</h4></dd>

<dd>Implemented <?= bug(406); ?>: Added support for remote debugging user-defined constants</dd>
<dd>Implemented <?= bug(495); ?>: Added support for the wildcard exception name '*'</dd>
<dd>Implemented <?= bug(1066); ?>: Better error message for SELinux preventing debugging connections</dd>
<dd>Implemented <?= bug(1084); ?>: Added support for extended classes to trigger exception breakpoints</dd>
<dd>Implemented <?= bug(1084); ?>: Added exception code as extra element to debugger XML</dd>

<dd><h4>Tracing</h4></dd>

<dd>Implemented <?= bug(341); ?>: Added the time index and memory usage for function returns in normal tracefiles</dd>
<dd>Implemented <?= bug(644); ?>: Shared secret for profiler_enable_trigger and trace_enable_trigger with *_value option</dd>
<dd>Implemented <?= bug(971); ?>: Added the trace file option "XDEBUG_TRACE_NAKED_FILENAME" to xdebug_start_trace() to prevent the ".xt" extension from being added</dd>
<dd>Implemented <?= bug(1021); ?>: Added support for return values to computerized trace files</dd>
<dd>Implemented <?= bug(1022); ?>: Added support for serialized variables as format in trace files in the form of option "5" for "xdebug.collect_params"</dd>

<dd><h4>Code Coverage</h4></dd>

<dd>Implemented <?= bug(380); ?>: Added xdebug_code_coverage_started()</dd>
<dd>Implemented <?= bug(1034); ?>: Add collected path and branch information to xdebug_get_code_coverage() output</dd>

<dd><h4>Profiling</h4></dd>

<dd>Implement <?= bug(1054); ?>: Support for filename and function name compression in cachegrind files</dd>

<dd><h3>Changes</h3></dd>

<dd>Implemented <?= bug(863); ?>: Support xdebug.overload_var_dump through ini_set()</dd>
<dd>Implemented <?= bug(973); ?>: Use case-insensitive filename comparison on all systems (Galen Wright-Watson)</dd>
<dd>Implemented <?= bug(1057); ?>: Removed trailing whitespace from example xdebug.ini</dd>
<dd>Implemented <?= bug(1096); ?>: Improve performance improvement for handling breakpoints by ignoring locales (Daniel Sloof)</dd>
<dd>Implemented <?= bug(1100); ?>: Raise default max_nesting_level to 256</dd>

<dd><h3>Removed features</h3></dd>

<dd>Support for PHP versions lower than PHP 5.4 have been dropped.</dd>


<dt><a name='x_2_2_7'></a>[2015-01-22] &mdash; Xdebug 2.2.7</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1083); ?>: Segfault when requesting a variable for a context that did not have them.</dd>
<dd>Fixed <?= bug(1087); ?>: zend_execute_script or zend_eval_string in RINIT segfaults.</dd>
<dd>Fixed <?= bug(1088); ?>: Xdebug won't show dead and not executed lines at the second time.</dd>
<dd>Fixed <?= bug(1098); ?>: Xdebug doesn't make use of __debugInfo.</dd>
<dd>Fixed segfaults with ZTS on PHP 5.6.</dd>



<dt><a name='x_2_2_6'></a>[2014-11-14] &mdash; Xdebug 2.2.6</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1048); ?>: Can not get $GLOBAL variable by property_value on function context.</dd>
<dd>Fixed <?= bug(1073); ?> and <?= bug(1075); ?>: Segmentation fault with internal functions calling internal functions.</dd>
<dd>Fixed <?= bug(1085); ?>: Fixed the tracefile analyser as the format version had been bumbed.</dd>
<dd>Fixed memory leaks.</dd>


<dt><a name='x_2_2_5'></a>[2014-04-29] &mdash; Xdebug 2.2.5</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(1040); ?>: Fixed uninitialized sa value.</dd>
<dd>Fixed building on hurd-i386.</dd>


<dt><a name='x_2_2_4'></a>[2014-02-28] &mdash; Xdebug 2.2.4</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(785); ?>: Profiler does not handle closures and call_user_func_array well.</dd>
<dd>Fixed <?= bug(963); ?>: Xdebug waits too long for response from remote client</dd>
<dd>Fixed <?= bug(976); ?>: Xdebug crashes if current varibles scope contains COM object.</dd>
<dd>Fixed <?= bug(978); ?>: Inspection of array with negative keys fails</dd>
<dd>Fixed <?= bug(979); ?>: property_value -m 0 should mean all bytes, not 0 bytes</dd>
<dd>Fixed <?= bug(987); ?>: Hidden property names not shown.</dd>


<dt><a name='x_2_2_3'></a>[2013-05-22] &mdash; Xdebug 2.2.3</dt>

<dd><h3>Added features</h3></dd>
<dd>Added support for PHP 5.5.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(923); ?>: Xdebug + Netbeans + ext/MongoDB crash on MongoCursor instance</dd>
<dd>Fixed <?= bug(929); ?>: Directory name management in xdebug.profiler_output_dir</dd>
<dd>Fixed <?= bug(931); ?>: xdebug_str_add does not check for NULL str before calling strlen on it</dd>
<dd>Fixed <?= bug(935); ?>: Document the return value from xdebug_get_code_coverage()</dd>
<dd>Fixed <?= bug(947); ?>: Newlines converted when html_errors = 0</dd>


<dt><a name='x_2_2_2'></a>[2013-03-23] &mdash; Xdebug 2.2.2</dt>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(598); ?>: Use HTTP_X_FORWARDED_FOR to determine remote debugger.</dd>
<dd>Fixed <?= bug(625); ?>: xdebug_get_headers() -&gt; Headers are reset unexpectedly.</dd>
<dd>Fixed <?= bug(811); ?>: PHP Documentation Link.</dd>
<dd>Fixed <?= bug(818); ?>: Require a php script in the PHP_RINIT causes Xdebug to crash.</dd>
<dd>Fixed <?= bug(903); ?>: xdebug_get_headers() returns replaced headers.</dd>
<dd>Fixed <?= bug(905); ?>: Support PHP 5.5 and generators.</dd>
<dd>Fixed <?= bug(920); ?>: AM_CONFIG_HEADER is depreciated.</dd>

<dt><a name='x_2_2_1'></a>[2012-07-15] &mdash; Xdebug 2.2.1</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(843); ?>: Text output depends on php locale.</dd>
<dd>Fixed <?= bug(838); ?>/<?= bug(839); ?>/<?= bug(840); ?>: Debugging static properties crashes Xdebug.</dd>
<dd>Fixed <?= bug(821); ?>: Variable assignments (beginning with =&gt;) should be indented one more scope.</dd>
<dd>Fixed <?= bug(811); ?>: PHP Documentation Link.</dd>
<dd>Fixed <?= bug(800); ?>: var_dump(get_class(new foo\bar')) add an extra "\" in class name.</dd>

<dt><a name='x_2_2_0'></a>[2012-05-08] &mdash; Xdebug 2.2.0</dt>
<dd><h3>Added features</h3></dd>
<dd>Support for PHP 5.4.</dd>
<dd>Added ANSI colour output for the shell. (Including patches by Michael Maclean)</dd>
<dd>Added var_dump() overloading on the command line (<?= bug(457); ?>).</dd>
<dd>Added better support for closures in stack and function traces.</dd>
<dd>Added the size of arrays to the overloaded variable output, so that you know how many elements there are.</dd>
<dd>Added support for X-HTTP-FORWARDED-FOR before falling back to REMOTE_ADDR (<?= bug(660); ?>). (Patch by Hannes Magnusson)</dd>
<dd>Added the method call type to xdebug_get_function_stack() (<?= bug(695); ?>). </dd>
<dd>Added extra information to error printouts to tell that the error suppression operator has been ignored due to xdebug.scream.</dd>
<dd>Added a error-specific CSS class to stack traces.</dd>

<dd><h3>New settings</h3></dd>
<dd>xdebug.cli_color for colouring output on the command line (Unix only).</dd>
<dd>Added xdebug.trace_enable_trigger to triger function traces through a GET/POST/COOKIE parameter (<?= bug(517); ?>). (Patch by Patrick Allaert)</dd>
<dd>Added support for the 'U' format specifier for function trace and profiler filenames.</dd>

<dd><h3>Changes</h3></dd>
<dd>Improved performance by lazy-initializing data structures.</dd>
<dd>Improved code coverage performance. (Including some patches by Taavi Burns)</dd>
<dd>Improved compatibility with KCacheGrind.</dd>
<dd>Improved logging of remote debugging connections, by added connection success/failure logging to the xdebug.remote_log functionality.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(827); ?>: Enabling Xdebug causes phpt tests to fail because of var_dump() formatting issues.</dd>
<dd>Fixed <?= bug(823); ?>: Single quotes are escaped in var_dumped string output.</dd>
<dd>Fixed <?= bug(819); ?>: Xdebug 2.2.0RC2 can't stand on a breakpoint more than 30 seconds.</dd>
<dd>Fixed <?= bug(801); ?>: Segfault with streamwrapper and unclosed $fp on destruction.</dd>
<dd>Fixed <?= bug(797); ?>: Xdebug crashes when fetching static properties.
<dd>Fixed <?= bug(794); ?>: Allow coloured output on Windows.</dd>
<dd>Fixed <?= bug(784); ?>: Unlimited feature for var_display_max_data and var_display_max_depth is undocumented.</dd>
<dd>Fixed <?= bug(774); ?>: Apache crashes on header() calls.</dd>
<dd>Fixed <?= bug(764); ?>: Tailored Installation instructions do not work.</dd>
<dd>Fixed <?= bug(758); ?>: php_value xdebug.idekey is ignored in .htaccess files</dd>
<dd>Fixed <?= bug(728); ?>: Profiler reports __call() invocations confusingly/wrongly.</dd>
<dd>Fixed <?= bug(687); ?>: Xdebug does not show dynamically defined variable.</dd>
<dd>Fixed <?= bug(662); ?>: idekey is set to running user.</dd>
<dd>Fixed <?= bug(627); ?>: Added the realpath check.</dd>

<dt><a name='x_2_2_0rc2'></a>[2012-04-22] &mdash; Xdebug 2.2.0rc2</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(801); ?>: Segfault with streamwrapper and unclosed $fp on destruction.</dd>
<dd>Fixed <?= bug(794); ?>: Allow coloured output on Windows.</dd>
<dd>Fixed <?= bug(784); ?>: Unlimited feature for var_display_max_data and var_display_max_depth is undocumented.</dd>
<dd>Fixed <?= bug(774); ?>: Apache crashes on header() calls.</dd>
<dd>Fixed <?= bug(764); ?>: Tailored Installation instructions do not work.</dd>
<dd>Fixed <?= bug(758); ?>: php_value xdebug.idekey is ignored in .htaccess files</dd>
<dd>Fixed <?= bug(662); ?>: idekey is set to running user.</dd>

<dt><a name='x_2_2_0rc1'></a>[2012-03-13] &mdash; Xdebug 2.2.0rc1</dt>
<dd><h3>Added features</h3></dd>
<dd>Support for PHP 5.4.</dd>
<dd>Added ANSI colour output for the shell. (Including patches by Michael Maclean)</dd>
<dd>Added var_dump() overloading on the command line (<?= bug(457); ?>).</dd>
<dd>Added better support for closures in stack and function traces.</dd>
<dd>Added the size of arrays to the overloaded variable output, so that you know how many elements there are.</dd>
<dd>Added support for X-HTTP-FORWARDED-FOR before falling back to REMOTE_ADDR (<?= bug(660); ?>). (Patch by Hannes Magnusson)</dd>
<dd>Added the method call type to xdebug_get_function_stack() (<?= bug(695); ?>). </dd>
<dd>Added extra information to error printouts to tell that the error suppression operator has been ignored due to xdebug.scream.</dd>
<dd>Added a error-specific CSS class to stack traces.</dd>

<dd><h3>New settings</h3></dd>
<dd>xdebug.cli_color for colouring output on the command line (Unix only).</dd>
<dd>Added xdebug.trace_enable_trigger to triger function traces through a GET/POST/COOKIE parameter (<?= bug(517); ?>). (Patch by Patrick Allaert)</dd>
<dd>Added support for the 'U' format specifier for function trace and profiler filenames.</dd>

<dd><h3>Changes</h3></dd>
<dd>Improved performance by lazy-initializing data structures.</dd>
<dd>Improved code coverage performance. (Including some patches by Taavi Burns)</dd>
<dd>Improved compatibility with KCacheGrind.</dd>
<dd>Improved logging of remote debugging connections, by added connection success/failure logging to the xdebug.remote_log functionality.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>No additional bug fixes besides the ones from the 2.1 branch up til Xdebug 2.1.4.</dd>


<dt><a name='x_2_1_4'></a>[2012-03-12] &mdash; Xdebug 2.1.4</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(788); ?>: Collect errors eats fatal errors.</dd>
<dd>Fixed <?= bug(787); ?>: Segmentation Fault with PHP header_remove().</dd>
<dd>Fixed <?= bug(778); ?>: Xdebug session in Eclipse crash whenever it run into simplexml_load_string call.</dd>
<dd>Fixed <?= bug(756); ?>: Added support for ZEND_*_*_OBJ and self::*.</dd>
<dd>Fixed <?= bug(747); ?>: Still problem with error message and soap client / soap server.</dd>
<dd>Fixed <?= bug(744); ?>: new lines in a PHP file from Windows are displayed with an extra white line with var_dump().</dd>
<dd>Fixed an issue with debugging and the eval command.</dd>
<dd>Fixed compilation with ZTS on PHP &lt; 5.3.</dd>

<dt><a name='x_2_1_3'></a>[2012-01-25] &mdash; Xdebug 2.1.3</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(725); ?>: EG(current_execute_data) is not checked in xdebug.c, xdebug_statement_call.</dd>
<dd>Fixed <?= bug(723); ?>: xdebug is stricter than PHP regarding Exception property types.</dd>
<dd>Fixed <?= bug(714); ?>: Cachegrind files have huge (wrong) numbers in some lines.</dd>
<dd>Fixed <?= bug(709); ?>: Xdebug doesn't understand E_USER_DEPRECATED.</dd>
<dd>Fixed <?= bug(698); ?>: Allow xdebug.remote_connect_back to be set in .htaccess.</dd>
<dd>Fixed <?= bug(690); ?>: Function traces are not appended to file with xdebug_start_trace() and xdebug.trace_options=1.</dd>
<dd>Fixed <?= bug(623); ?>: Static properties of a class can be evaluated only with difficulty.</dd>
<dd>Fixed <?= bug(614); ?>/<?= bug(619); ?>: Viewing private variables in base classes through the debugger.</dd>
<dd>Fixed <?= bug(609); ?>: Xdebug and SOAP extension's error handlers conflict.</dd>
<dd>Fixed <?= bug(606); ?>/<?= bug(678); ?>/<?= bug(688); ?>/<?= bug(689); ?>/<?= bug(704); ?>: crash after using eval on an unparsable, or un-executable statement.</dd>
<dd>Fixed <?= bug(305); ?>: xdebug exception handler doesn't properly handle special chars.</dd>

<dd><h3>Other changes</h3></dd>
<dd>Changed xdebug_break() to hint to the statement execution trap instead of breaking forcefully adding an extra stackframe.</dd>
<dd>Prevent Xdebug 2.1.x to build with PHP 5.4.</dd>


<dt><a name='x_2_1_2'></a>[2011-07-28] &mdash; Xdebug 2.1.2</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(622); ?>: Working with eval() code is inconvenient and difficult.</dd>
<dd>Fixed <?= bug(684); ?>: xdebug_var_dump - IE does not support &amp;.</dd>
<dd>Fixed <?= bug(693); ?>: Cachegrind files not written when filename is very long.</dd>
<dd>Fixed <?= bug(697); ?>: Incorrect code coverage of function arguments when using XDEBUG_CC_UNUSED.</dd>
<dd>Fixed <?= bug(699); ?>: Xdebug gets the filename wrong for the countable interface.</dd>
<dd>Fixed <?= bug(703); ?>: Added another opcode to the list that needs to be overridden.</dd>


<dt><a name='x_2_1_1'></a>[2011-03-28] &mdash; Xdebug 2.1.1</dt>
<dt class="historical"><a name='x_2_1_1rc1'></a>[2011-03-22] &mdash; Xdebug 2.1.1rc1</dt>
<dd><h3>Fixed bugs</h3></dd>

<dd><h4>Debugger</h4></dd>
<dd>Fixed <?= bug(518); ?>: Removed CLASSNAME pseudo-property optional.</dd>
<dd>Fixed <?= bug(592); ?>: Xdebug crashes with run after detach.</dd>
<dd>Fixed <?= bug(596); ?>: Call breakpoint never works with instance methods, only static methods.</dd>
<dd>Fixed JIT mode in the debugger so that it works for xdebug_break() too.</dd>

<dd><h4>Profiler</h4></dd>
<dd>Fixed <?= bug(631); ?>: Summary not written when script ended with "exit()".</dd>
<dd>Fixed <?= bug(639); ?>: Xdebug profiling: output not correct - missing 'cfl='.</dd>
<dd>Fixed <?= bug(642); ?>: Fixed line numbers for offsetGet, offsetSet, __get/__set/__isset/__unset and __call in profile files and stack traces/function traces.</dd>
<dd>Fixed <?= bug(643); ?>: Profiler gets line numbers wrong.</dd>
<dd>Fixed <?= bug(653); ?>: Xdebug profiler crashes with %H in file name and non standard port.</dd>

<dd><h4>Others</h4></dd>
<dd>Fixed <?= bug(651); ?>: Incorrect code coverage after empty() in conditional.</dd>
<dd>Fixed <?= bug(654); ?>: Xdebug hides error message in CLI.</dd>
<dd>Fixed <?= bug(665); ?>: Xdebug does not respect display_errors=stderr. (Patch by Ben Spencer)</dd>
<dd>Fixed <?= bug(670); ?>: Xdebug crashes with broken "break x" code.</dd>


<dt><a name='x_2_1_0'></a>[2010-06-29] &mdash; Xdebug 2.1.0</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd> Fixed <?= bug(562); ?>: Incorrect coverage information for closure function headers.</dd>
<dd> Fixed <?= bug(566); ?>: Xdebug crashes when using conditional breakpoints.</dd>
<dd> Fixed <?= bug(567); ?>: xdebug_debug_zval and xdebug_debug_zval_stdout don't work with PHP 5.3. (Patch by Endo Hiroaki).</dd>
<dd> Fixed <?= bug(570); ?>: undefined symbol: zend_memrchr.</dd>



<dt><a name='x_2_1_0rc1'></a>[2010-04-07] &mdash; Xdebug 2.1.0rc1</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd> Fixed <?= bug(400); ?>: Xdebug shows errors, even when PHP is request startup mode.</dd>
<dd> Fixed <?= bug(421); ?>: xdebug sends back invalid characters in xml sometimes.</dd>
<dd> Fixed <?= bug(475); ?>: Property names with null chars are not sent fully to the client.</dd>
<dd> Fixed <?= bug(480); ?>: Issues with the reserved resource in multi threaded environments (Patch by Francis.Grolemund@netapp.com).</dd>
<dd> Fixed <?= bug(494); ?>: Private attributes of parent class unavailable when inheriting.</dd>
<dd> Fixed <?= bug(558); ?>: PHP segfaults when running a nested eval.</dd>



<dt><a name='x_2_1_0beta3'></a>[2010-02-27] &mdash; Xdebug 2.1.0beta3</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed memory corruption issues.</dd>
<dd>Fixed a threading related issue for code-coverage.</dd>
<dd>Fixed <?= bug(532); ?>: Xdebug breaks header() function.</dd>
<dd>DBGP: Prevent Xdebug from returning properties when a too high page number has been requested.</dd>



<dt><a name='x_2_1_0beta2'></a>[2010-02-03] &mdash; Xdebug 2.1.0beta2</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed memory leak in breakpoint handling.</dd>
<dd>Fixed <?= bug(528); ?>: Core dump generated with remote_connect_back option set and CLI usage.</dd>
<dd>Fixed <?= bug(515); ?>: declare(ticks) statement confuses code coverage.</dd>
<dd>Fixed <?= bug(512); ?>: DBGP: breakpoint_get doesn't return conditions in its response.</dd>
<dd>Possible fix for <?= bug(507); ?>/#517: Crashes because of uninitalised header globals.</dd>
<dd>Fixed <?= bug(501); ?>: Xdebug's variable tracing misses POST_INC and variants.</dd>


<dt><a name='x_2_1_0beta1'></a>[2010-01-03] &mdash; Xdebug 2.1.0beta1</dt>
<dd><h3>Added features</h3></dd>
<dd>Added error display collection and suppressions.</dd>
<dd>Added the recording of headers being set in scripts.</dd>
<dd>Added variable assignment tracing.</dd>
<dd>Added the ability to turn of the default overriding of var_dump().</dd>
<dd>Added "Scream" support, which disables the @ operator.</dd>
<dd>Added a trace-file analysing script.</dd>
<dd>Added support for debugging into phars.</dd>
<dd>Added a default xdebug.ini. (Patch by Martin Schuhfuß &lt;martins@spot-media.de>)</dd>
<dd>Added function parameters in computerized function traces.</dd>
<dd>PHP 5.3 compatibility.</dd>
<dd>Improved code coverage accuracy.</dd>

<dd><h3>New functions</h3></dd>
<dd>xdebug_get_formatted_function_stack(), which returns a formatted function stack instead of displaying it.</dd>
<dd>xdebug_get_headers(), which returns all headers that have been set in a script, both explicitly with things like header(), but also implicitly for things like setcookie().</dd>
<dd>xdebug_start_error_collection(), xdebug_stop_error_collection() and xdebug_get_collected_errors(), which allow you to collect all notices, warnings and error messages that Xdebug generates from PHP's error_reporting functionality so that you can output them at a later point in your script by hand.</dd>

<dd><h3>New settings</h3></dd>
<dd>xdebug.collect_assignments, which enables the emitting of variable assignments in function traces.</dd>
<dd>xdebug.file_line_format, to generate a link with a specific format for every filename that Xdebug outputs.</dd>
<dd>xdebug.overload_var_dump, which allows you to turn off Xdebug's version of var_dump().</dd>
<dd>xdebug.remote_cookie_expire_time, that controls the length of a remote debugging session. (Patch by Rick Pannen &lt;pannen@gmail.com>)</dd>
<dd>xdebug.scream, which makes the @ operator to be ignored.</dd>

<dd><h3>Changes</h3></dd>
<dd>Added return values for xdebug_start_code_coverage() and xdebug_stop_code_coverage() to indicate whether the action was succesfull.  xdebug_start_code_coverage() will return TRUE if the call enabled code coverage, and FALSE if it was already enabled.  xdebug_stop_code_coverage() will return FALSE when code coverage wasn't started yet and TRUE if it was turned on.</dd>
<dd>Added an optional argument to xdebug_print_function_stack() to display your own message. (Patch by Mikko Koppanen).</dd>
<dd>All HTML output as generated by Xdebug now has a HTML "class" attribute for easy CSS formatting.</dd>

<dd><h3>Removed features</h3></dd>
<dd>Support for PHP versions lower than PHP 5.1 have been dropped.</dd>
<dd>The PHP3 and GDB debugger engines have been removed.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed support for showing $this in remote debugging sessions.</dd>
<dd>Fixed bug in formatting the display of "Variables in the local scope".</dd>
<dd>Possible fix for a threading issue where the headers gathering function would create stack overflows.</dd>
<dd>Possible fix for bug #324: xdebug_dump_superglobals() only dumps superglobals that were accessed before, and #478: Xdebug 2.0.x can't use %R in xdebug.profiler_output_name if register_long_arrays is off.</dd>

<dd>Fixed <?= bug(505); ?>: %s in xdebug.trace_output_name breaks functions traces.</dd>
<dd>Fixed <?= bug(494); ?>: Private attributes of parent class unavailable when inheriting.</dd>
<dd>Fixed <?= bug(486); ?>: feature_get -n breakpoint_types returns out of date list.</dd>
<dd>Fixed <?= bug(476); ?>: Xdebug doesn't support PHP 5.3's exception chaining.</dd>
<dd>Fixed <?= bug(472); ?>: Dead Code Analysis for code coverage messed up after goto.</dd>
<dd>Fixed <?= bug(470); ?>: Catch blocks marked as dead code unless executed.</dd>
<dd>Fixed <?= bug(469); ?>: context_get for function variables always appear as "uninitialized".</dd>
<dd>Fixed <?= bug(468); ?>: Property_get on $GLOBALS works only at top-level, by adding GLOBALS to the super globals context.</dd>
<dd>Fixed <?= bug(453); ?>: Memory leaks.</dd>
<dd>Fixed <?= bug(445); ?>: error_prepend_string and error_append_string are ignored by xdebug_error_cb. (Patch by Kent Davidson &lt;kent@marketruler.com>)</dd>
<dd>Fixed <?= bug(442); ?>: configure: error: "you have strange libedit".</dd>
<dd>Fixed <?= bug(439); ?>: Xdebug crash in xdebug_header_handler.</dd>
<dd>Fixed <?= bug(423); ?>: Conflicts with funcall.</dd>
<dd>Fixed <?= bug(419); ?>: Make use of P_tmpdir if defined instead of hard coded '/tmp'.</dd>
<dd>Fixed <?= bug(417); ?>: Response of context_get may lack page and pagesize attributes.</dd>
<dd>Fixed <?= bug(411); ?>: Class/function breakpoint setting does not follow the specs.</dd>
<dd>Fixed <?= bug(393); ?>: eval returns array data at the previous page request.</dd>
<dd>Fixed <?= bug(391); ?>: Xdebug doesn't stop executing script on catchable fatal errors.</dd>
<dd>Fixed <?= bug(389); ?>: Destructors called on fatal error.</dd>
<dd>Fixed <?= bug(368); ?>: Xdebug's debugger bails out on a parse error with the eval command.</dd>
<dd>Fixed <?= bug(356); ?>: Temporary breakpoints persist.</dd>
<dd>Fixed <?= bug(355); ?>: Function numbers in trace files weren't unique.</dd>
<dd>Fixed <?= bug(340); ?>: Segfault while throwing an Exception.</dd>
<dd>Fixed <?= bug(328); ?>: Private properties are incorrectly enumerated in case of extended classes.</dd>
<dd>Fixed <?= bug(249); ?>: Xdebug's error handler messes up with the SOAP extension's error handler.</dd>

<dd><h3>DBGP</h3></dd>
<dd>Fixed cases where private properties where shown for objects, but not accessible.</dd>
<dd>Added a patch by Lucas Nealan (lucas@php.net) and Brian Shire (shire@php.net) of Facebook to allow connections to the initiating request's IP address for remote debugging.</dd>
<dd>Added the -p argument to the eval command as well, pending inclusion into DBGP.</dd>
<dd>Added the retrieval of a file's execution lines. I added a new un-official method called xcmd_get_executable_lines which requires the stack depth as argument (-d). You can only fetch this information for stack frames as it needs an available op-array which is only available when a function is executed.</dd>
<dd>Added a fake "CLASSNAME" property to objects that are returned in debug requests to facilitate deficiencies in IDEs that fail to show the "classname" XML attribute.</dd>


<dt><a name='x_2_0_5'></a>[2009-07-03] &mdash; Xdebug 2.0.5</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=425'>#425</a>: memory leak (around 40MB for each request) when using xdebug_start_trace.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=422'>#422</a>: Segfaults when using code coverage with a parse error in the script.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=418'>#418</a>: compilation breaks with CodeWarrior for NetWare.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=403'>#403</a>: 'call' and 'return' breakpoints triggers both on call and return for class method breakpoints.</dd>
<dd>Fixed TSRM issues for PHP 5.2 and PHP 5.3. (Original patch by Elizabeth M. Smith).</dd>
<dd>Fixed odd crash bugs, due to GCC 4 sensitivity.</dd>


<dd><h3>Added features</h3></dd>
<dd>Support debugging into phars.</dd>
<dd>Basic PHP 5.3 support.</dd>


<dt><a name='x_2_0_4'></a>[2008-12-30] &mdash; Xdebug 2.0.4</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed for strange jump positions in path analysis.</dd>
<dd>Fixed issues with code coverage crashing on parse errors.</dd>
<dd>Fixed code code coverage by overriding more opcodes.</dd>
<dd>Fixed issues with Xdebug stalling/crashing when detaching from remote debugging.</dd>
<dd>Fixed crash on Vista where memory was freed with routines from a different standard-C library than it was allocated with. (Patch by Eric Promislow &lt;ericp@activestate.com>).</dd>
<dd>Link against the correct CRT library. (Patch by Eric Promislow &lt;ericp@activestate.com>).</dd>
<dd>Sort the symbol elements according to name. (Patch by Eric Promislow &lt;ericp@activestate.com>).</dd>
<dd>Fixed support for mapped-drive UNC paths for Windows. (Patch by Eric Promislow &lt;ericp@activestate.com>).</dd>
<dd>Fixed a segfault in interactive mode while including a file.</dd>
<dd>Fixed a crash in super global dumping in case somebody was strange enough to reassign them to a value type other than an Array.</dd>
<dd>Simplify version checking for libtool. (Patch by PGNet &lt;pgnet.trash@gmail.com>).</dd>
<dd>Fixed display of unused returned variables from functions in PHP 5.3.</dd>
<dd>Include config.w32 in the packages as well.</dd>
<dd>Fixed .dsp for building with PHP 4.</dd>

<dd><h3>Added features</h3></dd>
<dd>Support debugging into phars.</dd>
<dd>Basic PHP 5.3 support.</dd>


<dt><a name='x_2_0_3'></a>[2008-04-09] &mdash; Xdebug 2.0.3</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=338'>#338</a>: Crash with: xdebug.remote_handler=req.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=334'>#334</a>: Code Coverage Regressions.</dd>
<dd>Fixed abstract method detection for PHP 5.3.</dd>
<dd>Fixed code coverage dead-code detection.</dd>
<dd>Ignore ZEND_ADD_INTERFACE, which is on a different line in PHP &gt;= 5.3 for some weird reason.</dd>

<dd><h3>Changes</h3></dd>
<dd>Added a CSS-class for xdebug's var_dump().</dd>
<dd>Added support for the new E_DEPRECATED.</dd>


<dt><a name='x_2_0_2'></a>[2007-11-11] &mdash; Xdebug 2.0.2</dt>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=325'>#325</a>: DBGP: "detach" stops further sessions being established from Apache.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=321'>#321</a>: Code coverage crashes on empty PHP files.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=318'>#318</a>: Segmentation Fault in code coverage analysis.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=315'>#315</a>: Xdebug crashes when including a file that doesn't exist.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=314'>#314</a>: PHP CLI Error Logging thwarted when Xdebug Loaded.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=300'>#300</a>: Direction of var_dump().</dd>
<dd>Always set the transaction_id and command. (Related to bug #313).</dd>


<dt><a name='x_2_0_1'></a>[2007-10-20] &mdash; Xdebug 2.0.1</dt>
<dd><h3>Changes</h3></dd>
<dd>Improved code coverage performance dramatically.</dd>
<dd>PHP 5.3 compatibility (no namespaces yet though).</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=301'>#301</a>: Loading would cause SIGBUS on Solaris 10 SPARC. (Patch by Sean Chalmers)</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=300'>#300</a>: Xdebug does not force LTR rendering for its tables.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=299'>#299</a>: Computerized traces don't have a newline for return entries if memory limit is not enabled.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=298'>#298</a>: xdebug_var_dump() doesn't handle entity replacements correctly concerning string length.</dd>
<dd>Fixed a memory free error related to remote debugging conditions.  (Related to bug #297).</dd>


<dt>[2007-07-18] &mdash; Xdebug 2.0.0</dt>
<dd><h3>Changes</h3></dd>
<dd>Put back the disabling of stack traces - apperently people were relying on this. This brings back xdebug_enable(), xdebug_disable() and xdebug_is_enabled().</dd>
<dd>xdebug.collect_params is no longer a boolean setting. Although it worked fine, phpinfo() showed only just On or Off here.</dd>
<dd>Fixed the Xdebug version of raw_url_encode to not encode : and \. This is not necessary according to the RFCs and it makes debug breakpoints work on Windows.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=291'>#291</a>: Tests that use SPL do not skip when SPL is not available.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=290'>#290</a>: Function calls leak memory.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=289'>#289</a>: Xdebug terminates connection when eval() is run in the init stage.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=284'>#284</a>: Step_over on breakpointed line made Xdebug break twice.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=283'>#283</a>: Xdebug always returns $this with the value of last stack frame.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=282'>#282</a>: %s is not usable for xdebug.profiler_output_name on Windows in all stack frames.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=280'>#280</a>: var_dump() doesn't display key of array as expected.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=278'>#278</a>: Code Coverage Issue.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=273'>#273</a>: Remote debugging: context_get does not return context id.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=270'>#270</a>: Debugger aborts when PHP's eval() is encountered. </dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=265'>#265</a>: Xdebug breaks error_get_last() .</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=261'>#261</a>: Code coverage issues by overloading zend_assign_dim.</dd>

<dd><h3>DBGP</h3></dd>
<dd>Added support for "breakpoint_languages".</dd>


<dt>[2007-05-17] &mdash; Xdebug 2.0.0RC4</dt>
<dd><h3>Changes</h3></dd>
<dd>Use µ seconds instead of a tenths of µ seconds to avoid confusion in profile information.</dd>
<dd>Changed xdebug.profiler_output_name and xdebug.trace_output_name to use modifier tags:
<dl>
  <dt>%c</dt><dd>crc32 of the current working directory</dd>
  <dt>%p</dt><dd>pid</dd>
  <dt>%r</dt><dd>random number</dd>
  <dt>%s</dt><dd>script name</dd>
  <dt>%t</dt><dd>timestamp (seconds)</dd>
  <dt>%u</dt><dd>timestamp (microseconds)</dd>
  <dt>%H</dt><dd>$_SERVER['HTTP_HOST']</dd>
  <dt>%R</dt><dd>$_SERVER['REQUEST_URI']</dd>
  <dt>%S</dt><dd>session_id (from $_COOKIE if set)</dd>
  <dt>%%</dt><dd>literal %</dd>
</dl>
</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=255'>#255</a>: Call Stack Table doesn't show Location on Windows.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=251'>#251</a>: Using the source command with an invalid filename returns unexpected result.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=243'>#243</a>: show_exception_trace="0" ignored.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=241'>#241</a>: Crash in xdebug_get_function_stack().</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=240'>#240</a>: Crash with xdebug.remote_log on Windows.</dd>
<dd>Fixed a segfault in rendering stack traces to error logs.</dd>
<dd>Fixed a bug that prevented variable names from being recorded for remote debug session while xdebug.collect_vars was turned off.</dd>
<dd>Fixed xdebug_dump_superglobals() in case no super globals were configured.</dd>

<dd><h3>Removed functions</h3></dd>
<dd>Removed support for Memory profiling as that didn't work properly.</dd>
<dd>Get rid of xdebug.default_enable setting and associated functions: xdebug_disable() and xdebug_enable().</dd>

<dd><h3>Added features</h3></dd>
<dd>Implemented support for four different xdebug.collect_params settings for stack traces and function traces.</dd>
<dd>Allow to trigger profiling by the XDEBUG_PROFILE cookie.</dd>

<dd><h3>DBGP</h3></dd>
<dd>Correctly add namespace definitions to XML.</dd>
<dd>Added the xdebug namespace that adds extra information to breakpoints if available.</dd>
<dd>Stopped the use of <error> elements for exception breakpoints, as that violates the protocol.</dd>


<dt>[2007-01-31] &mdash; Xdebug 2.0.0RC3</dt>
<dd><h3>Changes</h3></dd>
<dd>Removed the bogus "xdebug.allowed_clients" setting - it was not implemented.</dd>
<dd>Optimized used variable collection by switching to a linked list instead of a hash. This is about 30% faster, but it needed a quick conversion to hash in the case the information had to be shown to remove duplicate variable names.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=232'>#232</a>: PHP log_errors functionality lost after enabling xdebug error handler when CLI is used.</dd>
<dd>Fixed problems with opening files - the filename could cause double free issues.</dd>
<dd>Fixed memory tracking as memory_limit is always enabled in PHP 5.2.1 and later.</dd>
<dd>Fixed a segfault that occurred when creating printable stack traces and collect_params was turned off.</dd>


<dt>[2006-12-24] &mdash; Xdebug 2.0.0RC2</dt>
<dd><h3>Added new features</h3></dd>
<dd>Implemented the "xdebug.var_display_max_children" setting. The default is set to 128 children.</dd>
<dd>Added types to fancy var dumping function.</dd>
<dd>Implemented FR #210: Add a way to stop the debug session without having to execute a script. The GET/POST parameter "XDEBUG_SESSION_STOP_NO_EXEC" works in the same way as XDEBUG_SESSION_STOP, except that the script will not be executed.</dd>
<dd>DBGP: Allow postmortem analysis.</dd>
<dd>DBGP: Added the non-standard function xcmd_profiler_name_get.</dd>

<dd><h3>Changes</h3></dd>
<dd>Fixed the issue where xdebug_get_declared_vars() did not know about variables there are in the declared function header, but were not used in the code. Due to this change expected arguments that were not send to a function will now show up as ??? in stack and function traces in PHP 5.1 and PHP 5.2.</dd>
<dd>Allow xdebug.var_display_max_data and xdebug.var_display_max_depth settings of -1 which will unlimit those settings.</dd>
<dd>DBGP: Sort super globals in Globals overview.</dd>
<dd>DBGP: Fixed a bug where error messages where not added upon errors in the protocol.</dd>
<dd>DBGP: Change context 1 from globals (superglobals + vars in bottom most stack frame) to just superglobals.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed linking error on AIX by adding libm.</dd>
<dd>Fixed dead code analysis for THROW.</dd>
<dd>Fixed oparray prefill caching for code coverage.</dd>
<dd>Fixed the xdebug.remote_log feature work.</dd>
<dd>DBGP: Fixed a bug where $this did not appear in the local scoped context.</dd>
<dd>DBGP: Reimplemented property_set to use the same symbol fetching function as property_get. We now only use eval in case no type (-t) argument was given.</dd>
<dd>DBGP: Fixed some issues with finding out the classname, which is important for fetching private properties.</dd>
<dd>DBGP: Fixed usage of uninitialized memory that prevented looking up numerical array keys while fetching array elements not work properly.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=228'>#228</a>: Binary safety for stream output and property fetches.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=227'>#227</a>: The SESSION super global does not show up in the Globals scope.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=225'>#225</a>: xdebug dumps core when protocol is GDB.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=224'>#224</a>: Compile failure on Solaris.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=219'>#219</a>: Memory usage delta in traces don't work on PHP 5.2.0.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=215'>#215</a>: Cannot retrieve nested arrays when the array key is a numeric index.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=214'>#214</a>: The depth level of arrays was incorrectly checked so it would show the first page of a level too deep as well.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=213'>#213</a>: Dead code analysis doesn't take catches for throws into account.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=211'>#211</a>: When starting a new session with a different idekey, the cookie is not updated.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=209'>#209</a>: Additional remote debugging session started when triggering shutdown function.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=208'>#208</a>: Socket connection attempted when XDEBUG_SESSION_STOP.</dd>
<dd>Fixed PECL bug #8989: Compile error with PHP 5 and GCC 2.95.</dd>


<dt>[2006-10-08] &mdash; Xdebug 2.0.0RC1</dt>

<dd><h3>Added new features</h3></dd>
<dd>Implemented FR #70: Provide optional depth on xdebug_call_* functions.</dd>
<dd>Partially implemented FR #50: Resource limiting for variable display. By default only two levels of nested variables and max string lengths of 512 are shown. This can be changed by setting the ini settings xdebug.var_display_max_depth and xdebug.var_display_max_data.</dd>
<dd>Implemented breakpoints for different types of PHP errors. You can now set an 'exception' breakpoint on "Fatal error", "Warning", "Notice" etc.  This is related to bug #187.</dd>
<dd>Added the xdebug_print_function_trace() function to display a stack trace on demand.</dd>
<dd>Reintroduce HTML tracing by adding a new tracing option "XDEBUG_TRACE_HTML" (4).</dd>
<dd>Made xdebug_stop_trace() return the trace file name, so that the following works: &lt;?php echo file_get_contents( xdebug_stop_trace() ); ?&gt;</dd>
<dd>Added the xdebug.collect_vars setting to tell Xdebug to collect information about which variables are used in a scope. Now you don't need to show variables with xdebug.show_local_vars anymore for xdebug_get_declared_vars() to work.</dd>
<dd>Make the filename parameter to the xdebug_start_trace() function optional. If left empty it will use the same algorithm to pick a filename as when you are using the xdebug.auto_trace setting.</dd>

<dd><h3>Changes</h3></dd>
<dd>Implemented dead code analysis during code coverage for: abstract methods, dead code after return, throw and exit, and implicit returns when a normal return is present.</dd>
<dd>Improved readability of stack traces.</dd>
<dd>Use PG(html_errors) instead of checking whether we run with CLI when deciding when to use HTML messages or plain text messages.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=203'>#203</a>: PHP errors with HTML content processed incorrectly. This patch backs out the change that was made to fix bug #182.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=198'>#198</a>: Segfault when trying to use a non-existing debug handler.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=197'>#197</a>: Race condition fixes created too many files.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=196'>#196</a>: Profile timing on Windows does not work.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=195'>#195</a>: CLI Error after debugging session.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=193'>#193</a>: Compile problems with PHP 5.2.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=191'>#191</a>: File/line breakpoints are case-sensitive on Windows.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=181'>#181</a>: Xdebug doesn't handle uncaught exception output correctly.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=173'>#173</a>: Coverage produces wrong coverage.</dd>
<dd>Fixed a typo that prevented the XDEBUG_CONFIG option "profiler_enable" from working.</dd>

<dt>[2006-06-30] &mdash; Xdebug 2.0.0beta6</dt>

<dd><h3>Added new features</h3></dd>
<dd>Implemented FR #137: feature_get for general commands doesn't have a text field.</dd>
<dd>Implemented FR #131: Xdebug needs to implement paged child object requests.</dd>
<dd>Implemented FR #124: Add backtrace dumping information when exception thrown.</dd>
<dd>Implemented FR #70: Add feature_get breakpoint_types.</dd>
<dd>Added profiling aggregation functions (patch by Andrei Zmievski)</dd>
<dd>Implemented the "timestamp" option for the xdebug.trace_output_name and xdebug.profiler_output_name settings.</dd>
<dd>Added the xdebug.remote_log setting that allows you to log debugger communication to a log file for debugging. This can also be set through the "remote_log" element in the XDEBUG_CONFIG environment variable.</dd>
<dd>Added a "script" value to the profiler_output_name option.  This will write the profiler output to a filename that consists of the script's full path (using underscores). ie: /var/www/index.php becomes var_www_index_php_cachegrind.out. (Patch by Brian Shire).</dd>
<dd>DBGp: Implemented support for hit conditions for breakpoints.</dd>
<dd>DBGp: Added support for conditions for file/line breakpoints.</dd>
<dd>DBGp: Added support for hit value checking to file/line breakpoints.</dd>
<dd>DBGp: Added support for "exception" breakpoints.</dd>
<dd><h3>Performance improvements</h3></dd>
<dd>Added a cache that prevents the code coverage functionality from running a "which code is executable check" on every function call, even if they were executed multiple times. This should speed up code coverage a lot.</dd>
<dd>Speedup Xdebug but only gathering information about variables in scopes when either remote debugging is used, or show_local_vars is enabled.</dd>
<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=184'>#184</a>: problem with control chars in code traces</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=183'>#183</a>: property_get -n $this->somethingnonexistent crashes the debugger.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=182'>#182</a>: Errors are not html escaped when being displayed.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=180'>#180</a>: collected includes not shown in trace files. (Patch by Cristian Rodriguez)</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=178'>#178</a>: $php_errormsg and Track errors unavailable.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=177'>#177</a>: debugclient fails to compile due to Bison.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=176'>#176</a>: Segfault using SplTempFileObject.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=173'>#173</a>: Xdebug segfaults using SPL ArrayIterator.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=171'>#171</a>: set_time_limit stack overflow on 2nd request.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=168'>#168</a>: Xdebug's DBGp crashes on an eval command where the result is an array.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=125'>#125</a>: show_mem_delta does not calculate correct negative values on 64bit machines.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=121'>#121</a>: property_get -n $r[2] returns the whole hash.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=111'>#111</a>: xdebug does not ignore set_time_limit() function during debug session.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=87'>#87</a>: Warning about headers when "register_shutdown_function" used.</dd>
<dd>Fixed PECL bug #6940 (Xdebug ignores set_time_limit)</dd>
<dd>Fixed Komodo bug 45484: no member data for objects in PHP debugger.</dd>
<dd>Suppress NOP/EXT_NOP from being marked as executable code with Code Coverage.</dd>


<dt>[2005-12-31] &mdash; Xdebug 2.0.0beta5</dt>
<dd><h3>Added new features</h3></dd>
<dd>Implemented FR #161: var_dump doesn't show lengths for strings.</dd>
<dd>Implemented FR #158: Function calls from the {main} scope always have the line number 0. </dd>
<dd>Implemented FR #156: it's impossible to know the time taken by the last func call in xdebug trace mode 0.</dd>
<dd>Implemented FR #153: xdebug_get_declared_vars().</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed shutdown crash with ZTS on Win32</dd>
<dd>Fixed bad memory leak when a E_ERROR of exceeding memory_limit was thrown.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=154'>#154</a>: GCC 4.0.2 optimizes too much out with -O2.</dd>
<dd>Fixed bug <a href='https://bugs.xdebug.org/view.php?id=141'>#141</a>: Remote context_get causes segfault.</dd>


<dt>[2004-11-29]</dt>

<dd><h3>Added new features</h3></dd>
<dd>DBGP: Added error messages to returned errors (in most cases)</dd>

<dd><h3>Added new functions</h3></dd>
<dd>xdebug_debug_zval() to debug zvals by printing its refcounts and is_ref values.</dd>

<dd><h3>Changed features</h3></dd>
<dd>xdebug_code_coverage_stop() will now clean up the code coverage array, unless you specify FALSE as parameter.</dd>
<dd>The proper Xdebug type is "hash" for associative arrays.</dd>
<dd>Extended the code-coverage functionality by returning lines with executable code on them, but where not executed with a count value of -1.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>DBGP: Make property_get and property_value finally work as they should, including retrieving information from different depths then the most top stack frame.</dd>
<dd>DBGP: Fix eval'ed $varnames in property_get.</dd>
<dd>DBGP: Support the -d option for property_get.</dd>
<dd>Fixed the exit handler hook to use the new "5.1" way of handling it; which fortunately also works with PHP 5.0.</dd>
<dd>Fixed <?= bug(102); ?>: Problems with configure for automake 1.8.</dd>
<dd>Fixed <?= bug(101); ?>: crash with set_exeception_handler() and uncatched exceptions.</dd>
<dd>Fixed <?= bug(99); ?>: unset variables return the name as a string with property_get.</dd>
<dd>Fixed <?= bug(98); ?>: 'longname' attribute not returned for unintialized property in context_get request.</dd>
<dd>Fixed <?= bug(94); ?>: xdebug_sprintf misbehaves with x86_64/glibc-2.3.3</dd>
<dd>Fixed <?= bug(93); ?>: Crash in lookup_hostname on x86_64</dd>
<dd>Fixed <?= bug(92); ?>: xdebug_disable() doesn't disable the exception handler.</dd>
<dd>Fixed <?= bug(68); ?>: Summary not written when script ended with "exit()".</dd>


<dt>[2004-09-15]</dt>

<dd><h3>Added new features</h3></dd>
<dd>Added support for the new DBGp protocol for communicating with the debug
engine.</dd>
<dd>A computerized trace format for easier parsing by external programs.</dd>
<dd>The ability to set remote debugging features via the environment.  This
allows an IDE to emulate CGI and still pass the configuration through to the
debugger.  In CGI mode, PHP does not allow -d arguments.</dd>
<dd>Reimplementation of the tracing code, you can now only trace to file; this
greatly enhances performance as no string representation of variables need to
be kept in memory any more.</dd>
<dd>Re-implemented profiling support. Xdebug outputs information the same way
that cachegrind does so it is possible to use Kcachegrind as front-end.</dd>
<dd>Xdebug emits warnings when it was not loaded as a Zend extension.</dd>
<dd>Added showing private, protected and public to the fancy var_dump()
replacement function.</dd>
<dd>Added the setting of the TCP_NODELAY socket option to stop delays in
transferring data to the remote debugger client. (Patch by Christof J.  Reetz)</dd>
<dd>DebugClient: Added setting for port to listen on and implemented running
the previous command when pressing just enter.</dd>

<dd><h3>Added new functions</h3></dd>
<dd>xdebug_get_stack_depth() to return the current stack depth level.  </dd>
<dd>xdebug_get_tracefile_name() to retrieve the name of the tracefile. This is useful in case auto trace is enabled and you want to clean the trace file.  </dd>
<dd>xdebug_peak_memory_usage() which returns the peak memory used in a script. (Only works when --enable-memory-limit was enabled) </dd>

<dd><h3>Added feature requests</h3></dd>
<dd>FR #5: xdebug_break() function which interupts the script for the debug engine.  </dd>
<dd>FR #30: Dump current scope information in stack traces on error.  </dd>
<dd>FR #88: Make the url parameter XDEBUG_SESSION_START optional. So it can be disabled and the user does not need to add it.  </dd>

<dd><h3>Added new php.ini settings</h3></dd>
<dd>xdebug.auto_trace_file: to configure a trace file to write to as addition to the xdebug.auto_trace setting which just turns on tracing.  </dd>
<dd>xdebug.collect_includes: separates collecting names of include files from the xdebug.collect_params setting.  </dd>
<dd>xdebug.collect_return: showing return values in traces.  </dd>
<dd>xdebug.dump_global: with which you can turn off dumping of super globals even in you have that configured.  </dd>
<dd>xdebug.extended_info: turns off the generation of extended opcodes that are needed for stepping and breakpoints for the remote debugger. This is useful incase you want to profile memory usage as the generation of this extended info increases memory usage of oparrrays by about 33%.  </dd>
<dd>xdebug.profiler_output_dir: profiler output directory.  </dd>
<dd>xdebug.profiler_enable: enable the profiler.  </dd>
<dd>xdebug.show_local_vars: turn off the showing of local variables in the top most stack frame on errors.  </dd>
<dd>xdebug.show_mem_delta: show differences between current and previous memory usage on a function call level.  </dd>
<dd>xdebug.trace_options: to configure extra options for trace dumping: o XDEBUG_TRACE_APPEND option (1) </dd>

<dd><h3>Changed features</h3></dd>
<dd>xdebug_start_trace() now returns the filename of the tracefile (.xt is added to the requested name).  </dd>
<dd>Changed default debugging protocol to dbgp instead of gdb.  </dd>
<dd>Changed default debugger port from 17869 to 9000.  </dd>
<dd>Changed trace file naming: xdebug.trace_output_dir is now used to configure a directory to dump automatic traces; the trace file name now also includes the pid (xdebug.trace_output_name=pid) or a crc32 checksum of the current working dir (xdebug.trace_output_name=crc32) and traces are not being appended to an existing file anymore, but simply overwritten.  </dd>
<dd>Removed $this and $GLOBALS from showing variables in the local scope.  </dd>

<dd><h3>Removed functions</h3></dd>
<dd>xdebug_get_function_trace/xdebug_dump_function_trace() because of the new idea of tracing.</dd>

<dd><h3>Fixed bugs</h3></dd>
<dd>Fixed <?= bug(89); ?>: var_dump shows empty strings garbled.  </dd>
<dd>Fixed <?= bug(85); ?>: Xdebug segfaults when no idekey is set.  </dd>
<dd>Fixed <?= bug(83); ?>: More than 32 parameters functions make xdebug crash.  </dd>
<dd>Fixed <?= bug(75); ?>: xdebug's var_dump implementation is not binary safe.  </dd>
<dd>Fixed <?= bug(73); ?>: komodo beta 4.3.7 crash.  </dd>
<dd>Fixed <?= bug(72); ?>: breakpoint_get returns wrong structure.  </dd>
<dd>Fixed <?= bug(69); ?>: Integer overflow in cachegrind summary.  </dd>
<dd>Fixed <?= bug(67); ?>: Filenames in Xdebug break URI RFC with spaces.  </dd>
<dd>Fixed <?= bug(64); ?>: Missing include of xdebug_compat.h.  </dd>
<dd>Fixed <?= bug(57); ?>: Crash with overloading functions.  </dd>
<dd>Fixed <?= bug(54); ?>: source command did not except missing -f parameter.  </dd>
<dd>Fixed <?= bug(53); ?>: Feature get misusing the supported attribute.  </dd>
<dd>Fixed <?= bug(51); ?>: Only start a debug session if XDEBUG_SESSION_START is passed as GET or POST parameter, or the DBGP_COOKIE is send to the server.  Passing XDEBUG_SESSION_STOP as GET/POST parameter will end the debug session and removes the cookie again. The cookie is also passed to the remote handler backends; for DBGp it is added to the <init> packet.  </dd>
<dd>Fixed <?= bug(49); ?>: Included file's names should not be stored by address.  </dd>
<dd>Fixed <?= bug(44); ?>: Script time-outs should be disabled when debugging.  </dd>
<dd>Fixed <?= bug(36); ?>: GDB handler using print causes segfault with wrong syntax </dd>
<dd>Fixed <?= bug(33); ?>: Implemented the use of the ZEND_POST_DEACTIVATE hook. Now we can handle destructors safely too.  </dd>
<dd>Fixed <?= bug(32); ?>: Unusual dynamic variables cause xdebug to crash.  </dd>


<dt>[2003-12-26]</dt>

<dd>GDB: Added file/line to signals.</dd>
<dd>Fixed logging to adhere to the error_reporting setting.</dd>
<dd>Fixed <?= bug(32); ?>: Unusual dynamic variables cause xdebug to
crash.</dd>
<dd>Fixed <?= bug(31); ?>: &amp; entity replaced after others, wrong HTML
output.</dd>
<dd>Fixed <?= bug(22); ?>: Segmentation fault with
<i><a href='docs.php#xdebug_get_function_stack'>xdebug_get_function_stack()</a></i>
and collect_params=1.</dd>

<dt>[2003-11-08]</dt>

<dd>Added version info to handlers which show in phpinfo() output.</dd>
<dd>GDB: Fixed bug with continuing after breakpoint where only 'cont'
worked.</dd>
<dd>GDB: Fixed bug in deleting absolute breakpoints on Windows.</dd>
<dd>Fixed <?= bug(27); ?>: Repeated connect attempts when no debugger is
listening.</dd>
<dd>Fixed <?= bug(19); ?>: The value of xdebug.output_dir in a .htaccess
never takes effect.</dd>
<dd>Fixed <?= bug(18); ?>: Mistyped sizeof()'s for array indexes in profiler
output.</dd>
<dd>Fixed handling stack traces for when display_errors was set to Off.</dd>
<dd>Fixed segfault where a function name didn't exist in case of a
"call_user_function".</dd>
<dd>Fixed reading a filename in case of an callback to a PHP function from an
internal function (like "array_map()").</dd>

<dt>[2003-09-18]</dt>
<dd>Fixed bug with wrong file names for functions called from call_user_*().</dd>

<dt>[2003-08-30]</dt>
<dd>Added the option "dump_superglobals" to the remote debugger. If you set
this option to 0 the "show-local" and similar commands will not return any data
from superglobals anymore.</dd>

<dt>[2003-08-30]</dt>
<dd>Fixed bug <a
href='https://bugs.xdebug.org/bug_view_page.php?bug_id=0000002'>#2</a>: "pear
package" triggers a segfault.</dd> <dd>Fixed crash bug when a function had
sprintf style parameters (ie.  strftime()).</dd>

<dt>[2003-07-16]</dt>
<dd>Added "id" attribute to &lt;var /&gt; elements in responses from the remove
debugger when the response method is XML. This makes it possible to distinguish
between unique elements by use of recursion for example.</dd>
<dd>Greatly cut down on the overhead that Xdebug causes on running scripts.</dd>
<dd>Fixed a bug with "quit" that would disable the extension.</dd>
<dd>Fixed a bug in the folding of recursive elements.</dd>

<dt>[2003-07-03]</dt>
<dd>Implemented an argument to the "bt" command. If this is set to "full" all
local variables for a stack frame are showed too.</dd>

<dt>[2003-06-28]</dt>
<dd>Updated licence: "PHP Licence" was renamed to "Xdebug Licence",
"The PHP Group" to "Derick Rethans" and "PHP" to "Xdebug".</dd>
<dd>Added the <i><a href='docs.php#xdebug_time_index'>xdebug_time_index()</a></i>
function which returns the time index since the start of the script.</dd>

<dt>[2003-06-23]</dt>
<dd>Updated licence: "PHP Licence" was renamed to "Xdebug Licence",
"The PHP Group" to "Derick Rethans" and "PHP" to "Xdebug".</dd>
<dd>Implemented the "show-breakpoints" command which shows all currently
active breakpoints including conditions.</dd>

<dt>[2003-05-14]</dt>
<dd>Implemented the "show-local" command (shows all local variables in the
current scope including all contents) and conditions for breakpoints in the
"break" command.</dd>

<dt>[2003-04-27]</dt>
<dd>Added a fancy replacement function for <a
href='docs.php#var_dump'>var_dump</a></i> which overloads the standard PHP
function while HTML errors are enabled.</dd>

<dt>[2003-04-21]</dt>
<dd>Added the <i><a href='docs.php#xdebug_call_class'>xdebug_call_class</a></i>
function as addition to <i><a
href='docs.php#xdebug_call_function'>xdebug_call_function</a></i>.</dd>

<dt>[2003-04-19]</dt>
<dd>Re-implemented the <a href='docs-settings.php#max_nesting_level'>maximum
nesting level protection</a>.</dd>

<dt>[2003-04-18]</dt>
<dd>Turned off <a href='docs-settings.php#collect_params'>xdebug.collect_params
by default</a>.</dd>
<dd>Fix problems with symbols on MacOSX.</dd>

<dt>[2003-04-14]</dt>
<dd>Fixed handling pathnames and files under Windows for the debugger.</dd>

<dt>[2003-04-10]</dt>
<dd>Fixed accessing of superglobal variables from the debugger client.</dd>

<dt>[2003-04-06]</dt>
<dd>Fixed a segfault that happened while dealing with include files with ZE2.</dd>

<dt>[2003-04-05]</dt>
<dd>Allow remote debugging to be enabled in httpd.conf and .htaccess files.</dd>
<dd>Added code coverage, enable with <i><a
href='docs.php#xdebug_start_code_coverage'>xdebug_start_code_coverage()</a></i>,
disable with <i><a
href='docs.php#xdebug_stop_code_coverage'>xdebug_stop_code_coverage()</a></i>
and get the information with <i><a
href='docs.php#xdebug_get_code_coverage'>xdebug_get_code_coverage()</a></i>.
The latter returns an array with each element being an array containing the
lines and the number of times a statement was run on that line, per executed
file.</dd>

<dt>[2003-02-14]</dt>
<dd>Added dumping of super globals when an error occurs.</dd>

<dt>[2003-01-27]</dt>
<dd>Added an XML transport layer for the remote debugger.</dd>

<dt>[2003-01-22]</dt>
<dd>Fixed handling of 'continue' (in addition to 'cont').</dd>

<dt>[2003-01-14]</dt>
<dd>Updated Xdebug to support Zend Engine 2 (PHP 5.0.0-dev).</dd>

<dt>[2003-01-07]</dt>
<dd>Implemented the "eval" (evalutes PHP code) to the remote debugger.</dd>

<dt>[2003-01-05]</dt>
<dd>Enabled support for Windows again.</dd>directing profiling output to

<dt>[2002-12-20]</dt>
<dd>Fixed the "init" state of the debugger, from now on you can print data
(like environment variables) from this state.</dd>
<dd>The array returned by get_function_trace() now includes the memory
footprint and timing information.</dd>

<dt>[2002-12-08]</dt>
<dd>Automatic profiling added, including redirecting profiling output to
disk.</dd>

<dt>[2002-11-29]</dt>
<dd>Added a new profiling mode: Stack-Dump.</dd>

<dt>[2002-11-27]</dt>
<dd>Basic profiling added to Xdebug, including three new functions:
xdebug_start_profiling() that begins profiling process, xdebug_stop_profiling()
that ends the profiling process and xdebug_dump_function_trace() that dumps the
profiling data.</dd>

<dt>[2002-11-15]</dt>
<dd>Implemented the "kill" (kills the running script) and "delete" (deletes
an already set breakpoint) command for the remote debugger.</dd>

<dt>[2002-11-13]</dt>
<dd>Parameters to functions are no longer recorded by default; use the
  xdebug.collect_params=1 setting in php.ini to turn it on again.</dd>

<dt>[2002-11-12]</dt>
<dd>Made the xdebug server and client working under Windows.</dd>

<dt>[2002-11-09]</dt>
<dd>Implemented the "next" (step over) and "finish" (step out) commands
for the remote debugger.</dd>

<dt>[2002-11-07]</dt>
<dd>Lots of small bugfixes, under them memory leaks and crash bugs.</dd>

<dt>[2002-11-03]</dt>
<dd>Implemented the "list" (source listing), "print" (printing variable
contents), "show" (show all variables in the scope), "step" (step through
execution) and "pwd" (print working directory) commands to the remote
debugger.</dd>

<dt>[2002-10-29]</dt>
<dd>Implemented class::method, object-&gt;method and file.ext:line style
  breakpoints.</dd>
<dd>Changed debugger port from 7869 to 17869.</dd>

<dt>[2002-10-28]</dt>
<dd>Added xdebug.collect_params setting. If this setting is on (the default)
  then Xdebug collects all parameters passed to functions, otherwise they
  are not collected at all.</dd>
<dd>Implemented correct handling of include/require and eval.</dd>

<dt>[2002-10-22]</dt>
<dd>Fixed bug which caused wrong filenames to be reported.</dd>

<dt>[2002-10-18]</dt>
<dd>Added automatic starting of function traces (xdebug.auto_trace, defaulting to
  "off").</dd>
<dd>Xdebug no longer supports PHP versions below PHP 4.3.0pre1.</dd>
<dd>Added gdb compatible debugger handler with support for simple (function only)
  breakpoints.</dd>

<dt>[2002-09-16]</dt>
<dd>Fixed bug with argument lists.</dd>

<dt>[2002-09-04]</dt>
<dd>Implemented remote debugger handler abstraction.</dd>
<dd>Added a php3 compatible debugger handler.</dd>

<dt>[2002-09-01]</dt>
<dd>Fixed memory footprint readings by not counting memory used by xdebug.</dd>

<dt>[2002-08-30]</dt>
<dd>Implemented gathering of parameters to internal functions. (Only works
with recent PHP 4.3.0-dev versions!)</dd>

<dt>[2002-08-28]</dt>
<dd>Bugs, better performance and update of the xdebug_get_function_trace().</dd>

<dt>[2002-08-27]</dt>
<dd>Add much better routine for getting data from Zend.</dd>

<dl>
<dt>[2002-06-23]</dt>
<dd>Xdebug no longer relies on PHP's output buffering mechanism. This caused
  problems with PEAR.</dd>

<dt>[2002-06-16]</dt>
<dd>Added PECL package.xml file to make xdebug <a href="#pecl">installable</a>
  by PEAR.</dd>
<dd>Flush the log file after every line during function tracing to file.</dd>
<dd>Removed the xdebug_* functions from the returned/showed function stracks
  and traces.</dd>

<dt>[2002-06-09]</dt>
<dd>Rewrote xdebug_get_function_stack() and xdebug_get_function_trace() to return
  data in multidimensional arrays.</dd>

<dt>[2002-06-06]</dt>
<dd>Add support for classnames, variable include files and variable function
  names.</dd>
<dd>Implemented links to the PHP Manual in traces.</dd>
<dd>Added timestamps and memory usage to function traces</dd>

<dt>[2002-06-02]</dt>
<dd>Fixed a crash when using user defined session handlers.</dd>

<dt>[2002-05-29]</dt>
<dd>Implemented variable function names.</dd>

<dt>[2002-05-26]</dt>
<dd>Unify showing unknown data.</dd>

<dt>[2002-05-25]</dt>
<dd>Implemented much better parameter tracing for user defined
  functions.</dd>

<dt>[2002-05-18]</dt>
<dd>Renamed xdebug_get_function_trace() to xdebug_dump_function_trace().</dd>
<dd>Implemented new xdebug_get_function_trace() to return the function trace in
  an array.</dd>
<dd>Added a parameter to xdebug_start_trace(). When this parameter is used,
  xdebug will dump a function trace to the filename which this parameter
  speficies.Fixed functions as parameters to functions</dd>

<dt>[2002-05-17]</dt>
<dd>Fixed functions as parameters to functions</dd>

<dt>[2002-05-15]</dt>
<dd>Fix logging to the systemlog</dd>

<dt>[2002-05-14]</dt>
<dd>Make xdebug respect the value of the error_reporting setting</dd>

<dt>[2002-05-12]</dt>
<dd>Added handling single-dimensional constant arrays as parameter to functions</dd>

<dt>[2002-05-11]</dt>
<dd>Implemented function traces (xdebug_start_trace(), xdebug_stop_trace() and
  xdebug_get_function_trace())</dd>
<dd>Added support for Windows to xdebug</dd>

<dt>[2002-05-08]</dt>
<dd>Implemented handling of static method calls (foo::bar())</dd>

<dt>[2002-05-07]</dt>
<dd>Implemented correct handling of include(), require() and eval()</dd>

<dt>[2002-05-06]</dt>
<dd>Fix removal of elements from the stack</dd>

<dt>[2002-05-03]</dt>
<dd>Added ini_settings and functions to disable and enable showing stacktraces from within your PHP script</dd>

<dt>[2002-05-02]</dt>
<dd>Added xdebug_memory_usage() which returns the amount of memory used by the PHP script</dd>
</dl>

<br /><br />
