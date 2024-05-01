<?php
namespace XdebugDotOrg\Controller;

use XdebugDotOrg\Core\HtmlResponse;

use XdebugDotOrg\Model\FundingProjectsList;
use XdebugDotOrg\Model\FundingProject;
use XdebugDotOrg\Model\FundingProjectContributor;

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
			self::getProjectDescription( $project . '.txt'),
/*
			\XdebugDotOrg\Core\ContentsCache::fetchModel(
				FundingProjectsList::class,
				fn(): FundingProjectsList => self::getProjects(),
				'funding-project-' . $project . '.txt'
			),
*/
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
}
?>
