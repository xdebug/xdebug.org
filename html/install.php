<?php $title = "Xdebug: Installation"; include "include/header.php"; hits ('xdebug-install'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | INSTALLATION</span><br />

<?php include "include/menu.php"; ?>

<span class="sans">PRECOMPILED MODULES</span><br />

<p>
There are a few precompiled modules, they are all for the non-debug version of
PHP.  See the links on the right side.
</p>
<p>
Installing the precompiled modules is easy. Just place them in a directory, and
add the following line to php.ini: (don't forget to change the path and
filename to the correct one)
<pre>
zend_extension="/usr/local/php/modules/xdebug-4.3.0-1.2.0.so"
</pre>
<p>
For Windows:
</p>
<pre>
zend_extension_ts="c:/php/modules/xdebug-4.3.0-1.2.0.dll"
</pre>
<p>
For MacOSX:
</p>
<pre>
zend_extension="/usr/local/php/modules/xdebug-4.3.0-1.2.0.bundle"
</pre>
</p>

<a name="pecl"></a>
<span class="sans">PECL INSTALLATION</span><br />

<p>
As of xdebug 0.9.0 you can install xdebug through PEAR/PECL. This only works
with the latest CVS version of PHP (with PEAR version 0.9.1-dev installed) and
some UNIX.
</p>
<p>
Installing with PEAR/PECL is as easy as:
</p>
<pre>
# pear install http://files.derickrethans.nl/xdebug-1.2.0.tgz
</pre>
<p>
but you still need to add the correct line to your php.ini: (don't forget to
change the path and filename to the correct one)
</p>
<pre>
zend_extension="/usr/local/php/modules/xdebug.so"
</pre>

<a name="source"></a>
<span class="sans">DOWNLOAD SOURCE</span><br />

<p>
You can download the source <?php url ('xdebug120', 'here'); ?>.
</p>
<p>
You compile xdebug separately from the rest of PHP.  Note, however,
that you need access to the scripts "phpize" and "php-config".  If
your system does not have "phpize" and "php-config", you will need to
compile and install PHP from a source tarball first, as these script
are by-products of the PHP compilation and installation processes. It is
important that the source version matches the installed version as there
are slight, but important, differences between PHP versions.
</p>
<p>
Once you have access to "phpize" and "php-config", do the following:
<ol>
<li>Unpack the tarball: tar -xzf xdebug-1.x.x.tgz.  Note that you do
not need to unpack the tarball inside the PHP source code tree.
Xdebug is compiled separately, all by itself, as stated above.</li>

<li>cd xdebug-1.x.x</li>

<li>Run phpize: phpize
(or /path/to/phpize if phpize is not in your path). See in the <a
href="#phpize">table below</a> which version numbers it should show for
different PHP versions.</li>

<li>./configure --enable-xdebug
(or:
./configure --enable-xdebug --with-php-config=/path/to/php-config
if php-config is not in your path). If this fails with something like:
<pre>../configure: line 1960: syntax error near unexpected token
`PHP_NEW_EXTENSION(xdebug,'
../configure: line 1960: `  PHP_NEW_EXTENSION(xdebug, xdebug.c
xdebug_code_coverage.c xdebug_com.c xdebug_handler_gdb.c
xdebug_handler_php3.c xdebug_handlers.c xdebug_llist.c xdebug_hash.c
xdebug_profiler.c xdebug_superglobals.c xdebug_var.c usefulstuff.c,
$ext_shared)'</pre> then it means that you do not meet the PHP 4.3.x version
requirement for Xdebug.</li>

<li>make</li>

<li>(Only on MacOSX:)<br />gcc -bundle -bundle_loader /path/to/sapi/cli/php *.o -o modules/xdebug.so</li>

<li>cp modules/xdebug.so /to/wherever/you/want/it</li>

<li>add the following line to php.ini:
zend_extension="/wherever/you/put/it/xdebug.so"</li>

<li>Restart your webserver.</li>

<li>Write a PHP page that calls "<i>phpinfo()</i>" Load it in a browser and
look for the info on the xdebug module.  If you see it, you have been
successful!</li>
</ol>
</p>

<a name="compat"></a>
<span class="sans">COMPATIBILITY</span><br />
<p>
Xdebug does not work when the Zend Optimizer is loaded due to limitations in
that module. If you want to use Xdebug with, or if you have other problems
getting Xdebug to work as Zend extension, you can use Xdebug as a normal PHP
extension instead. To make this work copy the .so (or .dll) into the PHP
extensions dir as configured in your php.ini and add the following to this
same php.ini file:
</p>
<pre>
extension=xdebug-4.3.0-1.2.0.so
</pre>
<p>
You will miss some functionality here, which is currently single-stepping
through PHP code from the remote debugger and the code-coverage functionality.
</p>


<a name="phpize"></a>
<span class="sans">PHPIZE OUTPUT TABLE</span><br />
<p>
<table border='1' cellspacing='0'>
	<tr>
		<th class="ctr">PHP Version:</th>
		<td class="ctr">PHP Api Version:</td>
		<td class="ctr">Zend Module Api No:</td>
		<td class="ctr">Zend Extension Api No:</td>
		<td class="ctr">Recommended version:</td>
	</tr>
	<tr>
		<th class="ctr">4.2.3</th>
		<td class="ctr">20010901</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20020429</td>
		<td class="ctr">1.0.0rc1</td>
	</tr>
	<tr>
		<th class="ctr">4.3.0pre2</th>
		<td class="ctr">20020307</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20021010</td>
		<td class="ctr">1.1.0pre2</td>
	</tr>
	<tr>
		<th class="ctr">4.3.0rc1</th>
		<td class="ctr">20020918</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20021010</td>
		<td class="ctr">1.1.0</td>
	</tr>
	<tr>
		<th class="ctr">4.3.0</th>
		<td class="ctr">20020918</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20021010</td>
		<td class="ctr">1.2.0</td>
	</tr>
	<tr>
		<th class="ctr">4.3.1</th>
		<td class="ctr">20020918</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20021010</td>
		<td class="ctr">1.2.0</td>
	</tr>
	<tr>
		<th class="ctr">4.3.2dev</th>
		<td class="ctr">20020918</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20021010</td>
		<td class="ctr">1.2.0</td>
	</tr>
	<tr>
		<th class="ctr">5.0.0dev</th>
		<td class="ctr">20020918</td>
		<td class="ctr">20020429</td>
		<td class="ctr">90021012</td>
		<td class="ctr">1.2.0</td>
	</tr>
</table>
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
