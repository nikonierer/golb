<?php

namespace Greenfieldr\Golb\Domain\Repository;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */

use Greenfieldr\Golb\Constants;
use Greenfieldr\Golb\Domain\Model\Category;
use Greenfieldr\Golb\Domain\Model\Dto\PostsDemand;
use Greenfieldr\Golb\Domain\Model\Page;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for pages
 */
class PageRepository extends Repository
{
    /**
     * Property to collect posts
     *
     * @var array $posts
     */
    protected $posts = [];

    /**
     * Property to collect categories
     *
     * @var array $categories
     */
    protected $categories = [];

    /**
     * Finds a list of blog posts based on a root page
     *
     * @param int|array $rootPages
     * @return array
     */
    public function findSubPagesByPageIds($rootPages)
    {

        if (is_array($rootPages)) {
            $resultArray = [];

            foreach ($rootPages as $rootPage) {
                $result = $this->findByIdentifier($rootPage);
                if ($result instanceof Page) {
                    /** @var Page $result */
                    foreach ($result->getSubpages()->toArray() as $page) {
                        $resultArray[] = $page;
                    }
                }
            }

            return $resultArray;
        } else {
            $result = $this->findByIdentifier((int)$rootPages);

            if ($result instanceof Page) {
                /** @var Page $result */
                return $result->getSubpages()->toArray();
            }
        }

        return [];
    }

    /**
     * Finds latest blog posts recursively
     *
     * @param array $rootPages
     * @param PostsDemand $demand
     * @return array
     */
    public function findPosts($rootPages, PostsDemand $demand)
    {
        $pages = $this->findSubPagesByPageIds($rootPages);

        $this->posts = [];
        $this->traversePages($pages);

        /**
         * if sorting is provided as an argument the array is sorted based on the type of sorting
         */
        if ($demand->hasOrder()) {
            /**
             * @TODO: Respect order direction from demand object
             */
            switch ($demand->getOrder()) {
                case "date":
                    usort($this->posts, function ($a, $b) {
                        /** @var Page $a */
                        /** @var Page $b */
                        //If publish date is set use this else create date
                        if ($a->getPublishDate()) {
                            $a = $a->getPublishDate();
                        } else {
                            $a = $a->getCreationDate();
                        }

                        if ($b->getPublishDate()) {
                            $b = $b->getPublishDate();
                        } else {
                            $b = $b->getCreationDate();
                        }

                        return $a < $b;
                    });
                    break;
                case "views":
                    usort($this->posts, function ($a, $b) {
                        return $a->getViewCount() < $b->getViewCount();
                    });
                    break;
                case "author":
                    usort($this->posts, function ($a, $b) {
                        /* if no author value is present (''), it will be set as 'zz' to appear latest in array with objects */
                        $al = ($a->getAuthorName() == '') ? 'zz' : substr(strtolower($a->getAuthorName()), 0, 2);
                        $bl = ($a->getAuthorName() == '') ? 'zz' : substr(strtolower($b->getAuthorName()), 0, 2);
                        if ($al == $bl) {
                            return 0;
                        }

                        return ($al > $bl) ? +1 : -1;
                    });
                    break;
            }
        }

        /**
         * @ToDo: Refactoring needed.
         */
        if ($demand->hasCategories()) {
            $this->categories = [];
            $categoryIds = [];
            /** @var Category $category */
            $this->traverseCategories($demand->getCategories());

            foreach ($this->categories as $category) {
                $categoryIds[] = $category->getUid();
            }

            $posts = $this->posts;
            $this->posts = [];
            foreach ($posts as $post) {
                /**    @var Page $post */
                foreach ($post->getCategories() as $cat) {
                    /** @var Category $cat */
                    if (in_array($cat->getUid(), $categoryIds)) {
                        $this->posts[] = $post;
                    }
                }
            }
        }

        foreach ($this->posts as $key => $post) {
            if (in_array($post->getUid(), $demand->getExcluded())) {
                unset($this->posts[$key]);
            } else if ($demand->isArchived() && !$post->isArchived()) {
                unset($this->posts[$key]);
            } else if ($demand->hasTags()) {
                $includeInResult = false;
                foreach ($post->getTags() as $tag) {
                    if(in_array($tag->getUid(), $demand->getTags())) {
                        $includeInResult = true;
                        break;
                    }
                }

                if(!$includeInResult) {
                    unset($this->posts[$key]);
                }
            }
        }

        return array_slice(
            $this->posts,
            $demand->getOffset(),
            ($demand->getLimit() > 0 ? $demand->getLimit() : null)
        );
    }

    /**
     * @param array $rootPages
     * @param array $tags
     * @param array $excludeList
     * @param int $limit
     * @return array
     */
    public function findByTags(array $rootPages, array $tags, $excludeList = [], int $limit = 3): array
    {
        $pages = $this->findSubPagesByPageIds($rootPages);

        $this->posts = [];
        $this->traversePages($pages);

        $posts = [];
        /** @var Page $post */
        foreach ($this->posts as $post) {
            if(
                $post->getTags()->count() === 0 ||
                in_array($post->getUid(), $excludeList)
            ) {
                continue;
            }
            foreach ($post->getTags() as $tag) {
                if(in_array($tag->getTitle(), $tags)) {
                    $amount = (array_key_exists($post->getUid(), $posts)) ?
                        $posts[$post->getUid()]['amount'] + 1 : 1;

                    $posts[$post->getUid()] = [
                        'amount' => $amount,
                        'post' => $post
                    ];
                }
            }
        }

        usort($posts, function($a, $b) {
            return $b['amount'] <=> $a['amount'];
        });

        $this->posts = $posts;
        return array_slice($this->posts, 0, ($limit > 0 ? $limit : null));
    }

    /**
     * Adds blog posts to $this->posts
     *
     * @param array $pages
     * @return void
     */
    protected function traversePages($pages)
    {
        /** @var Page $page */

        foreach ($pages as $page) {
            if ($page->getSubpages() > 0) {
                self::traversePages($page->getSubpages()->toArray());
            }

            if ($page->getDoktype() == Constants::BLOG_POST_DOKTYPE) {
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
    protected function traverseCategories($categories)
    {
        /** @var Category $category */
        foreach ($categories as $category) {
            if ($category->getSubCategories() > 0) {
                self::traverseCategories($category->getSubCategories()->toArray());
            }
            $this->categories[] = $category;
        }
    }
}