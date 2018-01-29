<?php
class xdebugVersion
{
	static public $latestVersion = '2.6.0';
	static public $latestWindowsVersion = '2.6.0';

	function __construct()
	{
		$this->version = $this->ts = $this->debug = $this->windows = false;
		$this->phpApi = $this->zendApi = false; $this->configFile = false;
		$this->configPath = $this->extensionDir = $this->sapi = false;
		$this->tarDir = $this->xdebugVersion = false;
		$this->winCompiler= 9; $this->architecture = 'x86';
		$this->zendServer = false;
		$this->xdebugAsZendExt = $this->xdebugAsPhpExt = false;
	}

	function analyse( $data )
	{
		$html = false;
		if ( strpos( $data, 'extension_dir</td>' ) !== false )
		{
			$html = true;
			$htmlData = $data;
		}
		$data = strip_tags( $data );
		$data = str_replace( '&nbsp;', ' ', $data );
		ini_set('xdebug.var_display_max_data', 633333 );

		if ( preg_match( '/Zend Extension Manager/', $data ) )
		{
			$this->zendServer = true;
		}
		if ( preg_match( '/Server API([ =>\t]*)(.*)/', $data, $m ) )
		{
			$this->sapi = trim( $m[2] );
		}

		if ( preg_match( '/PHP Version([^457]+)([457][0-9.dev-]+)/', $data, $m ) )
		{
			$this->version = $m[2];
		}

		// Zend Extension check
		if ( preg_match( '/with\sXdebug\sv([0-9.RCrcdevalphabeta-]+),/', $data, $m ) )
		{
			$this->xdebugVersion = $m[1];
			$this->xdebugAsZendExt = true;
		}
		// Xdebug as normal php ext
		if ( preg_match( '/xdebug support/', $data, $m ) )
		{
			$this->xdebugAsPhpExt = true;
		}

		if ( preg_match( '/Thread Safety([ =>\t]+)(disabled|enabled)/', $data, $m ) )
		{
			$this->ts = $m[2] == 'enabled';
		}

		if ( preg_match( '/Debug Build([ =>\t]+)(yes|no)/', $data, $m ) )
		{
			$this->debug = $m[2] == 'yes';
		}

		if ( preg_match( '/System([ =>\t]+)Windows/', $data, $m ) )
		{
			$this->windows = true;
		}
		// windows 32/64 bit
		if ( preg_match( '/Architecture([ =>\t]*)(x[0-9]*)/', $data, $m ) )
		{
			$this->architecture = $m[2];
		}

		// for 4.4 and 5.1
		if ( preg_match( '/PHP Extension([ =>\t]*)([0-9]*)/', $data, $m ) )
		{
			$this->phpApi = $m[2];
		}
		if ( preg_match( '/Zend Extension([ =>\t]*)([0-9]*)/', $data, $m ) )
		{
			$this->zendApi = $m[2];
		}

		// paths
		if ( preg_match( '/Loaded Configuration File([ =>\t]*)(.*)/', $data, $m ) )
		{
			$file = trim( $m[2] );
			if ( $file == '(none)' )
			{
				$file = false;
			}
			$this->configFile = $file;
		}
		if ( preg_match( '/Configuration File \(php.ini\) Path([ =>\t]*)(.*)/', $data, $m ) )
		{
			$file = trim( $m[2] );
			if ( $file == '(none)' )
			{
				$file = false;
			}
			$this->configPath = $file;
		}
		if ( $html )
		{
			if ( preg_match( '@extension_dir</td><td[^>]+>(.*?)</td><td[^>]+>(.*?)</td>@', $htmlData, $m ) )
			{
				$this->extensionDir = $m[2];
			}
		}
		else 
		{
			if (preg_match( '/extension_dir =>(.*)=>/', $data, $m ) )
			{
				$this->extensionDir = trim( $m[1] );
			}
			else if (preg_match( '/extension_dir\s(.*)/', $data, $m ) )
			{
				// It's tricky as this is all reliant on the browser
				$m[1] = trim( $m[1] );
				$len = strlen( $m[1] );
				if ( ( $len % 2 == 1 ) && (($m[1][(int) floor($len / 2)] == ' ') || ($m[1][(int) floor($len / 2)] == "\t")) ) {
					$this->extensionDir = trim( substr( $m[1], 0, (int) floor($len / 2) ) );
				}
			}
		}
		$this->extensionDir = str_replace( '&nbsp;', ' ', $this->extensionDir );

		if ( preg_match( '/PHP Extension Build([ =>\t]+)(API.*)/', $data, $m ) )
		{
			$parts = explode( ',', trim( $m[2] ) );
			foreach ( $parts as $part )
			{
				if ( preg_match( '/API([0-9]*)/', $part, $m ) )
				{
					$phpApi = $m[1];
				}
				switch ( $part )
				{
					case 'NTS':   $this->ts = false; break;
					case 'TS':    $this->ts = true;  break;
					case 'debug': $this->debug = true; break;
					case 'VC6':   $this->winCompiler = 6; $this->windows = true; break;
					case 'VC8':   $this->winCompiler = 8; $this->windows = true; break;
					case 'VC9':   $this->winCompiler = 9; $this->windows = true; break;
					case 'VC11':  $this->winCompiler = 11; $this->windows = true; break;
					case 'VC14':  $this->winCompiler = 14; $this->windows = true; break;
					case 'VC15':  $this->winCompiler = 15; $this->windows = true; break;
				}
			}
		}

		if ( preg_match( '/Zend Extension Build([ =>]+)(API.*)/', $data, $m ) )
		{
			$parts = explode( ',', $m[2] );
			foreach ( $parts as $part )
			{
				if ( preg_match( '/API([0-9]*)/', $part, $m ) )
				{
					$this->zendApi = $m[1];
				}
			}
		}
		$this->dirSep = $this->windows ? '\\' : '/';

		// fix path's separators
		$this->configPath = rtrim( preg_replace( '@[/\\\\]@', $this->dirSep, $this->configPath ), $this->dirSep );
		$this->configFile = preg_replace( '@[/\\\\]@', $this->dirSep, $this->configFile );
		$this->extensionDir = rtrim( preg_replace( '@[/\\\\]@', $this->dirSep, $this->extensionDir ), $this->dirSep );

		// figure out the ZS install path
		if ( $this->zendServer )
		{
			$parts = explode( $this->dirSep, $this->configFile );
			$this->zendServerInstallPath = join( $this->dirSep, array_slice( $parts, 0, -2 ) );
		}

		echo "<h2>Summary</h2\n<ul>\n";
		if ( $this->xdebugAsZendExt && $this->xdebugAsPhpExt )
		{
			echo "<li><b>Xdebug installed:</b> ", $this->xdebugVersion, "</li>\n";
		}
		else if ( $this->xdebugAsPhpExt )
		{
			echo "<li><b>Xdebug installed:</b> <span style='color: #f00'>Only as PHP extension!</span></li>\n";
		}
		else
		{
			echo "<li><b>Xdebug installed:</b> no</li>\n";
		}
		echo "<li><b>Server API:</b> {$this->sapi}</li>\n";
		echo "<li><b>Windows:</b> ", $this->windows ? 'yes' : 'no';
		if ( $this->windows ) {
			echo " - Compiler: MS VC", $this->winCompiler;
			echo " - Architecture: ", $this->architecture;
		}
		echo "</li>\n";
		echo "<li><b>Zend Server:</b> ", $this->zendServer ? 'yes' : 'no';
		if ( $this->zendServer ) {
			echo " - Install path: ", $this->zendServerInstallPath;
		}
		echo "</li>\n";
		echo "<li><b>PHP Version:</b> $this->version</li>\n";
		echo "<li><b>Zend API nr:</b> $this->zendApi</li>\n";
		echo "<li><b>PHP API nr:</b> $this->phpApi</li>\n";
		echo "<li><b>Debug Build:</b> ", $this->debug ? 'yes' : 'no', "</li>\n";
		echo "<li><b>Thread Safe Build:</b> ", $this->ts ? 'yes' : 'no', "</li>\n";
		if ( $this->configFile )
		{
			echo "<li><b>Configuration File Path:</b> $this->configPath</li>\n";
			echo "<li><b>Configuration File:</b> $this->configFile</li>\n";
		}
		else
		{
			if ( $this->windows )
			{
				echo "<li><b>Configuration File Path:</b> unknown</li>\n";
				echo "<li><b>Configuration File:</b> unknown</li>\n";
			}
			else
			{
				echo "<li><b>Configuration File Path:</b> $this->configPath</li>\n";
				echo "<li><b>Configuration File:</b> {$this->configPath}/php.ini</li>\n";
			}
		}
		echo "<li><b>Extensions directory:</b> $this->extensionDir</li>\n";
		echo "</ul>\n";
	}

	function determineSupported()
	{
		if ( !$this->version || !$this->phpApi )
		{
			return "Could not find any useful information.";
		}
		if ( $this->windows && $this->debug )
		{
			return "Debug builds are not supported on Windows.";
		}
		if ( $this->windows && $this->winCompiler == 6 )
		{
			return "The compiler (MS VC6) that this PHP was build with, is no longer supported. Please upgrade to a version that was built with MS VC11 or MS VC14.";
		}
		if ( $this->windows && $this->winCompiler == 8 )
		{
			return "The compiler (MS VC8) that this PHP was build with, is not supported.";
		}
		if ( $this->windows && $this->winCompiler == 9 )
		{
			return "The compiler (MS VC9) that this PHP was build with, is no longer supported. Please upgrade to a version that was built with MS VC11 or MS VC14.";
		}
		if ( version_compare( $this->version, '7.0.0', '<' ) )
		{
			return "PHP versions below 7.0 are not supported.";
		}
		return true;
	}

	function determineFile()
	{
		$majorPhpVersion = substr( $this->version, 0, 3 );

		if ( !$this->windows )
		{
			$version = self::$latestVersion;
			$this->xdebugVersionToInstall = $version;
			$this->tarDir = "xdebug-{$version}";
			return "xdebug-{$version}.tgz";
		}
		else
		{
			$version = self::$latestWindowsVersion;
			$base = 'php_xdebug';

			if ( $this->debug )
			{
				return false;
			}
			switch ( $majorPhpVersion ) 
			{
				case '5.5':
				case '5.6':
					if ( $this->winCompiler != 11 )
					{
						return false;
					}
					break;
				case '7.0':
				case '7.1':
					if ( $this->winCompiler != 14 )
					{
						return false;
					}
					break;
				case '7.2':
					if ( $this->winCompiler != 15 )
					{
						return false;
					}
					break;
				default:
					return false;
			}

			$this->xdebugVersionToInstall = $version;
			$filename = "{$base}-{$version}-{$majorPhpVersion}-vc{$this->winCompiler}" . ( $this->ts ? '' : '-nts' ) . ( $this->architecture == 'x64' ? '-x86_64' : '' ) . ".dll";
			return $filename;
		}
	}

	function determineIniFile()
	{
		if ( $this->configFile )
		{
			if ( $this->xdebugVersion )
			{
				return "Update <code>{$this->configFile}</code>";
			}
			else
			{
				return "Edit <code>{$this->configFile}</code>";
			}
		}
		else
		{
			if ( $this->windows )
			{
				return "Create <code>php.ini</code> in the same folder as where <code>php.exe</code> is";
			}
			else
			{
				return "Create <code>{$this->configPath}{$this->dirSep}php.ini</code>";
			}
		}
	}

	function determineIniLine()
	{
		$line = 'zend_extension';

		if ( version_compare( $this->version, '5.3.0', '<' ) )
		{
			if ( $this->debug )
			{
				$line .= '_debug';
			}
			if ( $this->ts )
			{
				$line .= '_ts';
			}
		}
		$line .= ' = ';

		$line .= strpos( $this->extensionDir, ' ') === false ? '' : '"';
		$line .= $this->extensionDir . $this->dirSep;

		if ( $this->windows )
		{
			$line .= $this->determineFile();
		}
		else
		{
			$line .= 'xdebug.so';
		}
		$line .= strpos( $this->extensionDir, ' ') === false ? '' : '"';
		return $line;
	}
}
?>
