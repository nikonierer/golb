<?php

namespace Blog\Golb\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***************************************************************
 *  Copyright notice
 *  (c) 2021 Marcel Wieser <typo3dev@marcel-wieser.de>
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
 * Tag
 *
 * @package Blog\Golb\Domain\Model
 */
class Tag extends AbstractEntity
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Page>
     * @lazy
     */
    protected $pages;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->pages = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return ObjectStorage
     */
    public function getPages(): ObjectStorage
    {
        return $this->pages;
    }

    /**
     * @param ObjectStorage $pages
     */
    public function setPages(ObjectStorage $pages): void
    {
        $this->pages = $pages;
    }

    /**
     * @param Page $page
     */
    public function addPage(Page $page): void
    {
        $this->pages->attach($page);
    }

    /**
     * @param Page $page
     */
    public function removePage(Page $page): void
    {
        $this->removePage($page);
    }
}
