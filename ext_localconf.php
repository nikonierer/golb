<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$boot = function($packageKey) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Blog.' . $packageKey,
		'Blog',
		array(
			'Blog' => 'latest, list'
		),
		array(
		)
	);
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Blog.' . $packageKey,
		'ViewCount',
		array(
			'ViewCount' => 'countView'
		),
		array(
			'ViewCount' => 'countView'
		)
	);

	$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Extbase\\Domain\\Model\\Category'] = array(
		'className' => 'Blog\\Golb\\Domain\\Model\\Category',
	);

	$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Backend\\Controller\\NewRecordController'] = array(
		'className' => 'Blog\\Golb\\Controller\\NewRecordController'
	);
};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);