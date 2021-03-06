<?php

namespace Greenfieldr\Golb\ViewHelpers;

use Greenfieldr\Golb\Domain\Model\Page;
use Greenfieldr\Golb\Domain\Repository\PageRepository;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/***************************************************************
 *  Copyright notice
 *  (c) 2015  Marcel Wieser <typo3dev@marcel-wieser.de>
 *            Philipp Thiele <philipp.thiele@phth.de>
 *            Sascha Zander <sascha.zander@denkwerk.com>
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
    protected $pageRepository;

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
     * @param string|array $posts The uids of a related post.
     * @param boolean $getFirst If true it will return first page object.
     * @return array|Page This view helper returns the golb page model of the related posts.
     */
    public function render($posts, $getFirst = false)
    {
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
}