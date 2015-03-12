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
 * Class TestController
 *
 * @package Blog\Golb\Domain\Controller
 */
class BlogController extends BaseController {

	/**
	 * @var \Blog\Golb\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository;

	/**
	 * @var \Blog\Golb\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository;

	/**
	 * Contains array with pages to load blog posts from
	 *
	 * @var array $pages
	 */
	protected $pages;

	/**
	 * Contains categories to filter posts
	 *
	 * @var array $categories
	 */
	protected $categories;

	/**
	 * Sets pages and categories properties
	 *
	 * @return void
	 */
	public function initializeAction() {
		parent::initializeAction();

		$this->pages = array_map('trim', explode(',', $this->contentObject->data['pages']));
		$this->categories = $this->categoryRepository->findByRelation($this->contentObject->data['uid'])->toArray();

		/** @ToDo: Find another solution?! */
		if($this->contentObject->data['golb_action'] !== '' &&
			$this->reflectionService->hasMethod(get_class($this), $this->contentObject->data['golb_action'].'Action')) {
			/** @ToDo Find a better solution. */
			$action = $this->contentObject->data['golb_action'];
			$this->contentObject->data['golb_action'] = '';
			$this->forward($action);
		}
	}

	/**
	 * Lists latest blog posts
	 *
	 * @return void
	 */
	public function latestAction() {
		$posts = $this->pageRepository->findPosts(
			$this->pages,
			$this->contentObject->data['golb_limit'],
			$this->contentObject->data['golb_offset'],
			$this->categories,
			$this->contentObject->data['golb_exclude']
		);

		$this->view->assign('posts', $posts);
	}

	/**
	 * Lists blog posts
	 *
	 * @return void
	 */
	public function listAction() {
		$posts = $this->pageRepository->findPosts(
			$this->pages,
			$this->contentObject->data['golb_limit'],
			$this->contentObject->data['golb_offset'],
			$this->categories
		);

		$this->view->assign('posts', $posts);
	}

}