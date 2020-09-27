<?php

/*
 * This file is part of the "golb" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author',
        'iconfile' => 'EXT:golb/Resources/Public/Icons/tx_golb_domain_model_author.svg',
        'label' => 'name',
        'label_alt' => 'frontend_user',
        'label_alt_force' => 0,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY name',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'uid,name,email',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,name,image,website,email,description,posts',
    ],
    'columns' => [
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'name' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.name',
            'displayCond' => 'FIELD:frontend_user:=:0',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required',
            ],
            'l10n_display' => 'defaultAsReadonly',
            'l10n_mode' => 'exclude',
        ],
        'frontend_user' => [
            'exclude' => 1,
            'onChange' => 'reload',
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.frontend_user',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'items' => [
                    [
                        'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.frontend_user.none',
                        0
                    ],
                ],
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
            ]
        ],
        'images' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.images',
            'displayCond' => 'FIELD:frontend_user:=:0',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    crop,
                                    --palette--;;filePalette
                                '
                            ],
                        ],
                    ],
                    'minitems' => 0,
                    'maxitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            'l10n_mode' => 'exclude',
        ],
        'website' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.website',
            'displayCond' => 'FIELD:frontend_user:=:0',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'domainname',
            ],
            'l10n_mode' => 'exclude',
        ],
        'email' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.email',
            'displayCond' => 'FIELD:frontend_user:=:0',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required,email',
            ],
            'l10n_mode' => 'exclude',
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.description',
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 15,
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ]
        ],
        'posts' => [
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tx_golb_domain_model_author.posts',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'multiple' => 0,
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND {#pages}.{#doktype}=' . \Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE . ' AND {#pages}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_golb_pages_author_mm',
                'MM_opposite_field' => 'authors',
                'minitems' => 0,
                'maxitems' => 99999,
            ],
            'l10n_mode' => 'exclude',
        ],
    ],
    'sys_language_uid' => [
        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
        'config' => [
            'type' => 'select',
            'default' => 0,
            'renderType' => 'selectSingle',
            'foreign_table' => 'sys_language',
            'foreign_table_where' => 'ORDER BY sys_language.title',
            'items' => [
                ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages', -1],
                ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', 0],
            ],
        ],
    ],
    'l18n_parent' => [
        'displayCond' => 'FIELD:sys_language_uid:>:0',
        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', 0],
            ],
            'foreign_table' => 'tx_golb_domain_model_author',
            'foreign_table_where' => 'AND tx_golb_domain_model_author.pid=###CURRENT_PID### AND tx_golb_domain_model_author.sys_language_uid IN (-1,0)',
        ],
    ],
    'l18n_diffsource' => [
        'config' => [
            'type' => 'passthrough',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'frontend_user, name, email, website, images, description, posts'
        ]
    ]
];