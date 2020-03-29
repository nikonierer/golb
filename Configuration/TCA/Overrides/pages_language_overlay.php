<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'pages_language_overlay',
        'doktype',
        [
            'LLL:EXT:golb/Resources/Private/Language/locallang_tca.xlf:doktype.post',
            \Blog\Golb\Constants::BLOG_POST_DOKTYPE,
            'apps-pagetree-post',
        ],
        '1',
        'after'
    );

    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['pages_language_overlay'],
        [
            'ctrl' => [
                'typeicon_classes' => [
                    \Blog\Golb\Constants::BLOG_POST_DOKTYPE => 'apps-pagetree-post',
                ],
            ],
            'types' => [
                (string) \Blog\Golb\Constants::BLOG_POST_DOKTYPE =>
                    $GLOBALS['TCA']['pages_language_overlay']['types'][\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_DEFAULT]
            ]
        ]
    );
};
$boot();
unset($boot);