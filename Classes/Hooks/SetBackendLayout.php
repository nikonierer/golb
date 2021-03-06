<?php

namespace Greenfieldr\Golb\Hooks;

use Greenfieldr\Golb\Constants;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException;

/***************************************************************
 *  Copyright notice
 *  (c) 2020 Marcel Wieser <typo3dev@marcel-wieser.de>
 *  (c) 2015 Philipp Thiele <philipp.thiele@phth.de>
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
 * Sets correct backend layout for new blog posts
 */
class SetBackendLayout
{

    /**
     * @param $status
     * @param $table
     * @param $id
     * @param $fieldArray
     * @param $pObj
     * @throws InvalidConfigurationTypeException
     */
    public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$pObj)
    {
        $configurationManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ConfigurationManager::class);
        $settings = $configurationManager->getConfiguration(
            ConfigurationManager::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
            'golb'
        );
        $settings = $settings['plugin.']['tx_golb.']['settings.'];

        if ($table == 'pages' &&
            ($status == 'new' || $status == 'update') &&
            $fieldArray['doktype'] == Constants::BLOG_POST_DOKTYPE
        ) {
            $fieldArray['backend_layout'] = 'pagets__' . $settings['defaultBackendLayout'];
            $fieldArray['backend_layout_next_level'] = 'pagets__' . $settings['defaultBackendLayout'];

            $pageTs = BackendUtility::getPagesTSconfig($fieldArray['pid']);
            $backendLayouts = array_keys($pageTs['mod.']['web_layout.']['BackendLayouts.']);
            $backendLayouts = array_map(
                function($item) {
                    return rtrim($item, '.');
                },
                $backendLayouts
            );

            if (!in_array($settings['defaultBackendLayout'], $backendLayouts)) {
                $fieldArray['backend_layout'] = $fieldArray['backend_layout_next_level'] = '';
            }
        }
    }
}