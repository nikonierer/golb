<?php
namespace Blog\Golb\Domain\Session;

	/***************************************************************
	 *
	 *  Copyright notice
	 *
	 *  (c) 2015 Marcel Wieser <typo3dev@marcel-wieser.de>
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
 * Session handler
 *
 * A wrapper class for TYPO3 CMS legacy code.
 *
 * @package Blog\Golb\Domain\Session
 */
class SessionHandler {
	/**
	 * Returns the object from the session
	 *
	 * @return object
	 */
	public function restoreFromSession() {
		$sessionData = $GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_golb');

		return unserialize($sessionData);
	}

	/**
	 * Writes an object into the  session
	 *
	 * Can write any serializable object to a existing PHP session.
	 *
	 * @param $object
	 * @return \Blog\Golb\Domain\Session\SessionHandler
	 */
	public function writeToSession($object) {
		$sessionData = serialize($object);
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_golb', $sessionData);
		$GLOBALS['TSFE']->fe_user->storeSessionData();

		return $this;
	}

	/**
	 * Sets data to null to cleanup session
	 *
	 * @return \Blog\Golb\Domain\Session\SessionHandler
	 */
	public function cleanUpSession() {
		$GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_golb', null);
		$GLOBALS['TSFE']->fe_user->storeSessionData();

		return $this;
	}
}