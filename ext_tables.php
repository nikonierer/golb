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

    $GLOBALS['PAGES_TYPES'][\Blog\Golb\Constants::BLOG_POST_DOKTYPE] = [
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
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . \Blog\Golb\Constants::BLOG_POST_DOKTYPE . ')'
    );
};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);