<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../config.php');

$requested_uri = $_SERVER['REQUEST_URI'];

if (str_contains('router.php', (string) $requested_uri)) {
    throw new \Exception('bad');
}

$contents = '';

try {
	if ($requested_uri === '/') {
		$contents = XdebugDotOrg\Controller\HomeController::index()->render();
	} elseif ($requested_uri === '/updates') {
		$contents = XdebugDotOrg\Controller\HomeController::updates()->render();
	} elseif ($requested_uri === '/download') {
		$contents = XdebugDotOrg\Controller\HomeController::download()->render();
	} elseif ($requested_uri === '/download/historical') {
		$contents = XdebugDotOrg\Controller\HomeController::historicalReleases()->render();
	} elseif (preg_match('/^\/docs(\/([A-Za-z_]+))?(\/([a-z]{2}))?/', (string) $requested_uri, $matches)) {
		$pages = [
			'install', 'develop', 'trace',
			'profiler', 'step_debug', 'code_coverage', 'compat', 'errors', 'faq', 'dbgpClient', 'dbgp',
			'garbage_collection', 'contributing', 'dbgpClient', 'dbgpProxy', 'upgrade_guide',
		];
		$redirectDevelopPages = [ 'basic', 'display', 'stack_trace' ];
		$redirectDocPages = [
			'debugclient' => 'dbgpClient',
		];

		$language = null;
		if (isset($matches[4])) {
			if ($matches[2] == 'upgrade_guide' && $matches[4] == 'ja') {
				$language = $matches[4];
			}
		}

		if (isset($matches[2])) {
			if ($matches[2] === 'all_settings') {
				$contents = XdebugDotOrg\Controller\Docs\SettingsController::all()->render();
			} elseif ($matches[2] === 'all_functions') {
				$contents = XdebugDotOrg\Controller\Docs\FunctionsController::all()->render();
			} elseif ($matches[2] === 'all_related_content') {
				$contents = XdebugDotOrg\Controller\Docs\RelatedContentController::all()->render();
			} elseif ($matches[2] === 'remote') {
				header("HTTP/1.1 301 Moved Permanently");
				header('Location: /docs/step_debug');
				exit();
			} elseif (in_array($matches[2], $pages)) {
				$contents = XdebugDotOrg\Controller\DocsController::section($matches[2], $language)->render();
			} elseif (array_key_exists($matches[2], $redirectDocPages)) {
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: /docs/{$redirectDocPages[$matches[2]]}");
				exit();
			} elseif (in_array($matches[2], $redirectDevelopPages)) {
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: /docs/develop#{$matches[2]}");
				exit();
			} else {
				header("HTTP/1.0 404 Not Found");
				$contents = XdebugDotOrg\Controller\FourOhFourController::error()->render();
			}
		} else {
			$contents = XdebugDotOrg\Controller\DocsController::index()->render();
		}
	} elseif (preg_match('/^\/announcements\/(\d\d\d\d-\d\d-\d\d)\/?/', (string) $requested_uri, $matches)) {
		$contents = XdebugDotOrg\Controller\NewsController::item($matches[1])->render();
	} elseif ($requested_uri === '/announcements') {
		$contents = XdebugDotOrg\Controller\NewsController::items()->render();
	} elseif ($requested_uri === '/license') {
		$contents = XdebugDotOrg\Controller\HomeController::license('1.03')->render();
	} elseif (preg_match('/^\/license\/((1\.01)|(1\.03))/', (string) $requested_uri, $matches)) {
		$contents = XdebugDotOrg\Controller\HomeController::license($matches[1])->render();
	} elseif ($requested_uri === '/support') {
		$contents = XdebugDotOrg\Controller\SupportController::index()->render();
	} elseif ($requested_uri === '/funding') {
		$contents = XdebugDotOrg\Controller\FundingController::index()->render();
	} elseif (preg_match('/^\/funding\/(.*)/', (string) $requested_uri, $matches)) {
		$contents = XdebugDotOrg\Controller\FundingController::project( $matches[1] )->render();
	} elseif ($requested_uri === '/reporting-bugs') {
		$contents = XdebugDotOrg\Controller\SupportController::reporting_bugs()->render();
	} elseif ($requested_uri === '/log') {
		$contents = XdebugDotOrg\Controller\SupportController::log()->render();
	} elseif ($requested_uri === '/ai') {
		$contents = XdebugDotOrg\Controller\AiController::index()->render();

	} elseif (preg_match('/^\/support\/buy\/([-\w]+)\/(\w+)/', (string) $requested_uri, $matches)) {
		$contents = XdebugDotOrg\Controller\StripeController::stripeResult( $matches[1], $matches[2] )->render();

	} elseif (preg_match('/^\/support\/buy\/([-\w]+)/', (string) $requested_uri, $matches)) {
		$result = XdebugDotOrg\Controller\StripeController::buyForm($matches[1]);
		if ($result instanceof XdebugDotOrg\Core\HtmlResponse) {
			$contents = $result->render();
		} else if ($result instanceof XdebugDotOrg\Core\HtmlRedirect) {
			header("HTTP/1.1 302 Found");
			header("Location: " . $result->getURI());
			exit();
		}

	} elseif ($requested_uri === '/wizard') {
		$contents = XdebugDotOrg\Controller\WizardController::index()->render();
	} elseif ($requested_uri === '/core2.css') {
		header('Content-type: text/css');
		die(file_get_contents('core2.css'));
	} elseif (preg_match('@/(.*woff2)$@', (string) $requested_uri, $matches)) {
		header('Content-Type: font/woff2');
		die(file_get_contents($matches[1]));
	} elseif (preg_match('@/(.*png)$@', (string) $requested_uri, $matches)) {
		header('Content-Type: image/png');
		die(file_get_contents($matches[1]));
	} elseif (preg_match('@/(.*jpg)$@', (string) $requested_uri, $matches)) {
		header('Content-Type: image/jpeg');
		die(file_get_contents($matches[1]));
	} elseif (preg_match('@/(.*svg)$@', (string) $requested_uri, $matches)) {
		header('Content-Type: image/svg+xml');
		die(file_get_contents($matches[1]));
	} elseif (preg_match('/^\/ci(\?r=.*)?/', (string) $requested_uri, $matches)) {
		$contents = XdebugDotOrg\Controller\CiController::index()->render();
	} else {
		header("HTTP/1.0 404 Not Found");
		$contents = XdebugDotOrg\Controller\FourOhFourController::error()->render();
	}
} catch (\XdebugDotOrg\PageNotFoundException $e) {
	header("HTTP/1.0 404 Not Found");
	$contents = XdebugDotOrg\Controller\FourOhFourController::error($e->getMessage())->render();
}


echo XdebugDotOrg\Controller\TemplateController::default($contents)->render();
