<?php
namespace Blog\Golb\Domain\Model;


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
 * Maps on table 'sys_category'
 *
 * @package Blog\Golb\Domain\Model
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category {

	/**
	 * List of sub categories
	 *
	 * @lazy
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Blog\Golb\Domain\Model\Category>
	 */
	protected $subCategories;

	/**
	 * Adds a category
	 *
	 * @param \Blog\Golb\Domain\Model\Category $category
	 * @return void
	 */
	public function addSubCategory(\Blog\Golb\Domain\Model\Category $category) {
		$this->subCategories->attach($category);
	}

	/**
	 * Removes a category
	 *
	 * @param \Blog\Golb\Domain\Model\Category $category
	 * @return void
	 */
	public function removeSubCategory(\Blog\Golb\Domain\Model\Category $category) {
		$this->subCategories->detach($category);
	}

	/**
	 * Returns categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getSubCategories() {
		return $this->subCategories;
	}

	/**
	 * Sets categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories
	 * @return void
	 */
	public function setSubCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->subCategories = $categories;
	}

}