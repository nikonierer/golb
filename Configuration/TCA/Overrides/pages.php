<?php
defined('TYPO3') or die();

$boot = function () {
    $ll = 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:';
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
                    $GLOBALS['TCA']['pages']['types'][\TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_DEFAULT]
            ]
        ]
    );

    $tempColumns = [
        'tx_golb_related' => [
            'exclude' => 0,
            'label' => $ll . 'pages.tx_golb_related',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'MM' => 'tx_golb_page_related_page_mm',
                'foreign_table' => 'pages',
                'foreign_table_where' => ' AND pages.doktype = ' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ' AND (pages.sys_language_uid IN (-1,0) OR pages.l10n_parent = 0) ORDER BY pages.title',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 99,
                'multiple' => false,

                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'tx_golb_content_elements' => [
            'exclude' => 0,
            'label' => $ll . 'pages.tx_golb_contentElements',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
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
            'label' => $ll . 'pages.tx_golb_author_image',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
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
            'label' => $ll . 'pages.tx_golb_subpages',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'pages',
                'foreign_field' => 'pid',
                'maxitems' => 9999,
            ]
        ],
        'tx_golb_publish_date' => [
            'label' => $ll . 'pages.tx_golb_publish_date',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => '13',
                'eval' => 'datetime',
                'default' => '0'
            ]
        ],
        'tx_golb_tags' => [
            'exclude' => true,
            'label' => $ll . 'pages.tx_golb_tags',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'MM' => 'tx_golb_page_tag_mm',
                'foreign_table' => 'tx_golb_domain_model_tag',
                'foreign_table_where' => ' AND (tx_golb_domain_model_tag.sys_language_uid IN (-1,0) OR tx_golb_domain_model_tag.l10n_parent = 0) ORDER BY tx_golb_domain_model_tag.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 99,
                'multiple' => false,

                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'tx_golb_archived' => [
            'exclude' => true,
            'label' => $ll . 'pages.tx_golb_archived',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
        'tx_golb_top_post' => [
            'exclude' => true,
            'label' => $ll . 'pages.tx_golb_top_post',
            'displayCond' => 'FIELD:doktype:=:'.\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE,
            'config' => [
                'type' => 'check',
                'default' => 0
            ]
        ],
    ];

    $GLOBALS['PAGES_TYPES'][\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE] = [
        'type' => 'web',
        'allowedTables' => '*',
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages',
        '--div--;LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.golbTab, ' .
            'tx_golb_publish_date, tx_golb_archived, tx_golb_top_post, tx_golb_tags, tx_golb_related'
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