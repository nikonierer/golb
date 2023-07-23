<?php
defined('TYPO3') or die();

$boot = function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'golb',
        'ListView',
        'LLL:EXT:golb/Resources/Private/Language/locallang_be.xlf:tt_content.plugin.listView.title',
        'ext-golb-plugin-list-view',
        'Golb'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:golb/Configuration/FlexForms/ListView.xml',
        'golb_listview'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'golb',
        'LatestView',
        'LLL:EXT:golb/Resources/Private/Language/locallang_be.xlf:tt_content.plugin.latestView.title',
        'ext-golb-plugin-latest-view',
        'Golb'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:golb/Configuration/FlexForms/LatestView.xml',
        'golb_latestview'
    );

    $GLOBALS['TCA']['tt_content']['types']['golb_listview']['showitem'] = '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            --palette--;;headers,
            pages,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin,
            pi_flexform,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            categories,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
            rowDescription,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ';

    $GLOBALS['TCA']['tt_content']['types']['golb_latestview']['showitem'] = $GLOBALS['TCA']['tt_content']['types']['golb_listview']['showitem'];
};
$boot();
unset($boot);