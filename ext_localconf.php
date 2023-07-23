<?php
defined('TYPO3') or die();

$boot = function ($packageKey) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['golb'][] = 'Greenfieldr\\Golb\\ViewHelpers';

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($packageKey),
        'ListView',
        [
            \Greenfieldr\Golb\Controller\BlogController::class => 'list'
        ],
        [],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($packageKey),
        'LatestView',
        [
            \Greenfieldr\Golb\Controller\BlogController::class => 'latest'
        ],
        [],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig("
        @import 'EXT:golb/Configuration/TSconfig/ContentElementWizard.tsconfig'
    ");
};

$boot('golb');
unset($boot);