<?php
namespace XdebugDotOrg\Model;

/**
 * @psalm-immutable
 */
class FundingProject
{
	public $id;
	public $title;
	public $amountRequested;
	public $amountRaised;
	public $description;
	public $proposal;
	public $contributors;

	/**
	 * @param array<FundingProjectContributor>  $contributors
	 */
	public function __construct(
		string $id,
		string $title,
		float $amountRequested,
		float $amountRaised,
		string $description,
		string $proposal,
		array $contributors,
	) {
		$this->id = $id;
		$this->title = $title;
		$this->amountRequested = $amountRequested;
		$this->amountRaised = $amountRaised;
		$this->description = $description;
		$this->proposal = $proposal;
		$this->contributors = $contributors;
	}
}
?>
