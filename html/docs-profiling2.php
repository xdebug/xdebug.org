<?php $title = "Xdebug: Documentation - Profiler - Xdebug 2"; include "include/header.php"; hits ('xdebug-docs-profiler2'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | DOCUMENTATION - PROFILER - XDEBUG 2</span><br />

<?php include "include/menu-docs.php"; ?>

<a name="introduction"></a>
<span class="sans">INTRODUCTION</span><br />

<p>Xdebug's Profiler is a powerful tool that gives you the ability to analyze
your PHP code and determine bottlenecks or generally see which parts of your
code are slow and could use a speed boost. The profiler in Xdebug 2 outputs
profiling information in the form of a cachegrind compatible file.  This allows
you to use the excellent KCacheGrind tool (Linux, KDE) to analyse your
profiling data.</p>

<a name="starting"></a>
<span class="sans">STARTING THE PROFILER</span><br />

<p>Profiling is enabled by setting the <a
href='docs-settings.php#profiler_enable'>xdebug.profiler_enable</a> setting to
1 in php.ini. This instructs Xdebug to start writing profiling information into
the dump directory configured with the <a
href='docs-settings.php#profiler_output_dir'>xdebug.profiler_output_dir</a>
directive. The name of the generated file always starts with
"<span class="filename">cachegrind.out.</span>" and ends with either the PID
(process ID) of the PHP (or Apache) process or the crc32 hash of .</p>

<a name="misc"></a>
<span class="sans">MISCELLANEOUS</span><br />
<p></p>

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
