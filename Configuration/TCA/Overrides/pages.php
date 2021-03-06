<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'pages',
        'doktype',
        [
            'LLL:EXT:golb/Resources/Private/Language/locallang_tca.xlf:doktype.post',
            \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'apps-pagetree-post',
        ],
        '1',
        'after'
    );

    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['pages'],
        [
            'ctrl' => [
                'typeicon_classes' => [
                    \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE => 'apps-pagetree-post',
                ],
            ],
            'types' => [
                (string) \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE =>
                    $GLOBALS['TCA']['pages']['types'][\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_DEFAULT]
            ]
        ]
    );

    $tempColumns = [
        'tx_golb_related' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.tx_golb_related',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND doktype = ' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ' ORDER BY crdate ASC',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 99,
                'enableMultiSelectFilterTextfield' => true,
            ]
        ],
        'tx_golb_content_elements' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.tx_golb_contentElements',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_field' => 'pid',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
            ]
        ],
        'tx_golb_author_image' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.authorImage',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('authorImage', [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'minitems' => 0,
                    'maxitems' => 1,
                ]
            )
        ],
        'tx_golb_subpages' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.tx_golb_subpages',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'pages',
                'foreign_field' => 'pid',
                'maxitems' => 9999,
            ]
        ],
        'tx_golb_publish_date' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.tx_golb_publish_date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => '13',
                'eval' => 'datetime',
                'default' => '0'
            ]
        ]
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--div--;LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.golbTab, ' .
            'tx_golb_publish_date, tx_golb_related'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        'tx_golb_author_image',
        '',
        'after:author_email'
    );
};
$boot();
unset($boot);