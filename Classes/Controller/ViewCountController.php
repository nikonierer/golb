<?php

namespace Greenfieldr\Golb\Controller;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */

use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;

/**
 * Class TestController
 *
 * @package Greenfieldr\Golb\Domain\Controller
 */
class ViewCountController extends ActionController
{

    /**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * @var PersistenceManager
     */
    protected $persistenceManager;

    /**
     * ViewCountController constructor.
     *
     * @param PageRepository $pageRepository
     * @param PersistenceManagerInterface $persistenceManager
     */
    public function __construct(PageRepository $pageRepository, PersistenceManagerInterface $persistenceManager)
    {
        $this->pageRepository = $pageRepository;
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * Counts view
     *
     * @return string Empty string.
     * @throws UnknownObjectException
     */
    public function countViewAction()
    {
        $page = $this->pageRepository->findByIdentifier($GLOBALS['TSFE']->id);
        $page->increaseViewCount();
        $this->persistenceManager->update($page);

        return '';
    }
}