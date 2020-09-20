<?php
declare(strict_types = 1);

return [
    \Greenfieldr\Golb\Domain\Model\Page::class => [
        'tableName' => 'pages',
        'properties' => [
            'authorImage' => [
                'fieldName' => 'tx_golb_author_image'
            ],
            'viewCount' => [
                'fieldName' => 'tx_golb_view_count'
            ],
            'relatedPosts' => [
                'fieldName' => 'tx_golb_related'
            ],
            'postsSorting' => [
                'fieldName' => 'tx_golb_sorting'
            ],
            'limit' => [
                'fieldName' => 'tx_golb_limit'
            ],
            'offset' => [
                'fieldName' => 'tx_golb_offset'
            ],
            'action' => [
                'fieldName' => 'tx_golb_action'
            ],
            'contentElements' => [
                'fieldName' => 'tx_golb_content_elements'
            ],
            'subpages' => [
                'fieldName' => 'tx_golb_subpages'
            ],
            'excludedPages' => [
                'fieldName' => 'tx_golb_exclude'
            ],
            'subCategories' => [
                'fieldName' => 'tx_golb_sub_categories'
            ],
            'publishDate' => [
                'fieldName' => 'tx_golb_publish_date'
            ],
        ],
    ],
    \Greenfieldr\Golb\Domain\Model\ContentElement::class => [
        'tableName' => 'tt_content',
    ],
    \Greenfieldr\Golb\Domain\Model\Category::class => [
        'tableName' => 'sys_category',
    ]
];
