<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function () {

    $tempColumns = [
        'tx_golb_sorting' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.tx_golb_sorting',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'varchar'
            ],
        ],
        'tx_golb_sorting_direction' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.tx_golb_sorting_direction',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'varchar'
            ],
        ],
        'tx_golb_limit' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.tx_golb_limit',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int'
            ],
        ],
        'tx_golb_offset' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.tx_golb_offset',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int'
            ],
        ],
        'tx_golb_action' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.tx_golb_action',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Latest', ''],
                    ['List', 'list']
                ]
            ],
        ],
        'tx_golb_exclude' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.excludedPages',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND doktype = ' . \Blog\Golb\Constants::BLOG_POST_DOKTYPE . ' ORDER BY crdate ASC',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 9999,
                'enableMultiSelectFilterTextfield' => true,
            ]
        ]
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        ['LLL:EXT:golb/Resources/Private/Language/locallang.xlf:plugin.blogposts', 'golb'],
        'CType',
        'golb'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '---div--;LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.golbTab,' .
        'tx_golb_action, tx_golb_sorting, tx_golb_sorting_direction, tx_golb_limit, tx_golb_offset, tx_golb_related, pages, tx_golb_exclude, categories,'
    );

    $defaultPalettes['start'] =
        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,';
    $defaultPalettes['end'] =
        '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,' .
        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,' .
        '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,hidden;' .
        'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,' .
        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,' .
        '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,' .
        '--div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements,' .
        'tx_gridelements_container,tx_gridelements_columns';

    $GLOBALS['TCA']['tt_content']['types']['golb']['showitem'] =
        $defaultPalettes['start'] .
        'tx_golb_action, tx_golb_sorting, tx_golb_sorting_direction, tx_golb_limit, tx_golb_offset, tx_golb_related, ' .
        'pages, tx_golb_exclude, categories,' .
        $defaultPalettes['end'];

};
$boot();
unset($boot);