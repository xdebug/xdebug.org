<?php $title = "Xdebug: Screenshots"; include "include/header.php"; ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<h1>Screenshots</h1>

<?php include "include/menu.php"; ?>

<a name="stack"></a>
<span class="sans">STACKTRACES</span><br />

<p>
The default PHP error handler is modified, so that the error message includes
information about the functions in the call stack together with the parameters,
as you can see in this screenshot:
</p>
<p>
<img align="center" src="images/xdebug_ss1.jpg">
</p>

<a name="function"></a>
<span class="sans">FUNCTIONTRACES</span><br />

<p>
Sample output from xdebug_dump_function_trace(), it shows all functions that
were called plus variables (in most cases):
</p>
<p>
<img align="center" src="images/xdebug_ss2.jpg">
</p>

<br /><br />

<!-- MAIN FEATURE END -->

			</td>
			<td>&nbsp;</td>
		</tr>
<?php include "include/footer.php"; ?>
