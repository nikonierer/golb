<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$tempColumns = [
    'tx_golb_author' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:fe_users.tx_golb_description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'foreign_table' => 'tx_golb_domain_model_author',
            'size' => 1,
            'minitems' => 0,
            'maxitems' => 1,
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    'tx_golb_author',
    '',
    'after:image'
);