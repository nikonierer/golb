<?php
defined('TYPO3') or die();

$boot = function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('golb', 'Configuration/TypoScript', 'Golb');


    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ')'
    );
};
$boot();
unset($boot);