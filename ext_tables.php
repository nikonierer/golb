
<?php
defined('TYPO3') or die();

$boot = function ($packageKey) {
    $GLOBALS['PAGES_TYPES'][\Greenfieldr\Golb\Constants::BLOG_POST_DOKTYPE] = [
        'type' => 'web',
        'allowedTables' => '*',
    ];
};

$boot('golb');
unset($boot);