<?php

namespace Greenfieldr\Golb\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/***************************************************************
 *  Copyright notice
 *  (c) 2015 Marcel Wieser <typo3dev@marcel-wieser.de>
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
 * AbstractModel
 *
 * @package Greenfieldr\Golb\Domain\Model
 */
class AbstractModel extends AbstractEntity
{

    /**
     * Magic method to set or get properties by database field name
     *
     * @param string $methodName
     * @param array $arguments
     * @return void|mixed
     */
    public function __call($methodName, $arguments)
    {
        if (substr($methodName, 0, 3) === 'get') {
            $propertyName = lcfirst(substr($methodName, 3));
            if (property_exists($this, $propertyName)) {
                return $this->$propertyName;
            }
        } elseif (substr($methodName, 0, 3) === 'set') {
            $propertyName = lcfirst(substr($methodName, 3));
            if (property_exists($this, $propertyName) && count($arguments) > 0) {
                $this->$propertyName = $arguments[0];
            }
        }
    }
}