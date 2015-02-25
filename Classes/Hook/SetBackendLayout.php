<?php
namespace Blog\Golb\Hook;


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
 * Sets correct backend layout for new pages of doktype 41
 */
class SetBackendLayout {
	/**
	 * Defines doktype number for blog posts.
	 *
	 * @var int $blogPostDokType
	 */
	protected static $blogPostDokType = 41;

	public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$pObj) {
		/** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
		$objectManager =
			\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		$configurationManager =
			$objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
		$settings = $configurationManager->getConfiguration(
			\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
			'golb'
		);

		if($table == 'pages' &&
			($status == 'new' || $status == 'update') &&
			$fieldArray['doktype'] == self::$blogPostDokType) {

			$fieldArray['backend_layout'] = $settings['defaultBackendLayout'];
			$fieldArray['backend_layout_next_level'] = $settings['defaultBackendLayout'];
		}
	}
}