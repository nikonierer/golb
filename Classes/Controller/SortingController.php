<?php
namespace Blog\Golb\Controller;


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
 * Class SortingController
 *
 * @package Blog\Golb\Domain\Controller
 */
class SortingController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Blog\Golb\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
	 * @inject
	 */
	protected $persistenceManager;

	/**
	 * Set sorting of posts
	 *
	 * @return void
	 */
	public function setSortingAction() {
		$previousBlogSorting = $GLOBALS['TSFE']->fe_user->getKey('ses', 'blogSorting');

		if($previousBlogSorting == null){
			$previousBlogSorting = 'date';
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'blogSorting', NULL);
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'blogSorting', 'date');
			$GLOBALS["TSFE"]->storeSessionData();
			$this -> redirect('list', null, null, array('sortBy'=> 'date'));
		}
		$blogSorting = $previousBlogSorting;

		if($this->request->hasArgument('sortBy')){
			$blogSorting = $this->request->getArgument('sortBy');
		}

		if($previousBlogSorting != $blogSorting){
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'blogSorting', NULL);
			$GLOBALS['TSFE']->fe_user->setKey('ses', 'blogSorting', $blogSorting);
			$GLOBALS["TSFE"]->storeSessionData();
			$this -> redirect('list', null, null, array('sortBy'=> $blogSorting));
		}

		return false;
	}


}