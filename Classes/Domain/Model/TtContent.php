<?php
namespace Blog\Golb\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Marcel Wieser <typo3dev@marcel-wieser.de>
 *           Philipp Thiele <philipp.thiele@phth.de>
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
 * @package Blog\Golb\Domain\Model
 */
class TtContent extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string $accessibilityTitle
	 */
	protected $accessibilityTitle;

	/**
	 * @var int $accessibilityBypass
	 */
	protected $accessibilityBypass;

	/**
	 * @var string $accessibilityBypassText
	 */
	protected $accessibilityBypassText;

	/**
	 * @var string $altText
	 */
	protected $altText;

	/**
	 * @var int $backupColPos
	 */
	protected $backupColPos;

	/**
	 * @var string $bodyText
	 */
	protected $bodyText;

	/**
	 * Create date timestamp
	 *
	 * @var int $crdate
	 */
	protected $crDate;

	/**
	 * Create user identifier
	 *
	 * @var int $crUserId
	 */
	protected $crUserId;

	/**
	 * @var int $colPos
	 */
	protected $colPos;

	/**
	 * @var int $cols
	 */
	protected $cols;

	/**
	 * Content Type
	 *
	 * @var string $cType
	 */
	protected $cType;

	/**
	 * @var int $date
	 */
	protected $date;

	/**
	 * @var boolean $deleted
	 */
	protected $deleted;

	/**
	 * @var int $endTime
	 */
	protected $endTime;

	/**
	 * @var string $feGroup
	 */
	protected $feGroup;

	/**
	 * @var string $fileCollections
	 */
	protected $fileCollections;

	/**
	 * @var int $fileLinkSize
	 */
	protected $fileLinkSize;

	/**
	 * @var string $fileLinkSorting
	 */
	protected $fileLinkSorting;

	/**
	 * @var string $header
	 */
	protected $header;

	/**
	 * @var string $headerLayout
	 */
	protected $headerLayout;

	/**
	 * @var string $headerLink
	 */
	protected $headerLink;

	/**
	 * @var string $headerPosition
	 */
	protected $headerPosition;

	/**
	 * @var boolean $hidden
	 */
	protected $hidden;

	/**
	 * @var string $image
	 */
	protected $image;

	/**
	 * @var boolean $imageBorder
	 */
	protected $imageBorder;

	/**
	 * @var string $imageCaptionPosition
	 */
	protected $imageCaptionPosition;

	/**
	 * @var int $imageCols
	 */
	protected $imageCols;

	/**
	 * @var int $imageHeight
	 */
	protected $imageHeight;

	/**
	 * @var int $imageOrient
	 */
	protected $imageOrient;

	/**
	 * @var int $imageWidth
	 */
	protected $imageWidth;

	/**
	 * @var int $imageCompression
	 */
	protected $imageCompression;

	/**
	 * @var int $imageEffects
	 */
	protected $imageEffects;

	/**
	 * @var int $imageFrames
	 */
	protected $imageFrames;

	/**
	 * @var string $imageLink
	 */
	protected $imageLink;

	/**
	 * @var boolean $imageNoRows
	 */
	protected $imageNoRows;

	/**
	 * @var boolean $imageZoom
	 */
	protected $imageZoom;

	/**
	 * @var int $layout
	 */
	protected $layout;

	/**
	 * @var int $linkToTop
	 */
	protected $linkToTop;

	/**
	 * @var string $listType
	 */
	protected $listType;

	/**
	 * @var string $longDescURL
	 */
	protected $longDescURL;

	/**
	 * @var string $media
	 */
	protected $media;

	/**
	 * @var string $menuType
	 */
	protected $menuType;

	/**
	 * @var string $multimedia
	 */
	protected $multimedia;

	/**
	 * @var string $pages
	 */
	protected $pages;

	/**
	 * @var int $pid
	 */
	protected $pid;

	/**
	 * @var string $piFlexForm
	 */
	protected $piFlexForm;

	/**
	 * @var string $records
	 */
	protected $records;

	/**
	 * @var int $recursive
	 */
	protected $recursive;

	/**
	 * @var boolean $rteEnabled
	 */
	protected $rteEnabled;

	/**
	 * @var boolean $sectionIndex
	 */
	protected $sectionIndex;

	/**
	 * @var int $sorting
	 */
	protected $sorting;

	/**
	 * @var int $sectionFrame
	 */
	protected $sectionFrame;

	/**
	 * @var string $selectKey
	 */
	protected $selectKey;

	/**
	 * @var string $subHeader
	 */
	protected $subHeader;

	/**
	 * @var int $spaceAfter
	 */
	protected $spaceAfter;

	/**
	 * @var int $spaceBefore
	 */
	protected $spaceBefore;

	/**
	 * @var int $startTime
	 */
	protected $startTime;

	/**
	 * @var int $sysLanguageUid
	 */
	protected $sysLanguageUid;

	/**
	 * @var int $tableBgColor
	 */
	protected $tableBgColor;

	/**
	 * @var int $tableBorder
	 */
	protected $tableBorder;

	/**
	 * @var int $tableCellPadding
	 */
	protected $tableCellPadding;

	/**
	 * @var int $tableCellSpacing
	 */
	protected $tableCellSpacing;

	/**
	 * @var string $target
	 */
	protected $target;

	/**
	 * @var string $titleText
	 */
	protected $titleText;

	/**
	 * @var int $timestamp
	 */
	protected $timestamp;

	/**
	 * @return int
	 */
	public function getAccessibilityBypass() {
		return $this->accessibilityBypass;
	}

	/**
	 * @param int $accessibilityBypass
	 */
	public function setAccessibilityBypass($accessibilityBypass) {
		$this->accessibilityBypass = $accessibilityBypass;
	}

	/**
	 * @return string
	 */
	public function getAccessibilityBypassText() {
		return $this->accessibilityBypassText;
	}

	/**
	 * @param string $accessibilityBypassText
	 */
	public function setAccessibilityBypassText($accessibilityBypassText) {
		$this->accessibilityBypassText = $accessibilityBypassText;
	}

	/**
	 * @return string
	 */
	public function getAccessibilityTitle() {
		return $this->accessibilityTitle;
	}

	/**
	 * @param string $accessibilityTitle
	 */
	public function setAccessibilityTitle($accessibilityTitle) {
		$this->accessibilityTitle = $accessibilityTitle;
	}

	/**
	 * @return string
	 */
	public function getAltText() {
		return $this->altText;
	}

	/**
	 * @param string $altText
	 */
	public function setAltText($altText) {
		$this->altText = $altText;
	}

	/**
	 * @return int
	 */
	public function getBackupColPos() {
		return $this->backupColPos;
	}

	/**
	 * @param int $backupColPos
	 */
	public function setBackupColPos($backupColPos) {
		$this->backupColPos = $backupColPos;
	}

	/**
	 * @return string
	 */
	public function getBodyText() {
		return $this->bodyText;
	}

	/**
	 * @param string $bodyText
	 */
	public function setBodyText($bodyText) {
		$this->bodyText = $bodyText;
	}

	/**
	 * @return string
	 */
	public function getCType() {
		return $this->cType;
	}

	/**
	 * @param string $cType
	 */
	public function setCType($cType) {
		$this->cType = $cType;
	}

	/**
	 * @return int
	 */
	public function getColPos() {
		return $this->colPos;
	}

	/**
	 * @param int $colPos
	 */
	public function setColPos($colPos) {
		$this->colPos = $colPos;
	}

	/**
	 * @return int
	 */
	public function getCols() {
		return $this->cols;
	}

	/**
	 * @param int $cols
	 */
	public function setCols($cols) {
		$this->cols = $cols;
	}

	/**
	 * @return int
	 */
	public function getCrDate() {
		return $this->crDate;
	}

	/**
	 * @param int $crDate
	 */
	public function setCrDate($crDate) {
		$this->crDate = $crDate;
	}

	/**
	 * @return int
	 */
	public function getCrUserId() {
		return $this->crUserId;
	}

	/**
	 * @param int $crUserId
	 */
	public function setCrUserId($crUserId) {
		$this->crUserId = $crUserId;
	}

	/**
	 * @return int
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param int $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @return boolean
	 */
	public function isDeleted() {
		return $this->deleted;
	}

	/**
	 * @param boolean $deleted
	 */
	public function setDeleted($deleted) {
		$this->deleted = $deleted;
	}

	/**
	 * @return int
	 */
	public function getEndTime() {
		return $this->endTime;
	}

	/**
	 * @param int $endTime
	 */
	public function setEndTime($endTime) {
		$this->endTime = $endTime;
	}

	/**
	 * @return string
	 */
	public function getFeGroup() {
		return $this->feGroup;
	}

	/**
	 * @param string $feGroup
	 */
	public function setFeGroup($feGroup) {
		$this->feGroup = $feGroup;
	}

	/**
	 * @return string
	 */
	public function getFileCollections() {
		return $this->fileCollections;
	}

	/**
	 * @param string $fileCollections
	 */
	public function setFileCollections($fileCollections) {
		$this->fileCollections = $fileCollections;
	}

	/**
	 * @return int
	 */
	public function getFileLinkSize() {
		return $this->fileLinkSize;
	}

	/**
	 * @param int $fileLinkSize
	 */
	public function setFileLinkSize($fileLinkSize) {
		$this->fileLinkSize = $fileLinkSize;
	}

	/**
	 * @return string
	 */
	public function getFileLinkSorting() {
		return $this->fileLinkSorting;
	}

	/**
	 * @param string $fileLinkSorting
	 */
	public function setFileLinkSorting($fileLinkSorting) {
		$this->fileLinkSorting = $fileLinkSorting;
	}

	/**
	 * @return string
	 */
	public function getHeader() {
		return $this->header;
	}

	/**
	 * @param string $header
	 */
	public function setHeader($header) {
		$this->header = $header;
	}

	/**
	 * @return string
	 */
	public function getHeaderLayout() {
		return $this->headerLayout;
	}

	/**
	 * @param string $headerLayout
	 */
	public function setHeaderLayout($headerLayout) {
		$this->headerLayout = $headerLayout;
	}

	/**
	 * @return string
	 */
	public function getHeaderLink() {
		return $this->headerLink;
	}

	/**
	 * @param string $headerLink
	 */
	public function setHeaderLink($headerLink) {
		$this->headerLink = $headerLink;
	}

	/**
	 * @return string
	 */
	public function getHeaderPosition() {
		return $this->headerPosition;
	}

	/**
	 * @param string $headerPosition
	 */
	public function setHeaderPosition($headerPosition) {
		$this->headerPosition = $headerPosition;
	}

	/**
	 * @return boolean
	 */
	public function isHidden() {
		return $this->hidden;
	}

	/**
	 * @param boolean $hidden
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}

	/**
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param string $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * @return boolean
	 */
	public function isImageBorder() {
		return $this->imageBorder;
	}

	/**
	 * @param boolean $imageBorder
	 */
	public function setImageBorder($imageBorder) {
		$this->imageBorder = $imageBorder;
	}

	/**
	 * @return string
	 */
	public function getImageCaptionPosition() {
		return $this->imageCaptionPosition;
	}

	/**
	 * @param string $imageCaptionPosition
	 */
	public function setImageCaptionPosition($imageCaptionPosition) {
		$this->imageCaptionPosition = $imageCaptionPosition;
	}

	/**
	 * @return int
	 */
	public function getImageCols() {
		return $this->imageCols;
	}

	/**
	 * @param int $imageCols
	 */
	public function setImageCols($imageCols) {
		$this->imageCols = $imageCols;
	}

	/**
	 * @return int
	 */
	public function getImageCompression() {
		return $this->imageCompression;
	}

	/**
	 * @param int $imageCompression
	 */
	public function setImageCompression($imageCompression) {
		$this->imageCompression = $imageCompression;
	}

	/**
	 * @return int
	 */
	public function getImageEffects() {
		return $this->imageEffects;
	}

	/**
	 * @param int $imageEffects
	 */
	public function setImageEffects($imageEffects) {
		$this->imageEffects = $imageEffects;
	}

	/**
	 * @return int
	 */
	public function getImageFrames() {
		return $this->imageFrames;
	}

	/**
	 * @param int $imageFrames
	 */
	public function setImageFrames($imageFrames) {
		$this->imageFrames = $imageFrames;
	}

	/**
	 * @return int
	 */
	public function getImageHeight() {
		return $this->imageHeight;
	}

	/**
	 * @param int $imageHeight
	 */
	public function setImageHeight($imageHeight) {
		$this->imageHeight = $imageHeight;
	}

	/**
	 * @return string
	 */
	public function getImageLink() {
		return $this->imageLink;
	}

	/**
	 * @param string $imageLink
	 */
	public function setImageLink($imageLink) {
		$this->imageLink = $imageLink;
	}

	/**
	 * @return boolean
	 */
	public function isImageNoRows() {
		return $this->imageNoRows;
	}

	/**
	 * @param boolean $imageNoRows
	 */
	public function setImageNoRows($imageNoRows) {
		$this->imageNoRows = $imageNoRows;
	}

	/**
	 * @return int
	 */
	public function getImageOrient() {
		return $this->imageOrient;
	}

	/**
	 * @param int $imageOrient
	 */
	public function setImageOrient($imageOrient) {
		$this->imageOrient = $imageOrient;
	}

	/**
	 * @return int
	 */
	public function getImageWidth() {
		return $this->imageWidth;
	}

	/**
	 * @param int $imageWidth
	 */
	public function setImageWidth($imageWidth) {
		$this->imageWidth = $imageWidth;
	}

	/**
	 * @return boolean
	 */
	public function isImageZoom() {
		return $this->imageZoom;
	}

	/**
	 * @param boolean $imageZoom
	 */
	public function setImageZoom($imageZoom) {
		$this->imageZoom = $imageZoom;
	}

	/**
	 * @return int
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * @param int $layout
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}

	/**
	 * @return int
	 */
	public function getLinkToTop() {
		return $this->linkToTop;
	}

	/**
	 * @param int $linkToTop
	 */
	public function setLinkToTop($linkToTop) {
		$this->linkToTop = $linkToTop;
	}

	/**
	 * @return string
	 */
	public function getListType() {
		return $this->listType;
	}

	/**
	 * @param string $listType
	 */
	public function setListType($listType) {
		$this->listType = $listType;
	}

	/**
	 * @return string
	 */
	public function getLongDescURL() {
		return $this->longDescURL;
	}

	/**
	 * @param string $longDescURL
	 */
	public function setLongDescURL($longDescURL) {
		$this->longDescURL = $longDescURL;
	}

	/**
	 * @return string
	 */
	public function getMedia() {
		return $this->media;
	}

	/**
	 * @param string $media
	 */
	public function setMedia($media) {
		$this->media = $media;
	}

	/**
	 * @return string
	 */
	public function getMenuType() {
		return $this->menuType;
	}

	/**
	 * @param string $menuType
	 */
	public function setMenuType($menuType) {
		$this->menuType = $menuType;
	}

	/**
	 * @return string
	 */
	public function getMultimedia() {
		return $this->multimedia;
	}

	/**
	 * @param string $multimedia
	 */
	public function setMultimedia($multimedia) {
		$this->multimedia = $multimedia;
	}

	/**
	 * @return string
	 */
	public function getPages() {
		return $this->pages;
	}

	/**
	 * @param string $pages
	 */
	public function setPages($pages) {
		$this->pages = $pages;
	}

	/**
	 * @return string
	 */
	public function getPiFlexForm() {
		return $this->piFlexForm;
	}

	/**
	 * @param string $piFlexForm
	 */
	public function setPiFlexForm($piFlexForm) {
		$this->piFlexForm = $piFlexForm;
	}

	/**
	 * @return int
	 */
	public function getPid() {
		return $this->pid;
	}

	/**
	 * @param int $pid
	 */
	public function setPid($pid) {
		$this->pid = $pid;
	}

	/**
	 * @return string
	 */
	public function getRecords() {
		return $this->records;
	}

	/**
	 * @param string $records
	 */
	public function setRecords($records) {
		$this->records = $records;
	}

	/**
	 * @return int
	 */
	public function getRecursive() {
		return $this->recursive;
	}

	/**
	 * @param int $recursive
	 */
	public function setRecursive($recursive) {
		$this->recursive = $recursive;
	}

	/**
	 * @return boolean
	 */
	public function isRteEnabled() {
		return $this->rteEnabled;
	}

	/**
	 * @param boolean $rteEnabled
	 */
	public function setRteEnabled($rteEnabled) {
		$this->rteEnabled = $rteEnabled;
	}

	/**
	 * @return int
	 */
	public function getSectionFrame() {
		return $this->sectionFrame;
	}

	/**
	 * @param int $sectionFrame
	 */
	public function setSectionFrame($sectionFrame) {
		$this->sectionFrame = $sectionFrame;
	}

	/**
	 * @return boolean
	 */
	public function isSectionIndex() {
		return $this->sectionIndex;
	}

	/**
	 * @param boolean $sectionIndex
	 */
	public function setSectionIndex($sectionIndex) {
		$this->sectionIndex = $sectionIndex;
	}

	/**
	 * @return string
	 */
	public function getSelectKey() {
		return $this->selectKey;
	}

	/**
	 * @param string $selectKey
	 */
	public function setSelectKey($selectKey) {
		$this->selectKey = $selectKey;
	}

	/**
	 * @return int
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * @param int $sorting
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * @return int
	 */
	public function getSpaceAfter() {
		return $this->spaceAfter;
	}

	/**
	 * @param int $spaceAfter
	 */
	public function setSpaceAfter($spaceAfter) {
		$this->spaceAfter = $spaceAfter;
	}

	/**
	 * @return int
	 */
	public function getSpaceBefore() {
		return $this->spaceBefore;
	}

	/**
	 * @param int $spaceBefore
	 */
	public function setSpaceBefore($spaceBefore) {
		$this->spaceBefore = $spaceBefore;
	}

	/**
	 * @return int
	 */
	public function getStartTime() {
		return $this->startTime;
	}

	/**
	 * @param int $startTime
	 */
	public function setStartTime($startTime) {
		$this->startTime = $startTime;
	}

	/**
	 * @return string
	 */
	public function getSubHeader() {
		return $this->subHeader;
	}

	/**
	 * @param string $subHeader
	 */
	public function setSubHeader($subHeader) {
		$this->subHeader = $subHeader;
	}

	/**
	 * @return int
	 */
	public function getSysLanguageUid() {
		return $this->sysLanguageUid;
	}

	/**
	 * @param int $sysLanguageUid
	 */
	public function setSysLanguageUid($sysLanguageUid) {
		$this->sysLanguageUid = $sysLanguageUid;
	}

	/**
	 * @return int
	 */
	public function getTableBgColor() {
		return $this->tableBgColor;
	}

	/**
	 * @param int $tableBgColor
	 */
	public function setTableBgColor($tableBgColor) {
		$this->tableBgColor = $tableBgColor;
	}

	/**
	 * @return int
	 */
	public function getTableBorder() {
		return $this->tableBorder;
	}

	/**
	 * @param int $tableBorder
	 */
	public function setTableBorder($tableBorder) {
		$this->tableBorder = $tableBorder;
	}

	/**
	 * @return int
	 */
	public function getTableCellPadding() {
		return $this->tableCellPadding;
	}

	/**
	 * @param int $tableCellPadding
	 */
	public function setTableCellPadding($tableCellPadding) {
		$this->tableCellPadding = $tableCellPadding;
	}

	/**
	 * @return int
	 */
	public function getTableCellSpacing() {
		return $this->tableCellSpacing;
	}

	/**
	 * @param int $tableCellSpacing
	 */
	public function setTableCellSpacing($tableCellSpacing) {
		$this->tableCellSpacing = $tableCellSpacing;
	}

	/**
	 * @return string
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * @param string $target
	 */
	public function setTarget($target) {
		$this->target = $target;
	}

	/**
	 * @return int
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @param int $timestamp
	 */
	public function setTimestamp($timestamp) {
		$this->timestamp = $timestamp;
	}

	/**
	 * @return string
	 */
	public function getTitleText() {
		return $this->titleText;
	}

	/**
	 * @param string $titleText
	 */
	public function setTitleText($titleText) {
		$this->titleText = $titleText;
	}

}