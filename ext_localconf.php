<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$boot = function ($packageKey) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['golb'][] = 'Greenfieldr\\Golb\\ViewHelpers';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $packageKey,
        'Blog',
        [
            \Greenfieldr\Golb\Controller\BlogController::class => 'latest, list'
        ],
        [
            \Greenfieldr\Golb\Controller\BlogController::class => 'list'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        $packageKey,
        'ViewCount',
        [
            \Greenfieldr\Golb\Controller\ViewCountController::class => 'countView'
        ],
        [
            \Greenfieldr\Golb\Controller\ViewCountController::class => 'countView'
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][\Greenfieldr\Golb\Hooks\SetBackendLayout::class]
        = \Greenfieldr\Golb\Hooks\SetBackendLayout::class;

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Extbase\\Domain\\Model\\Category'] = [
        'className' => 'Greenfieldr\\Golb\\Domain\\Model\\Category',
    ];
};

$boot('golb');
unset($boot);