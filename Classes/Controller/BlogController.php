<?php

namespace Greenfieldr\Golb\Controller;

use Greenfieldr\Golb\Domain\Model\Dto\PostsDemand;
use Greenfieldr\Golb\Domain\Repository\CategoryRepository;
use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

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
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
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

        if($this->arguments->hasArgument('demand')) {
            $this->arguments->getArgument('demand')->getPropertyMappingConfiguration()
                ->allowAllProperties();
        }
    }

    /**
     * @param ViewInterface $view
     */
    protected function initializeView(ViewInterface $view)
    {
        parent::initializeView($view);

        $view->assign('contentElementData', $this->contentObject->data);
    }

    /**
     * Lists latest blog posts
     *
     * @param PostsDemand|null $demand
     * @return void
     */
    public function latestAction(PostsDemand $demand = null)
    {
        $posts = $this->pageRepository->findPosts(
            $this->pages,
            $this->prepareDemandObject($this->contentObject->data, $demand)
        );

        $this->view->assign('posts', $posts);
    }

    /**
     * Lists blog posts
     *
     * @param PostsDemand|null $demand
     * @return void
     */
    public function listAction(PostsDemand $demand = null)
    {
        $demand = $this->prepareDemandObject($this->contentObject->data, $demand);

        // Reset limit to allow pagination of entries
        $demand->setLimit(0);

        $posts = $this->pageRepository->findPosts($this->pages, $demand);

        $this->view->assign('posts', $posts);
    }

    /**
     * @param array $contentObject
     * @param PostsDemand|null $demand
     * @return PostsDemand
     */
    protected function prepareDemandObject(array $contentObject, PostsDemand $demand = null): PostsDemand
    {
        $demand = $demand ?? new PostsDemand();

        if($contentObject['tx_golb_allow_demand_overwrite']) {
            if(!$demand->hasCategories()) {
                $demand->setCategories($this->categories);
            }
            if(!$demand->hasExcluded()) {
                $demand->setExcluded(
                    GeneralUtility::trimExplode(',', $contentObject['tx_golb_exclude'])
                );
            }
            if(!$demand->hasLimit()) {
                $demand->setLimit($contentObject['tx_golb_limit']);
            }
            if(!$demand->hasOffset()) {
                $demand->setOffset($contentObject['tx_golb_offset']);
            }
            if(!$demand->isArchivedSet()) {
                $demand->setArchived($contentObject['tx_golb_archived']);
            }

            if(!$demand->hasOrder() && $contentObject['tx_golb_sorting']) {
                $demand->setOrder($contentObject['tx_golb_sorting']);
            }
            if(!$demand->hasOrderDirection() && $contentObject['tx_golb_sorting_direction']) {
                $demand->setOrderDirection($contentObject['tx_golb_sorting_direction']);
            }

        }

        return $demand;
    }
}