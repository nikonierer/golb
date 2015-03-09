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
 * @package Blog\Golb\Domain\Model
 */
class Page extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Contains page abstract
	 *
	 * @var string $abstract
	 */
	protected $abstract;

	/**
	 * Contains URL alias
	 *
	 * @var string $alias
	 */
	protected $alias;

	/**
	 * Contains author email
	 *
	 * Use golb:author.email view helper to switch between this field and
	 * corresponding backend user based in plugin configuration
	 *
	 * @var string $authorEmail
	 */
	protected $authorEmail;

	/**
	 * Contains author image
	 *
	 * @lazy
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $authorImage;

	/**
	 * Contains author name
	 *
	 * Use golb:author.name view helper to switch between this field and
	 * corresponding backend user based in plugin configuration
	 *
	 * Maps on field "author"
	 *
	 * @var string $authorName
	 */
	protected $authorName;

	/**
	 * Contains selected backend layout
	 *
	 * @var string $backendLayout
	 */
	protected $backendLayout;

	/**
	 * Contains backend layout for sub level
	 *
	 * @var string $backendLayoutNextLevel
	 */
	protected $backendLayoutNextLevel;

	/**
	 * Tags the cached page belongs to
	 *
	 * @var string $cacheTags
	 */
	protected $cacheTags;

	/**
	 * Timestamp for cache timeout
	 *
	 * @var int $cacheTimeout
	 */
	protected $cacheTimeout;

	/**
	 * Contains relations to selected categories for this page
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Category> $categories
	 */
	protected $categories;

	/**
	 * Contains page id to show content from instead of the current page content itself
	 *
	 * @var int $contentFromPid
	 */
	protected $contentFromPid;

	/**
	 * Create date timestamp
	 *
	 * @var int $crdate
	 */
	protected $crdate;

	/**
	 * Create user identifier
	 *
	 * @var int $cruserId
	 */
	protected $cruserId;

	/**
	 * Deleted flag
	 *
	 * @var bool $deleted
	 */
	protected $deleted;

	/**
	 * Meta description for this page
	 *
	 * @var string $description
	 */
	protected $description;

	/**
	 * Page type
	 *
	 * @var int $doktype
	 */
	protected $doktype;

	/**
	 * End time timestamp
	 *
	 * Maps on field "endtime"
	 *
	 * @var int $endTime
	 */
	protected $endTime;

	/**
	 * Flag to extend publish dates and access rights to subpages
	 *
	 * Maps on field "extendToSubpages"
	 *
	 * @var bool $extendToSubPages ;
	 */
	protected $extendToSubPages;

	/**
	 * Frontend user groups
	 *
	 * @var string $feGroup
	 */
	protected $feGroup;

	/**
	 * Hidden flag
	 *
	 * @var bool $hidden
	 */
	protected $hidden;

	/**
	 * Flag to hide page in navigation
	 *
	 * Maps on field "nav_hide"
	 *
	 * @var bool $hiddenInNavigation
	 */
	protected $hiddenInNavigation;

	/**
	 * Keywords for this page
	 *
	 * @var string $keywords
	 */
	protected $keywords;

	/**
	 * Last updated timestamp
	 *
	 * Maps on field "lastUpdated" (Note: CamelCase instead of underscores)
	 *
	 * @var int $lastUpdated
	 */
	protected $lastUpdated;

	/**
	 * Selected page layout
	 *
	 * @var int $layout
	 */
	protected $layout;

	/**
	 * Contains referenced media assets for this page
	 *
	 * @var string $media
	 */
	protected $media;

	/**
	 * Contains page identifier from mount point if document type is set to mount point
	 *
	 * @var int $mountPid
	 */
	protected $mountPid;

	/**
	 * Contains mount point overlay if needed
	 *
	 * Maps on field "mount_pid_ol"
	 *
	 * @var int $mountPidOverlay
	 */
	protected $mountPidOverlay;

	/**
	 * Contains navigation title
	 *
	 * Maps on field "nav_title"
	 *
	 * @var string $navigationTitle
	 */
	protected $navigationTitle;

	/**
	 * Timestamp how long the page is flagged as new
	 *
	 * Maps on field "newUntil" (Note: CamelCase instead of underscores)
	 *
	 * @var int $newUntil
	 */
	protected $newUntil;

	/**
	 * Flag indicates if the page should be cached
	 *
	 * @var bool $noCache
	 */
	protected $noCache;

	/**
	 * Flag to hide page from search results
	 *
	 * @var bool $noSearch
	 */
	protected $noSearch;

	/**
	 * Identifier of parent page
	 *
	 * @var int $pid
	 */
	protected $pid;

	/**
	 * Contains related pages
	 *
	 * @lazy
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Page>
	 */
	protected $relatedPages;

	/**
	 * Shortcut target for document type shortcut depending on shortcut mode
	 *
	 * @var int $shortcut
	 */
	protected $shortcut;

	/**
	 * Shortcut mode if document type shortcut is selected
	 *
	 * @var int $shortcutMode
	 */
	protected $shortcutMode;

	/**
	 * Is site root flag
	 *
	 * Maps on field "is_siteroot"
	 *
	 * @var bool $siteRoot
	 */
	protected $siteRoot;

	/**
	 * Sorting field
	 *
	 * @var int $sorting
	 */
	protected $sorting;

	/**
	 * Start time timestamp
	 *
	 * Maps on field "starttime"
	 *
	 * @var int $startTime
	 */
	protected $startTime;

	/**
	 * List of subpages
	 *
	 * @lazy
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Page>
	 */
	protected $subpages;

	/**
	 * Page subtitle
	 *
	 * @var string $subtitle
	 */
	protected $subtitle;

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
	 * Page title
	 *
	 * @var string $title
	 */
	protected $title;

	/**
	 * Unique identifier
	 *
	 * @var int $uid
	 */
	protected $uid;

	/**
	 * URL e.g. for document type external
	 *
	 * @var string $url
	 */
	protected $url;

	/**
	 * Selected URL scheme
	 *
	 * @var int $urlScheme
	 */
	protected $urlScheme;

	/**
	 * URL type
	 *
	 * Maps on field "urltype"
	 *
	 * @var int $urlType
	 */
	protected $urlType;

	/**
	 * Contains number of views
	 *
	 * @var int $viewCount
	 */
	protected $viewCount;

	/**
	 * List of content elements
	 *
	 * @lazy
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\TtContent>
	 */
	protected $ttContent;

	/**
	 * Returns abstract
	 *
	 * @return string
	 */
	public function getAbstract() {
		return $this->abstract;
	}

	/**
	 * Sets abstract
	 *
	 * @param string $abstract
	 * @return void
	 */
	public function setAbstract($abstract) {
		$this->abstract = $abstract;
	}

	/**
	 * Returns URL alias
	 *
	 * @return string
	 */
	public function getAlias() {
		return $this->alias;
	}

	/**
	 * Sets URL alias
	 *
	 * @param string $alias
	 * @return void
	 */
	public function setAlias($alias) {
		$this->alias = $alias;
	}

	/**
	 * Returns author mail
	 *
	 * @return string
	 */
	public function getAuthorEmail() {
		return $this->authorEmail;
	}

	/**
	 * Sets author mail
	 *
	 * @param string $authorEmail
	 * @return void
	 */
	public function setAuthorEmail($authorEmail) {
		$this->authorEmail = $authorEmail;
	}

	/**
	 * Adds a author image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $authorImage
	 * @return void
	 */
	public function addAuthorImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $authorImage) {
		$this->authorImage->attach($authorImage);
	}

	/**
	 * Removes a author image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $authorImage
	 * @return void
	 */
	public function removeAuthorImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $authorImage) {
		$this->authorImage->detach($authorImage);
	}

	/**
	 * Returns relations to author image
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getAuthorImage() {
		return $this->authorImage;
	}

	/**
	 * Sets relations to author image
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $authorImage
	 * @return void
	 */
	public function setAuthorImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $authorImage) {
		$this->authorImage = $authorImage;
	}

	/**
	 * Returns author name
	 *
	 * @return string
	 */
	public function getAuthorName() {
		return $this->authorName;
	}

	/**
	 * Sets author name
	 *
	 * @param string $authorName
	 * @return void
	 */
	public function setAuthorName($authorName) {
		$this->authorName = $authorName;
	}

	/**
	 * Returns backend layout
	 *
	 * @return string
	 */
	public function getBackendLayout() {
		return $this->backendLayout;
	}

	/**
	 * Sets backend layout
	 *
	 * @param string $backendLayout
	 * @return void
	 */
	public function setBackendLayout($backendLayout) {
		$this->backendLayout = $backendLayout;
	}

	/**
	 * Returns backend layout for sub level
	 *
	 * @return string
	 */
	public function getBackendLayoutNextLevel() {
		return $this->backendLayoutNextLevel;
	}

	/**
	 * Sets backend layout for sub level
	 *
	 * @param string $backendLayoutNextLevel
	 * @return void
	 */
	public function setBackendLayoutNextLevel($backendLayoutNextLevel) {
		$this->backendLayoutNextLevel = $backendLayoutNextLevel;
	}

	/**
	 * Returns cache tags
	 *
	 * @return string
	 */
	public function getCacheTags() {
		return $this->cacheTags;
	}

	/**
	 * Sets cache tags
	 *
	 * @param string $cacheTags
	 * @return void
	 */
	public function setCacheTags($cacheTags) {
		$this->cacheTags = $cacheTags;
	}

	/**
	 * Returns cache timeout timestamp
	 *
	 * @return int
	 */
	public function getCacheTimeout() {
		return $this->cacheTimeout;
	}

	/**
	 * Sets cache timeout timestamp
	 *
	 * @param int $cacheTimeout
	 * @return void
	 */
	public function setCacheTimeout($cacheTimeout) {
		$this->cacheTimeout = $cacheTimeout;
	}

	/**
	 * Adds a category
	 *
	 * @param \Blog\Golb\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\Blog\Golb\Domain\Model\Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a category
	 *
	 * @param \Blog\Golb\Domain\Model\Category $category
	 * @return void
	 */
	public function removeCategory(\Blog\Golb\Domain\Model\Category $category) {
		$this->categories->detach($category);
	}

	/**
	 * Returns categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories
	 * @return void
	 */
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * Returns page identifier from page to show content from
	 *
	 * @return int
	 */
	public function getContentFromPid() {
		return $this->contentFromPid;
	}

	/**
	 * Sets page identifier of page to show content from
	 *
	 * @param int $contentFromPid
	 * @return void
	 */
	public function setContentFromPid($contentFromPid) {
		$this->contentFromPid = $contentFromPid;
	}

	/**
	 * Returns create date timestamp
	 *
	 * @return int
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * Sets create date
	 *
	 * @param int $crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * Returns create user identifier
	 *
	 * @return int
	 */
	public function getCruserId() {
		return $this->cruserId;
	}

	/**
	 * Sets create user identifier
	 *
	 * @param int $cruserId
	 * @return void
	 */
	public function setCruserId($cruserId) {
		$this->cruserId = $cruserId;
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
	 * Returns meta description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets meta description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns document type
	 *
	 * @return int
	 */
	public function getDoktype() {
		return $this->doktype;
	}

	/**
	 * Sets document type
	 *
	 * @param int $doktype
	 * @return void
	 */
	public function setDoktype($doktype) {
		$this->doktype = $doktype;
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
	 * Returns true if publish dates and access rights should be extended to sub pages
	 *
	 * @return int
	 */
	public function getExtendToSubPages() {
		return $this->extendToSubPages;
	}

	/**
	 * Sets flag to extend publish dates and access rights to sub pages
	 *
	 * @param int $extendToSubPages
	 * @return void
	 */
	public function setExtendToSubPages($extendToSubPages) {
		$this->extendToSubPages = $extendToSubPages;
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
	 * Returns true if page should be hidden in navigation
	 *
	 * @return bool
	 */
	public function isHiddenInNavigation() {
		return (bool)$this->hiddenInNavigation;
	}

	/**
	 * Sets flag to hide page in navigation
	 *
	 * @param bool $hiddenInNavigation
	 * @return void
	 */
	public function setHiddenInNavigation($hiddenInNavigation) {
		$this->hiddenInNavigation = (bool)$hiddenInNavigation;
	}

	/**
	 * Returns list of keywords
	 *
	 * @return string
	 */
	public function getKeywords() {
		return $this->keywords;
	}

	/**
	 * Sets keywords
	 *
	 * @param string $keywords
	 * @return void
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}

	/**
	 * Returns last updated timestamp
	 *
	 * @return int
	 */
	public function getLastUpdated() {
		return $this->lastUpdated;
	}

	/**
	 * Sets last updated timestamp
	 *
	 * @param int $lastUpdated
	 * @return void
	 */
	public function setLastUpdated($lastUpdated) {
		$this->lastUpdated = $lastUpdated;
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
	 * Returns mount point page identifier
	 *
	 * @return int
	 */
	public function getMountPid() {
		return $this->mountPid;
	}

	/**
	 * Sets page identifier for mount point
	 *
	 * @param int $mountPid
	 * @return void
	 */
	public function setMountPid($mountPid) {
		$this->mountPid = $mountPid;
	}

	/**
	 * Returns overlay for mount point page identifier
	 *
	 * @return int
	 */
	public function getMountPidOverlay() {
		return $this->mountPidOverlay;
	}

	/**
	 * Sets page identifier for mount point overlay
	 *
	 * @param int $mountPidOverlay
	 * @return void
	 */
	public function setMountPidOverlay($mountPidOverlay) {
		$this->mountPidOverlay = $mountPidOverlay;
	}

	/**
	 * Returns navigation title
	 *
	 * Returns page title if navigation title is empty
	 *
	 * @return string
	 */
	public function getNavigationTitle() {
		return $this->navigationTitle;
	}

	/**
	 * Sets navigation title
	 *
	 * @param string $navigationTitle
	 * @return void
	 */
	public function setNavigationTitle($navigationTitle) {
		$this->navigationTitle = $navigationTitle;
	}

	/**
	 * Returns timestamp until the page should be flagged as new
	 *
	 * @return int
	 */
	public function getNewUntil() {
		return $this->newUntil;
	}

	/**
	 * Sets timestamp until the page should be flagged as new
	 *
	 * @param int $newUntil
	 * @return void
	 */
	public function setNewUntil($newUntil) {
		$this->newUntil = $newUntil;
	}

	/**
	 * Returns true if the page should not be cached
	 *
	 * @return bool
	 */
	public function getNoCache() {
		return (bool)$this->noCache;
	}

	/**
	 * Sets no cache flag
	 *
	 * @param mixed $noCache
	 * @return void
	 */
	public function setNoCache($noCache) {
		$this->noCache = (bool)$noCache;
	}

	/**
	 * Returns true if the page should be shown in search results
	 *
	 * @return bool
	 */
	public function getNoSearch() {
		return (bool)$this->noSearch;
	}

	/**
	 * Sets flag to hide page from search results
	 *
	 * @param mixed $noSearch
	 * @return void
	 */
	public function setNoSearch($noSearch) {
		$this->noSearch = (bool)$noSearch;
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
	 * Returns list of related pages
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Page>
	 */
	public function getRelatedPages() {
		return $this->relatedPages;
	}

	/**
	 * Adds a related page
	 *
	 * @param \Blog\Golb\Domain\Model\Page $relatedPage
	 * @return void
	 */
	public function addRelatedPage(\Blog\Golb\Domain\Model\Page $relatedPage) {
		$this->relatedPages->attach($relatedPage);
	}

	/**
	 * Removes a related page
	 *
	 * @param \Blog\Golb\Domain\Model\Page $relatedPage
	 * @return void
	 */
	public function removeRelatedPage(\Blog\Golb\Domain\Model\Page $relatedPage) {
		$this->relatedPages->detach($relatedPage);
	}

	/**
	 * Sets the related pages
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedPages
	 * @return void
	 */
	public function setRelatedPages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $relatedPages) {
		$this->relatedPages = $relatedPages;
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
	 * Returns shortcut target
	 *
	 * @return int
	 */
	public function getShortcut() {
		return $this->shortcut;
	}

	/**
	 * Sets shortcut target
	 *
	 * @param int $shortcut
	 * @return void
	 */
	public function setShortcut($shortcut) {
		$this->shortcut = $shortcut;
	}

	/**
	 * Returns shortcut mode
	 *
	 * @return int
	 */
	public function getShortcutMode() {
		return $this->shortcutMode;
	}

	/**
	 * Sets shortcut target mode
	 *
	 * @param int $shortcutMode
	 * @return void
	 */
	public function setShortcutMode($shortcutMode) {
		$this->shortcutMode = $shortcutMode;
	}

	/**
	 * Returns true if page is the site root
	 *
	 * @return bool
	 */
	public function isSiteRoot() {
		return (bool)$this->siteRoot;
	}

	/**
	 * Sets flag for site root
	 *
	 * @param mixed $siteRoot
	 * @return void
	 */
	public function setSiteRoot($siteRoot) {
		$this->siteRoot = (bool)$siteRoot;
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
	 * Returns list of subpages
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Page>
	 */
	public function getSubpages() {
		return $this->subpages;
	}

	/**
	 * Adds a subpage
	 *
	 * @param \Blog\Golb\Domain\Model\Page $subpage
	 * @return void
	 */
	public function addSubpage(\Blog\Golb\Domain\Model\Page $subpage) {
		$this->subpages->attach($subpage);
	}

	/**
	 * Removes a subpage
	 *
	 * @param \Blog\Golb\Domain\Model\Page $subpage
	 * @return void
	 */
	public function removeSubpage(\Blog\Golb\Domain\Model\Page $subpage) {
		$this->subpages->detach($subpage);
	}

	/**
	 * Sets the subpages
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $subpages
	 * @return void
	 */
	public function setSubpages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $subpages) {
		$this->subpages = $subpages;
	}

	/**
	 * Returns subtitle of page
	 *
	 * @return string
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Sets subtitle
	 *
	 * @param string $subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
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

	/**
	 * Returns page title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets page title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns page identifier
	 *
	 * @return int
	 */
	public function getUid() {
		return $this->uid;
	}

	/**
	 * Returns URL e.g. for document type external link
	 *
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets URL e.g. for document type external link
	 *
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Returns URL scheme
	 *
	 * @return int
	 */
	public function getUrlScheme() {
		return $this->urlScheme;
	}

	/**
	 * Sets URL scheme
	 *
	 * @param int $urlScheme
	 * @return void
	 */
	public function setUrlScheme($urlScheme) {
		$this->urlScheme = $urlScheme;
	}

	/**
	 * Returns URL type
	 *
	 * @return int
	 */
	public function getUrlType() {
		return $this->urlType;
	}

	/**
	 * Sets URL type
	 *
	 * @param int $urlType
	 * @return void
	 */
	public function setUrlType($urlType) {
		$this->urlType = $urlType;
	}

	/**
	 * Returns view count
	 *
	 * @return int
	 */
	public function getViewCount() {
		return $this->viewCount;
	}

	/**
	 * Sets new view count
	 *
	 * @param int $viewCount
	 * @return void
	 */
	public function setViewCount($viewCount) {
		$this->viewCount = $viewCount;
	}

	/**
	 * Increases view count by given amount
	 *
	 * @param int $amount
	 * @return void
	 */
	public function increaseViewCount($amount = 1) {
		$this->viewCount = (int)$this->viewCount+$amount;
	}

	/**
	 * Returns list of content elements
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\TtContent>
	 */
	public function getTtContent() {
		return $this->ttContent;
	}

	/**
	 * Adds a content element
	 *
	 * @param \Blog\Golb\Domain\Model\TtContent $ttContent
	 * @return void
	 */
	public function addTtContent(\Blog\Golb\Domain\Model\TtContent $ttContent) {
		$this->ttContent->attach($ttContent);
	}

	/**
	 * Removes a content element
	 *
	 * @param \Blog\Golb\Domain\Model\TtContent $ttContent
	 * @return void
	 */
	public function removeTtContent(\Blog\Golb\Domain\Model\TtContent $ttContent) {
		$this->ttContent->detach($ttContent);
	}

	/**
	 * Sets the content element
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $ttContent
	 * @return void
	 */
	public function setTtContent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ttContent) {
		$this->ttContent = $ttContent;
	}
}