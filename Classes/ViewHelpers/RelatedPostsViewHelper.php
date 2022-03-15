<?php

namespace Greenfieldr\Golb\ViewHelpers;

use Greenfieldr\Golb\Domain\Model\Page;
use Greenfieldr\Golb\Domain\Model\Tag;
use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/***************************************************************
 *  Copyright notice
 *  (c) 2022  Marcel Wieser <typo3dev@marcel-wieser.de>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * This view helper returns related posts based on tags
 *
 */
class RelatedPostsViewHelper extends AbstractViewHelper
{
    /**
     * @var boolean
     */
    protected $escapeChildren = false;
    /**
     * Disable the output escaping interceptor so that the value is not htmlspecialchar'd twice
     *
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * Injects PageRepository
     *
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * Constructor.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function initializeArguments()
    {
        $this->registerArgument('posts', 'array', 'The list of root pages to search in', true);
        $this->registerArgument('currentPost', Page::class, 'The currently displayed blog post.', true);
        $this->registerArgument('limit', 'int', 'The number of related posts to return', false, 3);
        $this->registerArgument('as', 'string', 'The variable name', false, 'relatedPosts');
    }

    /**
     * This view helper returns related posts based on tags.
     *
     * @return string
     */
    public function render()
    {
        $tagArray = [];
        /** @var Tag $tag */
        foreach ($this->arguments['currentPost']->getTags() as $tag) {
            $tagArray[] = $tag->getTitle();
        }
        $tags = $tagArray;

        $posts = $this->pageRepository->findByTags(
            $this->arguments['posts'],
            $tags,
            [$this->arguments['currentPost']->getUid()],
            $this->arguments['limit']
        );

        $this->templateVariableContainer->add($this->arguments['as'], $posts);
        $content = $this->renderChildren();
        $this->templateVariableContainer->remove($this->arguments['as']);
        return $content;
    }
}