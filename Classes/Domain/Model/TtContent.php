<?php
namespace Blog\Golb\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marcel Wieser <typo3dev@marcel-wieser.de>
 *           Philipp Thiele <philipp.thiele@phth.de>
 *           Sascha Zander <sascha.zander@denkwerk.com>
 * 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Maps on table 'pages'
 *
 * @author     Sascha Zander <sascha.zander@denkwerk.com>
 * @copyright  2015 Copyright belongs to the respective authors
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package Blog\Golb\Domain\Model
 */
class TtContent extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Contains body text
	 *
	 * Maps on field "bodytext"
	 *
	 * @var string $bodyText
	 */
	protected $bodyText;

	/**
	 * Create date timestamp
	 *
	 * Maps on field "crdate"
	 *
	 * @var int $crdate
	 */
	protected $crDate;

	/**
	 * Create user identifier
	 *
	 * Maps on field "cruserId"
	 *
	 * @var int $crUserId
	 */
	protected $crUserId;

	/**
	 * Content Type
	 *
	 * Maps on field "CType"
	 *
	 * @var string $cType
	 */
	protected $cType;

	/**
	 * Contains body text
	 *
	 * @var int $date
	 */
	protected $date;

	/**
	 * Deleted flag
	 *
	 * @var bool $deleted
	 */
	protected $deleted;

	/**
	 * End time timestamp
	 *
	 * Maps on field "endtime"
	 *
	 * @var int $endTime
	 */
	protected $endTime;

	/**
	 * Frontend user groups
	 *
	 * Maps on field "fe_group"
	 *
	 * @var string $feGroup
	 */
	protected $feGroup;

	/**
	 * Contains header text
	 *
	 * @var string $header
	 */
	protected $header;

	/**
	 * Contains header link
	 *
	 * Maps on field "header_link"
	 *
	 * @var string $headerLink
	 */
	protected $headerLink;

	/**
	 * Hidden flag
	 *
	 * @var bool $hidden
	 */
	protected $hidden;

	/**
	 * Contains referenced fal images for this page
	 *
	 * @var string $image
	 */
	protected $image;

	/**
	 * Selected page layout
	 *
	 * @var int $layout
	 */
	protected $layout;

	/**
	 * Selected list type
	 *
	 * Maps on field "list_type"
	 *
	 * @var string $listType
	 */
	protected $listType;

	/**
	 * Contains referenced media assets for this page
	 *
	 * @var string $media
	 */
	protected $media;

	/**
	 * Identifier of parent page
	 *
	 * @var int $pid
	 */
	protected $pid;

	/**
	 * Sorting field
	 *
	 * @var int $sorting
	 */
	protected $sorting;

	/**
	 * Contains body text
	 *
	 * Maps on field "subheader"
	 *
	 * @var string $subHeader
	 */
	protected $subHeader;

	/**
	 * Start time timestamp
	 *
	 * Maps on field "starttime"
	 *
	 * @var int $startTime
	 */
	protected $startTime;

	/**
	 * Contains anchor link target for links to this page
	 *
	 * @var string $target
	 */
	protected $target;

	/**
	 * Contains timestamp
	 *
	 * Maps on field "tstamp"
	 *
	 * @var int $timestamp
	 */
	protected $timestamp;

	/**
	 * Returns body text
	 *
	 * @return string
	 */
	public function getBodyText() {
		return $this->bodyText;
	}

	/**
	 * Sets body text
	 *
	 * @param string $bodyText
	 * @return void
	 */
	public function setBodyText($bodyText) {
		$this->bodyText = $bodyText;
	}

	/**
	 * Returns content type
	 *
	 * @return string
	 */
	public function getCType() {
		return $this->cType;
	}

	/**
	 * Set content type
	 *
	 * @param string $cType
	 * @return void
	 */
	public function setCType($cType) {
		$this->cType = $cType;
	}

	/**
	 * Returns create date timestamp
	 *
	 * @return int
	 */
	public function getCrDate() {
		return $this->crDate;
	}

	/**
	 * Sets create date
	 *
	 * @param int $crDate
	 * @return void
	 */
	public function setCrDate($crDate) {
		$this->crDate = $crDate;
	}

	/**
	 * Returns create user identifier
	 *
	 * @return int
	 */
	public function getCrUserId() {
		return $this->crUserId;
	}

	/**
	 * Sets create user identifier
	 *
	 * @param int $crUserId
	 * @return void
	 */
	public function setCrUserId($crUserId) {
		$this->crUserId = $crUserId;
	}

	/**
	 * Returns date timestamp
	 *
	 * @return int
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets date
	 *
	 * @param int $date
	 * @return void
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Returns deleted flag
	 *
	 * @return bool
	 */
	public function getDeleted() {
		return (bool)$this->deleted;
	}

	/**
	 * Sets deleted flag
	 *
	 * @param mixed $deleted
	 * @return void
	 */
	public function setDeleted($deleted) {
		$this->deleted = (bool)$deleted;
	}

	/**
	 * Returns end time
	 *
	 * @return int
	 */
	public function getEndTime() {
		return $this->endTime;
	}

	/**
	 * Sets end time
	 *
	 * @param int $endTime
	 * @return void
	 */
	public function setEndTime($endTime) {
		$this->endTime = $endTime;
	}

	/**
	 * Returns front end user groups
	 *
	 * @return string
	 */
	public function getFeGroup() {
		return $this->feGroup;
	}

	/**
	 * Sets frontend user groups
	 *
	 * @param string $feGroup
	 * @return void
	 */
	public function setFeGroup($feGroup) {
		$this->feGroup = $feGroup;
	}

	/**
	 * Returns header text
	 *
	 * @return string
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * Set header text
	 *
	 * @param string $header
	 * @return void
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * Returns header link
	 *
	 * @return string
	 */
	public function getHeaderLink() {
		return $this->headerLink;
	}

	/**
	 * Set header link
	 *
	 * @param string $headerLink
	 * @return void
	 */
	public function setHeaderLink($headerLink) {
		$this->headerLink = $headerLink;
	}

	/**
	 * Returns true if page is hidden
	 *
	 * @return bool
	 */
	public function isHidden() {
		return $this->hidden;
	}

	/**
	 * Sets hidden flag
	 *
	 * @param int $hidden
	 * @return void
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}

	/**
	 * Returns relations to fal images
	 *
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets relations to fal images
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns selected frontend layout
	 *
	 * @return int
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * Sets frontend layout
	 *
	 * @param int $layout
	 * @return void
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

	/**
	 * Returns list type
	 *
	 * @return string
	 */
	public function getListType() {
		return $this->listType;
	}

	/**
	 * Set list type
	 *
	 * @param string $listType
	 * @return void
	 */
	public function setListType($listType) {
		$this->listType = $listType;
	}

	/**
	 * Returns relations to media assets
	 *
	 * @return string
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * Sets relations to media assets
	 *
	 * @param string $media
	 * @return void
	 */
	public function setMedia($media) {
		$this->media = $media;
	}

	/**
	 * Returns page identifier of parent page
	 *
	 * @return int
	 */
	public function getPid() {
		return $this->pid;
	}

	/**
	 * Sets page identifier of parent page
	 *
	 * @param int $pid
	 * @return void
	 */
	public function setPid($pid) {
		$this->pid = $pid;
	}

	/**
	 * Returns sorting position
	 *
	 * @return int
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets sorting position
	 *
	 * @param int $sorting
	 * @return void
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * Returns start time timestamp for publishing
	 *
	 * @return int
	 */
	public function getStartTime() {
		return $this->startTime;
	}


	/**
	 * Sets timestamp for start time
	 *
	 * @param int $startTime
	 * @return void
	 */
	public function setStartTime($startTime) {
		$this->startTime = $startTime;
	}

	/**
	 * Returns subheader text
	 *
	 * @return string
	 */
	public function getSubHeader() {
		return $this->subHeader;
	}

	/**
	 * Set subheader text
	 *
	 * @param string $subHeader
	 * @return void
	 */
	public function setSubHeader($subHeader) {
		$this->subHeader = $subHeader;
	}

	/**
	 * Returns anchor link target for anchors to this page
	 *
	 * @return string
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Sets anchor link target for anchor to this page
	 *
	 * @param string $target
	 * @return void
	 */
	public function setTarget($target) {
		$this->target = $target;
	}

	/**
	 * Returns timestamp of last system update of the page
	 *
	 * @return int
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * Sets timestamp of last system update
	 *
	 * @param int $timestamp
	 * @return void
	 */
	public function setTimestamp($timestamp) {
		$this->timestamp = $timestamp;
	}

}