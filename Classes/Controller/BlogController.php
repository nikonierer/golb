<?php

namespace Greenfieldr\Golb\Controller;

use Greenfieldr\Golb\Domain\Repository\CategoryRepository;
use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;

/***************************************************************
 *  Copyright notice
 *  (c) 2015 Marcel Wieser <typo3dev@marcel-wieser.de>
 *           Philipp Thiele <philipp.thiele@phth.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class TestController
 *
 * @package Greenfieldr\Golb\Domain\Controller
 */
class BlogController extends BaseController
{

    /**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * @var CategoryRepository
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
     * BlogController constructor.
     *
     * @param PageRepository $pageRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(PageRepository $pageRepository, CategoryRepository $categoryRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Sets pages and categories properties
     *
     * @return void
     * @throws StopActionException
     */
    public function initializeAction()
    {
        parent::initializeAction();

        $this->pages = array_map('trim', explode(',', $this->contentObject->data['pages']));
        $this->categories = $this->categoryRepository->findByRelation($this->contentObject->data['uid'])->toArray();

        /** @ToDo: Find another solution?! */
        if ($this->contentObject->data['tx_golb_action'] !== '' &&
            $this->reflectionService->getClassSchema($this)->hasMethod($this->contentObject->data['tx_golb_action'] . 'Action')
        ) {
            /** @ToDo Find a better solution. */
            $action = $this->contentObject->data['tx_golb_action'];
            $this->contentObject->data['tx_golb_action'] = '';
            $this->forward($action);
        }
    }

    /**
     * Lists latest blog posts
     *
     * @return void
     */
    public function latestAction()
    {
        $posts = $this->pageRepository->findPosts(
            $this->pages,
            $this->contentObject->data['tx_golb_limit'],
            $this->contentObject->data['tx_golb_offset'],
            $this->categories,
            $this->contentObject->data['tx_golb_exclude'],
            'date'
        );

        $this->view->assign('posts', $posts);
    }

    /**
     * Lists blog posts
     *
     * @return void
     */
    public function listAction()
    {
        $posts = $this->pageRepository->findPosts(
            $this->pages,
            $this->contentObject->data['tx_golb_limit'],
            $this->contentObject->data['tx_golb_offset'],
            $this->categories,
            $this->contentObject->data['tx_golb_exclude'],
            'date'
        );

        $this->view->assign('posts', $posts);
    }
}