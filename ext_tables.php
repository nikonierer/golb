<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function ($packageKey) {
    $icons = [
        'apps-pagetree-post' => 'EXT:golb/Resources/Public/Icons/apps-pagetree-post.svg',
        'ext-golb-tag' => 'EXT:golb/Resources/Public/Icons/tx_golb_domain_model_tag.svg'

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
        $packageKey,
        'Blog',
        'Blog'
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        $packageKey,
        'ViewCount',
        'ViewCount'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($packageKey, 'Configuration/TypoScript', 'Golb');
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ')'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_golb_domain_model_tag');
};

$boot('golb');
unset($boot);