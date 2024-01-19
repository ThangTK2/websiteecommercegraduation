<?php

    return
    [
        'module' => [
            [
                'title' => 'Quản lý thành viên',
                'icon' => "fa fa-user",
                'subModule' => [
                    [
                        'title' => 'Quản lý nhóm thành viên',
                        'route' => 'user/catalogue/index',
                    ],
                    [
                        'title' => 'Quản lý thành viên',
                        'route' => 'user/index',
                    ],
                ]
                ],
                [
                    'title' => 'Quản lý bài viết',
                    'icon' => "fa fa-file",
                    'subModule' => [
                        [
                            'title' => 'Quản lý nhóm bài viết',
                            'route' => 'post/catalogue/index',
                        ],
                        [
                            'title' => 'Quản lý bài viết',
                            'route' => 'post/index',
                        ],
                    ]
                ]
        ]
    ];
