<?php

namespace Greenfieldr\Golb\Controller;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */
use TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException;
use Psr\Http\Message\ResponseInterface;
use Greenfieldr\Golb\Domain\Model\Dto\PostsDemand;
use Greenfieldr\Golb\Domain\Repository\CategoryRepository;
use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Class BlogController
 *
 * @package Greenfieldr\Golb\Domain\Controller
 */
class BlogController extends BaseController
{

    /**
     * @var PageRepository
     */
    protected PageRepository $pageRepository;

    /**
     * @var CategoryRepository
     */
    protected CategoryRepository $categoryRepository;

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
     * @throws NoSuchArgumentException
     */
    public function initializeAction()
    {
        parent::initializeAction();

        $this->pages = array_map('trim', explode(',', $this->contentObject->data['pages']));
        $this->categories = $this->categoryRepository->findByRelation($this->contentObject->data['uid'])->toArray();

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
        $view->assign('contentElementData', $this->contentObject->data);
    }

    /**
     * Lists latest blog posts
     *
     * @param PostsDemand|null $demand
     * @return void
     */
    public function latestAction(PostsDemand $demand = null): ResponseInterface
    {
        $posts = $this->pageRepository->findPosts(
            $this->pages,
            $this->prepareDemandObject($demand)
        );

        $this->view->assign('posts', $posts);
        return $this->htmlResponse();
    }

    /**
     * Lists blog posts
     *
     * @param PostsDemand|null $demand
     * @return void
     */
    public function listAction(PostsDemand $demand = null): ResponseInterface
    {
        $demand = $this->prepareDemandObject($demand);

        // Reset limit to allow pagination of entries
        $demand->setLimit(0);

        $posts = $this->pageRepository->findPosts($this->pages, $demand);

        $this->view->assign('posts', $posts);
        return $this->htmlResponse();
    }

    /**
     * @param PostsDemand|null $demand
     * @return PostsDemand
     */
    protected function prepareDemandObject(PostsDemand $demand = null): PostsDemand
    {
        // Use submitted demand object only if availalbe and allowDemandOverwrite is set.
        $demand = $demand && $this->settings['allowDemandOverwrite'] ? $demand : new PostsDemand();

        if(!$demand->hasCategories()) {
            $demand->setCategories($this->categories);
        }
        if(!$demand->hasExcluded()) {
            $demand->setExcluded(
                GeneralUtility::trimExplode(',', $this->settings['exclude'])
            );
        }
        if(!$demand->hasLimit()) {
            $demand->setLimit($this->settings['limit'] ?? 0);
        }
        if(!$demand->hasOffset()) {
            $demand->setOffset($this->settings['offset'] ?? 0);
        }
        if(!$demand->isArchivedSet() && $this->settings['archived'] === 'archived') {
            $demand->setArchived(true);
        }
        if(!$demand->isNonArchivedSet() && $this->settings['archived'] === 'nonArchived') {
            $demand->setNonArchived(true);
        }
        if(!$demand->hasOrder() && $this->settings['sorting']) {
            $demand->setOrder($this->settings['sorting']);
        }
        if(!$demand->hasOrderDirection() && $this->settings['sortingDirection']) {
            $demand->setOrderDirection($this->settings['sortingDirection']);
        }

        return $demand;
    }
}