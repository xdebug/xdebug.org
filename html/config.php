<?php include "include/header.php"; hits ('xdebug-config'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | CONFIGURATION</span><br />

<?php include "include/menu.php"; ?>

<a name="functionality"></a>
<span class="sans">PHP.INI SETTINGS</span><br />

<p><i>(This information is currently not 100% updated)</i></p>

<dl>
<dt>xdebug.auto_trace (default: Off)</dt>

<dt>xdebug.collect_params (default: Off)</dt>

<dt>xdebug.default_enable (default: On)</dt>
<dd>If this setting is On then stacktraces will be shown by default. You can
disable showing stacktraces from your code with xdebug_disable().</dd>
</dl>

<dt>xdebug.manual_url (default: http://www.php.net)</dt>
<dd>This is the base url for the links from the function traces to the manual
pages.</dd>

<dt>xdebug.max_nesting_level (default: 64)</dt>
<dd>Controls the protection mechanism for infinite recursion protection. The
value of this setting is the maximum level of nested functions that are allowed
before the script will be aborted.</dd>

<dt>xdebug.remote_enable (default: Off)</dt>

<dt>xdebug.remote_handler (default: gdb)</dt>

<dt>xdebug.remote_host (default: localhost)</dt>

<dt>xdebug.remote_mode (default: req)</dt>

<dt>xdebug.remote_port (default: 17869)</dt>
</dl>

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
