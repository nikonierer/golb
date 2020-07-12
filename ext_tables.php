<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function ($packageKey) {
    $icons = [
        'apps-pagetree-post' => 'EXT:golb/Resources/Public/Icons/apps-pagetree-post.svg',
    ];
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    foreach ($icons as $identifier => $icon) {
        $iconRegistry->registerIcon(
            $identifier,
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => $icon]
        );
    }

    $GLOBALS['PAGES_TYPES'][\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE] = [
        'type' => 'web',
        'allowedTables' => '*',
    ];


    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Blog.' . $packageKey,
        'Blog',
        'Blog'
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Blog.' . $packageKey,
        'ViewCount',
        'ViewCount'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($packageKey, 'Configuration/TypoScript', 'Golb');
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ')'
    );
};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);