<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function () {
    $tempColoumns = [
        'tx_golb_sub_categories' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:golb/Resources/Private/Language/locallang_db.xlf:tt_content.tx_golb_sub_categories',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_category',
                'foreign_field' => 'parent',
                'maxitems' => 9999,
            ],
        ],
    ];



};
$boot();
unset($boot);