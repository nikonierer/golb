<?php

namespace Greenfieldr\Golb\Domain\Model;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */

use TYPO3\CMS\Extbase\Annotation as Extbase;

/**
 * Maps on table 'sys_category'
 *
 * @package Greenfieldr\Golb\Domain\Model
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category
{

    /**
     * List of sub categories
     *
     * @Extbase\ORM\Lazy
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Greenfieldr\Golb\Domain\Model\Category>
     */
    protected $subCategories;

    /**
     * Adds a category
     *
     * @param \Greenfieldr\Golb\Domain\Model\Category $category
     * @return void
     */
    public function addSubCategory(\Greenfieldr\Golb\Domain\Model\Category $category)
    {
        $this->subCategories->attach($category);
    }

    /**
     * Removes a category
     *
     * @param \Greenfieldr\Golb\Domain\Model\Category $category
     * @return void
     */
    public function removeSubCategory(\Greenfieldr\Golb\Domain\Model\Category $category)
    {
        $this->subCategories->detach($category);
    }

    /**
     * Returns categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getSubCategories()
    {
        return $this->subCategories;
    }

    /**
     * Sets categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories
     * @return void
     */
    public function setSubCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories)
    {
        $this->subCategories = $categories;
    }
}