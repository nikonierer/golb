<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$boot = function ($packageKey) {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Blog.' . $packageKey,
        'Blog',
        [
            'Blog' => 'latest, list'
        ],
        [
            'Blog' => 'list'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Blog.' . $packageKey,
        'ViewCount',
        [
            'ViewCount' => 'countView'
        ],
        [
            'ViewCount' => 'countView'
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =
        'EXT:golb/Classes/Hook/SetBackendLayout.php:Blog\Golb\Hook\SetBackendLayout';

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Extbase\\Domain\\Model\\Category'] = [
        'className' => 'Blog\\Golb\\Domain\\Model\\Category',
    ];
};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);