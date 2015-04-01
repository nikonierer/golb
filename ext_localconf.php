<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$boot = function($packageKey) {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Blog.' . $packageKey,
		'Sorting',
		array(
			'Sorting' => 'sortBy'
		),
		array(
			'Sorting' => 'sortBy'
		)
	);
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Blog.' . $packageKey,
		'Blog',
		array(
			'Blog' => 'latest, list'
		),
		array(
			'Blog' => 'list'
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

	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =
		'EXT:golb/Classes/Hook/SetBackendLayout.php:Blog\Golb\Hook\SetBackendLayout';

	$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Extbase\\Domain\\Model\\Category'] = array(
		'className' => 'Blog\\Golb\\Domain\\Model\\Category',
	);

};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);