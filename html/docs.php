<?php include "include/header.php"; hits ('xdebug-docs'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION</span><br />

<?php include "include/menu.php"; ?>

<a name="functionality"></a>
<span class="sans">FUNCTIONS</span><br />

<p><i>(This information is currently not 100% updated)</i></p>

<dl>
<dt>array xdebug_get_function_stack()</dt>
<dd>Returns an array which resembles a stack trace</dd>

<dt>string xdebug_call_function()</dt>
<dd>The name of the caller function</dd>

<dt>string xdebug_call_file()</dt>
<dd>The file in which the caller function was run</dd>

<dt>int xdebug_call_line()</dt>
<dd>The line in the caller file from which the current function was started</dd>

<dt>void xdebug_enable()</dt>
<dd>Enable showing stacktraces from within your PHP code</dd>

<dt>void xdebug_disable()</dt>
<dd>Disable showing stacktraces from within your PHP code</dd>

<dt>bool xdebug_is_enabled()</dt>
<dd>Return whether stacktraces would be show in case of an error or not</dd>

<dt>void xdebug_start_trace([string trace_file])</dt>
<dd>Start tracing function calls from this point. If the trace_file parameter
is specified the function calls will also be logged to this file.</dd>

<dt>void xdebug_stop_trace()</dt>
<dd>Stop tracing function calls and destroy the trace currently in memory</dd>

<dt>void xdebug_get_function_trace()</dt>
<dd>Shows the function calls since xdebug_start_trace(). You can find an
example of such a trace above</dd>

<dt>int xdebug_memory_usage()</dt>
<dd>Returns the memory footprint of the current script. (Only works when PHP
was compiled with --enable-memory-limit).</dd>
</dl>
</p>


<br /><br />

<!-- MAIN FEATURE END -->

			</class></td>
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
