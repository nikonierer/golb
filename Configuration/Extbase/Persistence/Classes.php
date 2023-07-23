<?php
declare(strict_types = 1);

return [
    \Greenfieldr\Golb\Domain\Model\Page::class => [
        'tableName' => 'pages',
        'properties' => [
            'creationDate' => [
                'fieldName' => 'crdate'
            ],
            'authorImage' => [
                'fieldName' => 'tx_golb_author_image'
            ],
            'relatedPages' => [
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
            'tags' => [
                'fieldName' => 'tx_golb_tags'
            ],
            'archived' => [
                'fieldName' => 'tx_golb_archived'
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
