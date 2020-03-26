<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function ($packageKey) {
    $extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($packageKey);

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

    //New fields
    $GLOBALS['TCA']['tt_content']['columns']['tx_golb_sorting'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:contentElements.sorting',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'varchar'
        ],
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_golb_sorting_direction'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:contentElements.sortingDirection',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'varchar'
        ],
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_golb_limit'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:contentElements.limit',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'int'
        ],
    ];
    $GLOBALS['TCA']['tt_content']['columns']['tx_golb_offset'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:contentElements.offset',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'int'
        ],
    ];

    $GLOBALS['TCA']['tt_content']['columns']['tx_golb_action'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:contentElements.action',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Latest', ''],
                ['List', 'list']
            ]
        ],
    ];
    $GLOBALS['TCA']['pages']['columns']['tx_golb_related'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.related',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'pages',
            'foreign_table_where' => 'AND doktype = ' . \Blog\Golb\Constants::BLOG_POST_DOKTYPE . ' ORDER BY crdate ASC',
            'size' => 5,
            'minitems' => 0,
            'maxitems' => 4,
            'enableMultiSelectFilterTextfield' => true,
        ],
    ];

    $GLOBALS['TCA']['pages']['columns']['tx_golb_content_elements'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.contentElements',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tt_content',
            'foreign_field' => 'pid',
            'foreign_sortby' => 'sorting',
            'maxitems' => 9999,
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', '--div--;Golb, tx_golb_related');

    $GLOBALS['TCA']['pages']['columns']['tx_golb_author_image'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.authorImage',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('authorImage', [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                'minitems' => 0,
                'maxitems' => 1,
            ]
        )
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'pages', // table
        'tx_golb_author_image', // your field definition
        '', // at which types it should appear (f.e. in table tt_content 'textpic' or 'image')
        'after:author_email' // before: or after: the field in the TCA
    );

    $GLOBALS['TCA']['pages']['columns']['tx_golb_subpages'] = [
        'exclude' => 0,
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'pages',
            'foreign_field' => 'pid',
            'maxitems' => 9999,
        ],
    ];

    $GLOBALS['TCA']['sys_category']['columns']['tx_golb_sub_categories'] = [
        'exclude' => 0,
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'sys_category',
            'foreign_field' => 'parent',
            'maxitems' => 9999,
        ],
    ];

    $GLOBALS['TCA']['tt_content']['columns']['tx_golb_exclude'] = [
        'exclude' => 0,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.excludedPages',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'pages',
            'foreign_table_where' => 'AND doktype = ' . \Blog\Golb\Constants::BLOG_POST_DOKTYPE . ' ORDER BY crdate ASC',
            'size' => 5,
            'minitems' => 0,
            'maxitems' => 9999,
            'enableMultiSelectFilterTextfield' => true,
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(['Blog', 'golb'], 'CType');
    $GLOBALS['TCA']['tt_content']['types']['golb']['showitem'] =
        'CType;;4;button;1-1-1, tx_golb_action, tx_golb_sorting, tx_golb_sorting_direction, tx_golb_limit, tx_golb_offset, tx_golb_related, pages, tx_golb_exclude, categories,
		--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.access,starttime, endtime, fe_group';

    //Set new page types
    $GLOBALS['TCA']['pages']['types'][\Blog\Golb\Constants::BLOG_POST_DOKTYPE] = $GLOBALS['TCA']['pages']['types']['1'];

    $pageItems = &$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'];
    array_push($pageItems, ['Golb', '--div--']);
    array_push($pageItems, ['Blog post', \Blog\Golb\Constants::BLOG_POST_DOKTYPE, 'EXT:golb/Resources/Public/Icons/doktype_blogpost.gif']);

    $pageOverlayItems = &$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'];
    array_push($pageOverlayItems, ['Golb', '--div--']);
    array_push($pageOverlayItems, ['Blog post', \Blog\Golb\Constants::BLOG_POST_DOKTYPE, 'EXT:golb/Resources/Public/Icons/doktype_blogpost.gif']);

    $GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'][] = [
        'Blog post',
        \Blog\Golb\Constants::BLOG_POST_DOKTYPE,
        'EXT:golb/Resources/Public/Icons/doktype_blogpost.gif'
    ];

    \TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
        'pages',
        \Blog\Golb\Constants::BLOG_POST_DOKTYPE,
        $extPath . 'Resources/Public/Icons/doktype_blogpost.gif'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . \Blog\Golb\Constants::BLOG_POST_DOKTYPE . ')'
    );
};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);