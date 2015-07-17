<?php

namespace Blog\Golb\Tests\Unit\Domain\Model;

    /***************************************************************
     *  Copyright notice
     *  (c) 2015 Marcel Wieser <typo3dev@marcel-wieser.de>
     *           Philipp Thiele <philipp.thiele@phth.de>
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
 * Test case for class \Blog\Golb\Domain\Model\Page.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 * @author Marcel Wieser <typo3dev@marcel-wieser.de>
 * @author Philipp Thiele <philipp.thiele@phth.de>
 */
class PageTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @var \Blog\Golb\Domain\Model\Page
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \Blog\Golb\Domain\Model\Page();
    }

    protected function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        $this->markTestIncomplete();
    }
}
