<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\FundingProjectsList;
use XdebugDotOrg\Model\FundingProject;
use XdebugDotOrg\Model\FundingProjectContributor;
use XdebugDotOrg\Model\FundingProjectUpdates;
use XdebugDotOrg\Model\NewsItem;

class FundingController
{
	public static function index() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				FundingProjectsList::class,
				fn(): FundingProjectsList => self::getProjects(),
				'funding-idx'
			),
			'funding/index.php'
		);
	}

	public static function project( string $project ) : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				FundingProject::class,
				fn(): FundingProject => self::getProjectDescription( $project . '.txt' ),
				'funding-project-' . $project . '.txt'
			),
			'funding/project.php'
		);
	}

	public static function getProjects() : FundingProjectsList
	{
		$d = \dir( '../data/projects' );

		$files = [];

		while ( false !== ( $entry = $d->read() ) ) {
			if (preg_match( '@^[0-9][0-9][0-9]-.*\.txt$@', $entry, $m)) {
				$files[] = $entry;
			}
		}

		\rsort($files);

		return new FundingProjectsList(
			array_map(
				fn($file) => self::getProjectDescription($file),
				$files
			)
		);
	}

	private static function getProjectDescription(string $file) : FundingProject
	{
		$f = file( '../data/projects/'. $file );
		$title = array_shift($f);
		$amountRequested = array_shift($f);
		$amountRaised = 0;
		$baseFile = array_shift($f);

		$title = trim( $title );
		$baseFile = trim( $baseFile );

		foreach ($f as $line) {
			$line = trim( (string) $line );
			@[$amount, $name, $link, $svg] = explode( "\t", $line );

			$logo = null;
			$both = false;
			if ( $svg && strlen( $svg ) > 0 )
			{
				$logo = $svg;
				if ( $svg[0] === '+' )
				{
					$logo = substr( $svg, 1 );
					$both = true;
				}
			}


			$contributors[] = new FundingProjectContributor(
				$link,
				$name,
				$logo,
				$both,
				(double) $amount,
			);

			$amountRaised += $amount;
		}

		usort($contributors, function($a, $b) { return $b->amount <=> $a->amount; } );

		return new FundingProject(
			$baseFile,
			$title,
			(float) $amountRequested,
			(float) $amountRaised,
			file_get_contents( '../data/projects/'. $baseFile . '-description.html' ),
			file_get_contents( '../data/projects/'. $baseFile . '-proposal.html' ),
			$contributors,
		);
	}

	/**
	 * @return NewsItem[]
	 */
	private static function getProjectUpdates(string $project) : FundingProjectUpdates
	{
		$projectUpdatesDir = self::getNewsDataDir($project);

		if (!is_dir($projectUpdatesDir)) {
			throw new \Exception('Directory ' . $projectUpdatesDir . ' should exist');
		}

		$d = glob($projectUpdatesDir . '*.html');
		sort($d);
		$d = array_reverse( $d );

		$news_items = [];

		foreach ($d as $item) {
			$file = file( $item );
			$title = array_shift( $file );
			$date = new \DateTimeImmutable(preg_replace( '@.+' . $project . '/(.*).html$@', '\1', (string) $item ));
			$contents = join( '', $file );

			$news_items[] = new NewsItem($title, $date, $contents);
		}

		return new FundingProjectUpdates($project, $news_items);
	}

	private static function getNewsDataDir(string $project) : string
	{
		return dirname(__DIR__, 2) . '/data/projects/' . $project . '/';
	}

	public static function front_page() : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				FundingProjectsList::class,
				fn(): FundingProjectsList => self::getProjects(),
				'funding-idx'
			),
			'funding/front_page.php'
		);
	}

	public static function project_updates( string $project ) : HtmlResponse
	{
		return new HtmlResponse(
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				FundingProjectUpdates::class,
				fn(): FundingProjectUpdates => self::getProjectUpdates( $project ),
				'funding-project-updates-' . $project . '.txt'
			),
			'funding/project_updates.php'
		);
	}

	public static function project_update(string $project, string $date) : HtmlResponse
	{
		$newsFile = self::getNewsDataDir($project) . $date . '.html';

		if (!is_file($newsFile)) {
			throw new \XdebugDotOrg\PageNotFoundException('Project update item ' . $date . ' not found');
		}

		$file = file( $newsFile );
		$title = array_shift( $file );
		$date = new \DateTimeImmutable($date);
		$contents = join( '', $file );

		return new HtmlResponse(new NewsItem($title, $date, $contents), 'news/item.php');
	}
}
?>
