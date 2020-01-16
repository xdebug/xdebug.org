<?php
namespace XdebugDotOrg;

class XdebugVersion
{
	public const NOT_SUPPORTED_BEFORE = '2.9';
	public const LATEST_VERSION = '2.9.1';
	public const LATEST_WINDOWS_VERSION = '2.9.1';

	private const VERSIONS =  [
		'7.0' => [ 'src' => '2.8.1',                              ],
		'7.1' => [ 'src' => '2.9.1',       'win' => '2.9.1'       ],
		'7.2' => [ 'src' => '2.9.1',       'win' => '2.9.1'       ],
		'7.3' => [ 'src' => '2.9.1',       'win' => '2.9.1'       ],
		'7.4' => [ 'src' => '2.9.1',       'win' => '2.9.1'       ]
	];

	/** @var string|null */
	public $version;

	/** @var bool */
	public $ts = false;

	/** @var bool */
	public $debug = false;

	/** @var bool */
	public $windows = false;

	/** @var string|false */
	public $phpApi = false;

	/** @var string|false */
	public $zendApi = false;

	/** @var string|false */
	public $configFile = false;

	/** @var string|false */
	public $configPath = false;

	/** @var string */
	public $extensionDir = '';

	/** @var string|false */
	public $sapi = false;

	/** @var string|false */
	public $tarDir = false;

	/** @var string|false */
	public $xdebugVersion = false;

	/** @var bool */
	public $zendServer = false;

	/** @var bool */
	public $opcacheLoaded = false;

	/** @var bool */
	public $xdebugAsZendExt = false;

	/** @var bool */
	public $xdebugAsPhpExt = false;

	/** @var string|false */
	public $distribution = false;

	/** @var int */
	public $winCompiler = 9;

	/** @var string */
	public $architecture = 'x86';

	/** @var string|false */
	public $opcacheVersion = false;

	/** @var string|null */
	public $zendServerInstallPath;

	/** @var string|null */
	public $xdebugVersionToInstall;

	/** @var string */
	public $dirSep;

	public function __construct( string $data )
	{
		$html = false;
		$htmlData = null;
		if ( strpos( $data, 'extension_dir</td>' ) !== false )
		{
			$html = true;
			$htmlData = $data;
		}
		$data = strip_tags( $data );
		$data = str_replace( '&nbsp;', ' ', $data );
		ini_set('xdebug.var_display_max_data', '633333' );

		if ( preg_match( '/Zend Extension Manager/', $data ) )
		{
			$this->zendServer = true;
		}
		if ( preg_match( '/Server API([ =>\t]*)(.*)/', $data, $m ) )
		{
			$this->sapi = trim( $m[2] );
		}

		if ( preg_match( '/PHP Version([^4567]+)([4567][0-9.dev-]+)/', $data, $m ) )
		{
			$this->version = $m[2];
		}

		// Zend Extension check
		if ( preg_match( '/with\sXdebug\sv([0-9.RCrcdevalphabeta-]+),/', $data, $m ) )
		{
			$this->xdebugVersion = $m[1];
			$this->xdebugAsZendExt = true;
		}
		// OPcache Extension check
		if ( preg_match( '/with\sZend\sOPcache\sv([0-9.RCrcdevalphabeta-]+),/', $data, $m ) )
		{
			$this->opcacheVersion = $m[1];
			$this->opcacheLoaded = true;
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
		if ( preg_match( '/System(.+)Debian/', $data, $m ) )
		{
			$this->distribution = "Debian";
		}
		if ( preg_match( '/System(.+)Ubuntu/', $data, $m ) )
		{
			$this->distribution = "Ubuntu";
		}
		if ( preg_match( '/System(.+)el[5678]/', $data, $m ) )
		{
			$this->distribution = "RedHat";
		}
		if ( preg_match( '/System(.+)\.fc\d+\./', $data, $m ) )
		{
			$this->distribution = "Fedora";
		}
		if ( preg_match( '/System(.+)Darwin/', $data, $m ) )
		{
			$this->distribution = "Darwin";
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
		if ( $htmlData !== null )
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
		$this->configPath = rtrim( preg_replace( '@[/\\\\]@', $this->dirSep, (string) $this->configPath ), $this->dirSep );
		$this->configFile = preg_replace( '@[/\\\\]@', $this->dirSep, (string) $this->configFile );
		$this->extensionDir = rtrim( preg_replace( '@[/\\\\]@', $this->dirSep, $this->extensionDir ), $this->dirSep );

		// figure out the ZS install path
		if ( $this->zendServer )
		{
			$parts = explode( $this->dirSep, $this->configFile );
			$this->zendServerInstallPath = join( $this->dirSep, array_slice( $parts, 0, -2 ) );
		}
	}

	/**
	 * @return string|true
	 */
	public function determineSupported()
	{
		if ( !$this->version || !$this->phpApi )
		{
			return "Could not find any useful information.";
		}

		$majorPhpVersion = substr( $this->version, 0, 3 );

		if ( !array_key_exists( $majorPhpVersion, self::VERSIONS ) )
		{
			return "PHP version {$majorPhpVersion} is not supported.";
		}

		if ( $this->windows )
		{
			if ( !array_key_exists( 'win', self::VERSIONS[$majorPhpVersion] ) )
			{
				return "Windows binaries for PHP version {$majorPhpVersion} are not available, because this PHP version is no longer supported by the PHP project.";
			}
			if ( $this->debug )
			{
				return "Debug builds are not supported on Windows.";
			}
			if ( $this->winCompiler == 6 )
			{
				return "The compiler (MS VC6) that this PHP was build with, is no longer supported. Please upgrade to a version that was built with MS VC11 or MS VC14.";
			}
			if ( $this->winCompiler == 8 )
			{
				return "The compiler (MS VC8) that this PHP was build with, is not supported.";
			}
			if ( $this->winCompiler == 9 )
			{
				return "The compiler (MS VC9) that this PHP was build with, is no longer supported. Please upgrade to a version that was built with MS VC11 or MS VC14.";
			}

			if ( $this->winCompiler != 14 && ( $majorPhpVersion == '7.0' || $majorPhpVersion == '7.1' ) )
			{
				return "The compiler (MS VC{$this->winCompiler}) that this PHP {$majorPhpVersion} was build with, is not supported.";
			}
			if ( $this->winCompiler != 15 && ( $majorPhpVersion == '7.2' || $majorPhpVersion == '7.3'  || $majorPhpVersion == '7.4') )
			{
				return "The compiler (MS VC{$this->winCompiler}) that this PHP {$majorPhpVersion} was build with, is not supported.";
			}
		}
		return true;
	}

	public function determineFile() : string
	{
		if (!$this->version) {
			return '';
		}

		$majorPhpVersion = substr( $this->version, 0, 3 );

		if ( !$this->windows )
		{
			$version = self::VERSIONS[$majorPhpVersion]['src'];
			$this->xdebugVersionToInstall = $version;
			$this->tarDir = "xdebug-{$version}";
			return "xdebug-{$version}.tgz";
		}
		else
		{
			$version = self::VERSIONS[$majorPhpVersion]['win'] ?? '';

			if (!$version) {
				return '';
			}

			$base = 'php_xdebug';

			if ( $this->debug )
			{
				return '';
			}

			$this->xdebugVersionToInstall = $version;
			$filename = "{$base}-{$version}-{$majorPhpVersion}-vc{$this->winCompiler}" . ( $this->ts ? '' : '-nts' ) . ( $this->architecture == 'x64' ? '-x86_64' : '' ) . ".dll";

			return $filename;
		}
	}

	public function determineIniLine() : string
	{
		$line = 'zend_extension';

		if (!$this->version) {
			return '';
		}

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

		if ( $this->extensionDir !== '' )
		{
			$line .= strpos( $this->extensionDir, ' ') === false ? '' : '"';
			$line .= $this->extensionDir . $this->dirSep;
		}

		if ( $this->windows )
		{
			$line .= $this->determineFile();
		}
		else
		{
			$line .= 'xdebug.so';
		}

		if ( $this->extensionDir !== '' )
		{
			$line .= strpos( $this->extensionDir, ' ') === false ? '' : '"';
		}

		return $line;
	}
}
?>
