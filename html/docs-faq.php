<?php $title = "Xdebug: Documentation - FAQ"; include "include/header.php"; hits ('xdebug-docs-faq'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - FAQ</span><br />

<?php include "include/menu-docs.php"; ?>

<span class="sans">USING XDEBUG</span>
<dl class="faq">
<dt>Q: phpinfo() reports that Xdebug is installed and enabled, yet I
still don't get any stacktraces when an error happens.
</dt>
<dd>A: You have to search through all your PHP libraries and include files for any
"set_error_handler" calls. If there are any, you have to either comment it out,
or change the body of the handler function to call xdebug_* api functions.
</dd>

</dl>


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
