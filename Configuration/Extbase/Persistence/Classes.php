<?php
declare(strict_types = 1);

return [
    \Greenfieldr\Golb\Domain\Model\Page::class => [
        'tableName' => 'pages',
        'properties' => [
            'creationDate' => [
                'fieldName' => 'crdate'
            ],
            'createUserId' => [
                'fieldName' => 'cruser_id'
            ],
            'subpages' => [
                'fieldName' => 'tx_golb_subpages'
            ]
        ],
    ],
    \Greenfieldr\Golb\Domain\Model\ContentElement::class => [
        'tableName' => 'tt_content'
    ],
    \Greenfieldr\Golb\Domain\Model\Category::class => [
        'tableName' => 'sys_category',
    ],
    \Greenfieldr\Golb\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'author' => [
                'fieldName' => 'tx_golb_domain_model_author'
            ]
        ]
    ]
];
