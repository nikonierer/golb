<?php
namespace Blog\Golb\Domain\Repository;


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
 * The repository for pages
 */
class PageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * Defines doktype number for blog posts.
     *
     * @var int $blogPostDokType
     */
    protected static $blogPostDokType = 41;

    /**
     * Property to collect posts
     *
     * @var array $posts
     */
    protected $posts = array();

    /**
     * Property to collect categories
     *
     * @var array $categories
     */
    protected $categories = array();

    /**
     * Finds a list of blog posts based on a root page
     *
     * @param int|array $rootPages
     *
     * @return array
     */
    public function findSubPagesByPageIds($rootPages) {

        if(is_array($rootPages)) {
            $resultArray = array();

            foreach($rootPages as $rootPage) {
                $result = $this->findByIdentifier($rootPage);
                if($result instanceof \Blog\Golb\Domain\Model\Page) {
                    /** @var \Blog\Golb\Domain\Model\Page $result */
                    foreach($result->getSubpages()->toArray() as $page) {
                        $resultArray[] = $page;
                    }
                }
            }

            return $resultArray;

        } else {
            $result = $this->findByIdentifier((int)$rootPages);

            if($result instanceof \Blog\Golb\Domain\Model\Page) {
                /** @var \Blog\Golb\Domain\Model\Page $result */
                return $result->getSubpages()->toArray();
            }

        }

        return array();
    }

    /**
     * Finds latest blog posts recursively
     *
     * @param array $rootPages
     * @param int $limit
     * @param int $offset
     * @param array $categories
     * @return array
     */
    public function findPosts($rootPages, $limit, $offset = 0, $categories = null, $exclude = false) {
        $pages = $this->findSubPagesByPageIds($rootPages);

        $this->posts = array();
        $this->traversePages($pages);

        if ($exclude) {
            $excludedPages = explode(',', $exclude);
        } else {
            $excludedPages = array();
        }

        /**
         * @ToDo: Refactoring needed.
         */
        if(count($categories) > 0) {
            $this->categories = array();
            $categoryIds = array();
            /** @var \Blog\Golb\Domain\Model\Category $category */
            $this->traverseCategories($categories);

            foreach($this->categories as $category) {
                $categoryIds[] = $category->getUid();
            }

            $posts = $this->posts;
            $this->posts = array();
            foreach($posts as $post) {
                /**	@var \Blog\Golb\Domain\Model\Page $post */
                foreach($post->getCategories() as $cat) {
                    /** @var \Blog\Golb\Domain\Model\Category $cat */
                    if(in_array($cat->getUid(), $categoryIds)) {
                        $this->posts[] = $post;
                    }
                }
            }


        }

        foreach ($this->posts as $key => $post) {
            if (in_array($post->getUid(), $excludedPages)) {
                unset($this->posts[$key]);
            }
        }

        // Remove duplicates
        $this->posts = array_map('unserialize', array_unique(array_map('serialize', $this->posts)));

        return array_slice($this->posts, $offset, ($limit > 0 ? $limit : null));
    }

    /**
     * Adds blog posts to $this->posts
     *
     * @param array $pages
     * @return void
     */
    protected function traversePages($pages) {
        /** @var \Blog\Golb\Domain\Model\Page $page */

        foreach($pages as $page) {
            if($page->getSubpages() > 0) {
                self::traversePages($page->getSubpages()->toArray());
            }

            if($page->getDoktype() == self::$blogPostDokType) {
                $this->posts[] = $page;
            }
        }
    }

    /**
     * Adds categories to $this->categories
     *
     * @param array $categories
     * @return void
     */
    protected function traverseCategories($categories) {
        /** @var \Blog\Golb\Domain\Model\Category $category */
        foreach($categories as $category) {
            if($category->getSubCategories() > 0) {
                self::traverseCategories($category->getSubCategories()->toArray());
            }
            $this->categories[] = $category;
        }
    }
}