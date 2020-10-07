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
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.related',
            'displayCond' => 'FIELD:doktype:=:' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE ,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND doktype = ' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ' ORDER BY crdate ASC',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 4,
                'enableMultiSelectFilterTextfield' => true,
            ]
        ],
        'tx_golb_content_elements' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.contentElements',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_field' => 'pid',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
            ]
        ],
        'tx_golb_subpages' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.subpages',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'pages',
                'foreign_field' => 'pid',
                'maxitems' => 9999,
            ]
        ],
        'tx_golb_publish_date' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.publish_date',
            'displayCond' => 'FIELD:doktype:=:' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE ,
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => '13',
                'eval' => 'datetime',
                'default' => '0'
            ]
        ],
        'tx_golb_authors' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.tx_golb_authors',
            'displayCond' => 'FIELD:doktype:=:' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE ,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999,
                'autoSizeMax' => 10,
                'multiple' => 0,
                'foreign_table' => 'tx_golb_domain_model_author',
                'foreign_table_where' => 'AND tx_golb_domain_model_author.sys_language_uid IN (0,-1) ORDER BY tx_golb_domain_model_author.name ASC',
                'MM' => 'tx_golb_pages_author_mm',
                'enableMultiSelectFilterTextfield' => 1,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--div--;LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.golbTab, ' .
            'tx_golb_authors, tx_golb_publish_date, tx_golb_related'
    );
};
$boot();
unset($boot);