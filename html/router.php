<?php

$requested_uri = $_SERVER['REQUEST_URI'];

if (strpos('router.php', $requested_uri) !== false) {
    throw new \Exception('bad');
}

require_once(__DIR__ . '/../vendor/autoload.php');

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
	} elseif (preg_match('/^\/docs(\/([a-z_]+))?/', $requested_uri, $matches)) {
		$pages = [
			'install', 'basic', 'display', 'stack_trace', 'execution_trace',
			'profiler', 'remote', 'code_coverage', 'compat', 'faq', 'dbgp',
			'garbage_collection', 'contributing', 'debugclient',
		];

		if (isset($matches[2])) {
			if ($matches[2] === 'all_settings') {
				$contents = XdebugDotOrg\Controller\Docs\SettingsController::all()->render();
			} elseif ($matches[2] === 'all_functions') {
				$contents = XdebugDotOrg\Controller\Docs\FunctionsController::all()->render();
			} elseif (in_array($matches[2], $pages)) {
				$contents = XdebugDotOrg\Controller\DocsController::section($matches[2])->render();
			} else {
				header("HTTP/1.0 404 Not Found");
				$contents = XdebugDotOrg\Controller\FourOhFourController::error()->render();
			}
		} else {
			$contents = XdebugDotOrg\Controller\DocsController::index()->render();
		}
	} elseif (preg_match('/^\/announcements\/(\d\d\d\d-\d\d-\d\d)\/?/', $requested_uri, $matches)) {
		$contents = XdebugDotOrg\Controller\NewsController::item($matches[1])->render();
	} elseif ($requested_uri === '/announcements') {
		$contents = XdebugDotOrg\Controller\NewsController::items()->render();
	} elseif ($requested_uri === '/license') {
		$contents = XdebugDotOrg\Controller\HomeController::license()->render();
	} elseif ($requested_uri === '/support') {
		$contents = XdebugDotOrg\Controller\SupportController::index()->render();
	} elseif ($requested_uri === '/reporting-bugs') {
		$contents = XdebugDotOrg\Controller\SupportController::reporting_bugs()->render();
	} elseif ($requested_uri === '/log') {
		$contents = XdebugDotOrg\Controller\SupportController::log()->render();
	} elseif ($requested_uri === '/wizard') {
		$contents = XdebugDotOrg\Controller\WizardController::index()->render();
	} elseif (preg_match('/^\/ci(\?r=.*)?/', $requested_uri, $matches)) {
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
