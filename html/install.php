<?php $title = "Xdebug: Installation"; include "include/header.php"; hits ('xdebug-install'); ?>
		<tr>
			<td>&nbsp;</td>
			<td><span class="serif">
			
<!-- MAIN FEATURE START -->

<span class="sans">XDEBUG EXTENSION FOR PHP | INSTALLATION</span><br />

<?php include "include/menu.php"; ?>

<span class="sans">PRECOMPILED MODULES</span><br />

<p>
There are a few precompiled modules for Windows, they are all for the non-debug
version of PHP.  See the links on the right side.
</p>
<p>
Installing the precompiled modules is easy. Just place them in a directory, and
add the following line to php.ini: (don't forget to change the path and
filename to the correct one)
<pre>
zend_extension_ts="c:/php/modules/xdebug-4.3-1.3.1.dll"
</pre>
</p>

<a name="pecl"></a>
<span class="sans">PECL INSTALLATION</span><br />

<p>
As of Xdebug 0.9.0 you can install Xdebug through PEAR/PECL. This only works
with the latest CVS version of PHP (with PEAR version 0.9.1-dev or higher
installed) and some UNIX.
</p>
<p>
Installing with PEAR/PECL is as easy as:
</p>
<pre>
# pear install xdebug
</pre>
<p>
but you still need to add the correct line to your php.ini: (don't forget to
change the path and filename to the correct one)
</p>
<pre>
zend_extension="/usr/local/php/modules/xdebug.so"
</pre>

<a name="source"></a>
<span class="sans">INSTALLATION FROM SOURCE</span><br />

<p>
You can download the source of the latest <b>stable</b> release <?php url ('xdebug131', 'here'); ?>.
Alternatively you can obtain Xdebug from CVS:
</p>
<pre>
cvs -d :pserver:srmread@cvs.xdebug.org:/repository login
CVS password: srmread
cvs -d :pserver:srmread@cvs.xdebug.org:/repository co xdebug
</pre>

<a name="compile"></a>
<span class="sans">COMPILING</span><br />

<p>
You compile Xdebug separately from the rest of PHP.  Note, however,
that you need access to the scripts "phpize" and "php-config".  If
your system does not have "phpize" and "php-config", you will need to
compile and install PHP from a source tarball first, as these script
are by-products of the PHP compilation and installation processes. It is
important that the source version matches the installed version as there are
slight, but important, differences between PHP versions.  For a detailed
installation on Mac OSX see <a
href='http://pressedpants.com/archives/dated/2004/04/08/xdebug_on_os_x/'>Jason
Perkins'</a> installation instructions.  Once you have access to "phpize" and
"php-config", do the following:
</p>
<p>
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
if php-config is not in your path).
<br /><br />
If this fails with something like:
<pre>../configure: line 1960: syntax error near unexpected token
`PHP_NEW_EXTENSION(xdebug,'
../configure: line 1960: `  PHP_NEW_EXTENSION(xdebug, xdebug.c
xdebug_code_coverage.c xdebug_com.c xdebug_handler_gdb.c
xdebug_handler_php3.c xdebug_handlers.c xdebug_llist.c xdebug_hash.c
xdebug_profiler.c xdebug_superglobals.c xdebug_var.c usefulstuff.c,
$ext_shared)'</pre> then it means that you do not meet the PHP 4.3.x version
requirement for Xdebug.
<br /><br />
Another problem that might occur is:
<pre>configure: line 1145: PHP_INIT_BUILD_SYSTEM: command not found
configure: line 1151: syntax error near unexpected token `config.nice'
configure: line 1151: `PHP_CONFIG_NICE(config.nice)'</pre> You will need to
upgrade your autotools (autoconf, automake and libtool) or install the known
working versions: autoconf-2.13, automake-1.5 and libtool-1.4.3.</p></li>

<li>make</li>

<li>cp modules/xdebug.so /to/wherever/you/want/it</li>

<li>add the following line to php.ini:
zend_extension="/wherever/you/put/it/xdebug.so" (for non-threaded use of PHP,
for example the CLI, CGI or Apache 1.3 module) or:
zend_extension_ts="/wherever/you/put/it/xdebug.so" (for threaded usage of PHP,
for example the Apache 2 work MPM or the the ISAPI module)</li>

<li>Restart your webserver.</li>

<li>Write a PHP page that calls "<i>phpinfo()</i>" Load it in a browser and
look for the info on the Xdebug module.  If you see it, you have been
successful!</li>
</ol>
</p>

<a name="compat"></a>
<span class="sans">COMPATIBILITY</span><br />
<p>
Xdebug does not work together with the Zend Optimizer or any other Zend
extension (DBG, APC, APD etc).  This is due to compatibility problems with
those modules. We will be working on figuring our what the problems are, and of
course try to fix those.
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
		<th class="ctr">4.3.1-4.3.5</th>
		<td class="ctr">20020918</td>
		<td class="ctr">20020429</td>
		<td class="ctr">20021010</td>
		<td class="ctr">1.3.1</td>
	</tr>
	<tr>
		<th class="ctr">&lt; 5.0.0rc2</th>
		<td class="ctr">20031113</td>
		<td class="ctr">20020429</td>
		<td class="ctr">90021012</td>
		<td class="ctr">1.3.1</td>
	</tr>
	<tr>
		<th class="ctr">=&gt; 5.0.0rc2</th>
		<td class="ctr">20031224</td>
		<td class="ctr">20040316</td>
		<td class="ctr">90021012</td>
		<td class="ctr">2.0.0-cvs</td>
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
