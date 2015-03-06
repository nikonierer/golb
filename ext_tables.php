<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$boot = function($packageKey) {
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
	$GLOBALS['TCA']['tt_content']['columns']['golb_sorting'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:ttcontent.sorting',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'varchar'
		),
	);
	$GLOBALS['TCA']['tt_content']['columns']['golb_sorting_direction'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:ttcontent.sortingdirection',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'varchar'
		),
	);
	$GLOBALS['TCA']['tt_content']['columns']['golb_limit'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:ttcontent.limit',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'int'
		),
	);
	$GLOBALS['TCA']['tt_content']['columns']['golb_offset'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:ttcontent.offset',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'int'
		),
	);

	$GLOBALS['TCA']['tt_content']['columns']['golb_action'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:ttcontent.action',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('Latest', ''),
				array('List', 'list')
			)
		),
	);
	$GLOBALS['TCA']['pages']['columns']['golb_related'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.related',
		'config' => array(
			'type' => 'select',
			'foreign_table' => 'pages',
			'foreign_table_where' => 'AND doktype = 41 ORDER BY crdate ASC',
			'size' => 5,
			'minitems' => 0,
			'maxitems' => 4,
			'enableMultiSelectFilterTextfield' => TRUE,
		),
	);

	$GLOBALS['TCA']['pages']['columns']['tt_content'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.tt_content',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tt_content',
			'foreign_field' => 'pid',
			'foreign_sortby' => 'sorting',
			'maxitems' => 9999,
		),
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages','--div--;Golb, golb_related, tt_content');

	$GLOBALS['TCA']['pages']['columns']['author_image'] = array(
		'exclude' => 0,
		'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:pages.authorImage',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('author_image', array(
				'appearance' => array(
					'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
				),
				'minitems' => 0,
				'maxitems' => 1,
			)
		)
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
		'pages', // table
		'author_image', // your field definition
		'', // at which types it should appear (f.e. in table tt_content 'textpic' or 'image')
		'after:author_email' // before: or after: the field in the TCA
	);


	$GLOBALS['TCA']['pages']['columns']['subpages'] = array(
		'exclude' => 0,
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'pages',
			'foreign_field' => 'pid',
			'maxitems'      => 9999,
		),
	);

	$GLOBALS['TCA']['sys_category']['columns']['sub_categories'] = array(
		'exclude' => 0,
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'sys_category',
			'foreign_field' => 'parent',
			'maxitems'      => 9999,
		),
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array('Blog', 'golb'), 'CType');
	$GLOBALS['TCA']['tt_content']['types']['golb']['showitem'] =
		'CType;;4;button;1-1-1, golb_action, golb_sorting, golb_sorting_direction, golb_limit, golb_offset, golb_related, pages, categories,
		--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.access,starttime, endtime, fe_group';

	//Set new page types
	$GLOBALS['TCA']['pages']['types']['41'] = $GLOBALS['TCA']['pages']['types']['1'];

	$pageItems = &$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'];
	array_push($pageItems, array('Golb', '--div--'));
	array_push($pageItems, array('Blog post', '41', 'EXT:golb/Resources/Public/Icons/doktype_blogpost.gif'));

	$pageOverlayItems = &$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'];
	array_push($pageOverlayItems, array('Golb', '--div--'));
	array_push($pageOverlayItems, array('Blog post', '41', 'EXT:golb/Resources/Public/Icons/doktype_blogpost.gif'));


	$GLOBALS['TCA']['pages_language_overlay']['columns']['doktype']['config']['items'][] = array(
		'Blog post',
		'41',
		'EXT:golb/Resources/Public/Icons/doktype_blogpost.gif'
	);

	\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon(
		'pages',
		'41',
		$extPath . 'Resources/Public/Icons/doktype_blogpost.gif'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
		'options.pageTree.doktypesToShowInNewPageDragArea := addToList(41)'
	);

};

/** @var string $_EXTKEY */
$boot($_EXTKEY);
unset($boot);