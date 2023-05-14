<?php

namespace Greenfieldr\Golb\ViewHelpers;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */

use Greenfieldr\Golb\Domain\Model\Page;
use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This view helper returns the golb page model of the related posts.
 *
 * @author     Sascha Zander <sascha.zander@denkwerk.com>
 * @copyright  2015 Copyright belongs to the respective authors
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ListPostsViewHelper extends AbstractViewHelper
{

    /**
     * Injects PageRepository
     *
     * @var PageRepository
     */
    protected PageRepository $pageRepository;

    /**
     * @param PageRepository $pageRepository
     */
    public function injectPageRepository(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * This view helper return the golb page model of the related posts.
     *
     * @return array|Page This view helper returns the golb page model of the related posts.
     */
    public function render(): mixed
    {
        $posts = $this->arguments['posts'];
        $getFirst = $this->arguments['getFirst'];
        $result = [];
        if (!empty($posts)) {

            if (!is_array($posts)) {
                $posts = explode(',', $posts);
            }

            foreach ($posts as $post) {
                $post = $this->pageRepository->findByIdentifier($post);
                if (!empty($post)) {
                    array_push($result, $post);
                }
            }
        }
        return ($getFirst) ? $result[0] : $result;
    }

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('posts', 'array', 'The uids of a related post.', true);
        $this->registerArgument('getFirst', 'bool', 'If true it will return first page object.', false, false);
    }
}