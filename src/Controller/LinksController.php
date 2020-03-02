<?php
namespace XdebugDotOrg\Controller;

class LinksController
{
	const LINKS = [
		'giftlist' => 'http://www.amazon.co.uk/exec/obidos/registry/SLCB276UZU8B',

		'xdebug060' => 'http://files.derickrethans.nl/xdebug-0.6.0.tar.gz',
		'xdebug070' => 'http://files.derickrethans.nl/xdebug-0.7.0.tar.gz',

		'xdebug080' => 'http://files.derickrethans.nl/xdebug-0.8.0.tar.gz',
		'xdebug080-421-lnx' => 'http://files.derickrethans.nl/xdebug-4.2.1-0.8.0.so',
		'xdebug080-421-win' => 'http://files.derickrethans.nl/xdebug-4.2.1-0.8.0.dll',
		'xdebug080-430-lnx' => 'http://files.derickrethans.nl/xdebug-4.3.0-0.8.0.so',
		'xdebug080-430-win' => 'http://files.derickrethans.nl/xdebug-4.3.0-0.8.0.dll',

		'xdebug090' => 'http://files.derickrethans.nl/xdebug-0.9.0.tar.gz',
		'xdebug090-421-lnx' => 'http://files.derickrethans.nl/xdebug-4.2.1-0.9.0.so',
		'xdebug090-421-win' => 'http://files.derickrethans.nl/xdebug-4.2.1-0.9.0.dll',
		'xdebug090-430-lnx' => 'http://files.derickrethans.nl/xdebug-4.3.0-0.9.0.so',
		'xdebug090-430-win' => 'http://files.derickrethans.nl/xdebug-4.3.0-0.9.0.dll',

		'xdebug100rc1' => 'http://files.derickrethans.nl/xdebug-1.0.0rc1.tgz',
		'xdebug100rc1-422-lnx' => 'http://files.derickrethans.nl/xdebug-4.2.2-1.0.0rc1.so',
		'xdebug100rc1-422-win' => 'http://files.derickrethans.nl/xdebug-4.2.2-1.0.0rc1.dll',
		'xdebug100rc1-422-f46' => 'http://files.derickrethans.nl/xdebug-4.2.2-1.0.0rc1-fbsd46.so',
		'xdebug100rc1-430-lnx' => 'http://files.derickrethans.nl/xdebug-4.3.0-1.0.0rc1.so',
		'xdebug100rc1-430-win' => 'http://files.derickrethans.nl/xdebug-4.3.0-1.0.0rc1.dll',
		'xdebug100rc1-430-f46' => 'http://files.derickrethans.nl/xdebug-4.3.0-1.0.0rc1-fbsd46.so',

		'xdebug110pre2' => 'http://files.derickrethans.nl/xdebug-1.1.0pre2.tgz',

		'xdebug110' => 'http://files.derickrethans.nl/xdebug-1.1.0.tgz',
		'xdebug110-430pre2-lnx' => 'http://files.derickrethans.nl/xdebug-4.3.0pre2-1.1.0-lnx.so',
		'xdebug110-430pre2-f46' => 'http://files.derickrethans.nl/xdebug-4.3.0pre2-1.1.0-fbsd46.so',
		'xdebug110-430dev-lnx' => 'http://files.derickrethans.nl/xdebug-4.3.0dev-1.1.0-lnx.so',
		'xdebug110-430dev-win' => 'http://files.derickrethans.nl/xdebug-4.3.0dev-1.1.0.dll',
		'xdebug110-430dev-f46' => 'http://files.derickrethans.nl/xdebug-4.3.0dev-1.1.0-fbsd46.so',

		'xdebug120rc1' => 'http://files.derickrethans.nl/xdebug-1.2.0rc1.tgz',
		'xdebug120rc2' => 'http://files.derickrethans.nl/xdebug-1.2.0rc2.tgz',
		'xdebug120'    => 'http://files.derickrethans.nl/xdebug-1.2.0.tgz',
		'xdebug120-43-lnx' => 'http://files.derickrethans.nl/xdebug-4.3.2-1.2.0-lnx.so',
		'xdebug120-43-win' => 'http://files.derickrethans.nl/xdebug-4.3.2-1.2.0-win32.dll',
		'xdebug120-43-mac' => 'http://files.derickrethans.nl/xdebug-4.3.2-1.2.0-macosx.so',

		'xdebug130rc1' => 'http://files.derickrethans.nl/xdebug-1.3.0rc1.tgz',
		'xdebug130-43-win' => 'http://files.derickrethans.nl/xdebug-4.3-1.3.0.dll',
		'xdebug130-50-win' => 'http://files.derickrethans.nl/xdebug-5.0-1.3.0.dll',

		'xdebug130' => 'http://files.derickrethans.nl/xdebug-1.3.0.tgz',

		'xdebug131' => 'http://www.xdebug.org/files/xdebug-1.3.1.tgz',
		'xdebug131-43-win' => 'http://www.xdebug.org/files/xdebug-4.3-1.3.1.dll',

		'xdebug132' => 'http://www.xdebug.org/files/xdebug-1.3.2.tgz',
		'xdebug132-43-win' => 'http://www.xdebug.org/files/xdebug-4.3-1.3.2.dll',

		'xdebug200b1' => 'http://www.xdebug.org/files/xdebug-2.0.0beta1.tgz',
		'xdebug200b1-43-win' => 'http://www.xdebug.org/files/xdebug-4.3.6-2.0.0beta1.dll',
		'xdebug200b1-50-win' => 'http://www.xdebug.org/files/xdebug-5.0-2.0.0beta1.dll',
		'xdebug200b1-51-win' => 'http://www.xdebug.org/files/xdebug-5.1-2.0.0beta1.dll',

		'xdebug200b2' => 'http://www.xdebug.org/files/xdebug-2.0.0beta2.tgz',

		'xdebug200b5' => 'http://www.xdebug.org/files/xdebug-2.0.0beta5.tgz',
		'xdebug200b5-4311-win' => 'http://www.xdebug.org/files/php_xdebug-4.3.11-2.0.0beta5.dll',
		'xdebug200b5-441-win' => 'http://www.xdebug.org/files/php_xdebug-4.4.1-2.0.0beta5.dll',
		'xdebug200b5-505-win' => 'http://www.xdebug.org/files/php_xdebug-5.0.5-2.0.0beta5.dll',
		'xdebug200b5-511-win' => 'http://www.xdebug.org/files/php_xdebug-5.1.1-2.0.0beta5.dll',

		'xdebug200b6' => 'http://www.xdebug.org/files/xdebug-2.0.0beta6.tgz',
		'xdebug200b6-4311-win' => 'http://www.xdebug.org/files/php_xdebug-4.3.11-2.0.0beta6.dll',
		'xdebug200b6-441-win' => 'http://www.xdebug.org/files/php_xdebug-4.4.1-2.0.0beta6.dll',
		'xdebug200b6-512-win' => 'http://www.xdebug.org/files/php_xdebug-5.1.2-2.0.0beta6.dll',

		'xdebug200rc1' => 'http://www.xdebug.org/files/xdebug-2.0.0RC1.tgz',
		'xdebug200rc1-4311-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc1-4.3.11.dll',
		'xdebug200rc1-441-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc1-4.4.1.dll',
		'xdebug200rc1-505-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc1-5.0.5.dll',
		'xdebug200rc1-512-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc1-5.1.2.dll',
		'xdebug200rc1-520-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc1-5.2.0.dll',

		'xdebug200rc2' => 'http://www.xdebug.org/files/xdebug-2.0.0RC2.tgz',
		'xdebug200rc2-441-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc2-4.4.1.dll',
		'xdebug200rc2-512-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc2-5.1.2.dll',
		'xdebug200rc2-521-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc2-5.2.1.dll',

		'xdebug200rc3' => 'http://www.xdebug.org/files/xdebug-2.0.0RC3.tgz',
		'xdebug200rc3-441-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc3-4.4.1.dll',
		'xdebug200rc3-512-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc3-5.1.2.dll',
		'xdebug200rc3-521-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc3-5.2.1.dll',

		'xdebug200rc4' => 'http://www.xdebug.org/files/xdebug-2.0.0RC4.tgz',
		'xdebug200rc4-441-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc4-4.4.1.dll',
		'xdebug200rc4-512-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc4-5.1.2.dll',
		'xdebug200rc4-521-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0rc4-5.2.1.dll',

		'xdebug200' => 'http://www.xdebug.org/files/xdebug-2.0.0.tgz',
		'xdebug200-446-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0-4.4.6.dll',
		'xdebug200-516-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0-5.1.6.dll',
		'xdebug200-522-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.0-5.2.2.dll',

		'xdebug201' => 'http://www.xdebug.org/files/xdebug-2.0.1.tgz',
		'xdebug201-441-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.1-4.4.1.dll',
		'xdebug201-512-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.1-5.1.2.dll',
		'xdebug201-521-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.1-5.2.1.dll',

		'xdebug202' => 'http://www.xdebug.org/files/xdebug-2.0.2.tgz',
		'xdebug202-44-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.2-4.4.6.dll',
		'xdebug202-51-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.2-5.1.7.dll',
		'xdebug202-52-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.2-5.2.5.dll',
		'xdebug202-53-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.2-5.3.0.dll',

		'xdebug203' => 'http://www.xdebug.org/files/xdebug-2.0.3.tgz',
		'xdebug203-51-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.3-5.1.7.dll',
		'xdebug203-52-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.3-5.2.5.dll',
		'xdebug203-53-win' => 'http://www.xdebug.org/files/php_xdebug-2.0.3-5.3.0.dll',

		'xdebug204' => 'http://www.xdebug.org/files/xdebug-2.0.4.tgz',

		'xdebugclient-0.7.0-lnx' => 'https://xdebug.org/download#dbgpClient',
		'xdebugclient-0.7.0-f46' => 'https://xdebug.org/download#dbgpClient',
		'xdebugclient-0.7.0-win' => 'https://xdebug.org/download#dbgpClient',

		'xdebugclient-0.7.3-lnx' => 'https://xdebug.org/download#dbgpClient',
		'xdebugclient-0.7.3-win' => 'https://xdebug.org/download#dbgpClient',
		'xdebugclient-0.8.0-win' => 'https://xdebug.org/download#dbgpClient',
		'xdebugclient-0.9.0-lnx' => 'https://xdebug.org/download#dbgpClient',
		'xdebugclient-0.9.0-win' => 'https://xdebug.org/download#dbgpClient',

		'snap-43-win' => 'http://www.xdebug.org/files/xdebug-4.3-2.0dev.dll',
		'snap-44-win' => 'http://www.xdebug.org/files/xdebug-4.4dev-2.0dev.dll',
		'snap-50-win' => 'http://snaps.php.net/win32/PECL_5_0/php_xdebug.dll',
		'snap-51-win' => 'http://snaps.php.net/win32/PECL_UNSTABLE/php_xdebug.dll',
		'snaps-win' => 'http://pecl4win.php.net/ext.php/php_xdebug.dll',
	];
}
