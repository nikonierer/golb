<?php

namespace Blog\Golb\Controller;

use Blog\Golb\Domain\Repository\PageRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;

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
 * @package Blog\Golb\Domain\Controller
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