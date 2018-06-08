<?php

return [
    'uploads' => [
        'storage' => 'upload',
        'webPath' => '/uploads'
    ],
    'system_key' => [
        'blog_name',
        'motto',
        'title',
        'seo_keyword',
        'seo_desc',
        'icp',
        'github_url',
        'qq',
//        'disqus_short_name',
//        'duoshuo_short_name',
        'comment_plugin',
        'statistics_script',
        'comment_script'
    ],
    'menu' => [
        [
            'lufeijun.home' => [
                'icon'  => 'fa fa-home',
                'name'  => 'Home'
            ]

        ],
        [
            'tree_title' => [
                'icon' => 'fa fa-files-o',
                'name' => '文章'
            ],
            'lufeijun.article.index' => [
                'icon' => '',
                'name' => '文章管理'
            ],
            'lufeijun.article.create' => [
                'icon' => '',
                'name' => '发布文章'
            ],
            'lufeijun.category.index' => [
                'icon' => '',
                'name' => '文章分类'
            ]
        ],
        [
            'lufeijun.comment.index'=>[
                'icon'=>'fa fa-comments',
                'name'=>'评论'
            ]
        ],
        [
            'lufeijun.tag.index' => [
                'icon' => 'fa fa-tags',
                'name' => '标签'
            ]
        ],
        [
            'lufeijun.upload.index' => [
                'icon' => 'fa fa-file-image-o',
                'name' => '文件'
            ]
        ],
        [
            'lufeijun.navigation.index' => [
                'icon' => 'fa fa-navicon',
                'name' => '导航'
            ]
        ],
        [
            'tree_title' => [
                'icon' => 'fa fa-user',
                'name' => '用户'
            ],
            'lufeijun.user.index' => [
                'icon' => '',
                'name' => '用户管理'
            ],
            'lufeijun.user.create' => [
                'icon' => '',
                'name' => '用户添加'
            ]
        ],
        [
            'tree_title' => [
                'icon' => 'fa fa-cog',
                'name' => '设置'
            ],
            'lufeijun.system.index' => [
                'icon' => '',
                'name' => '系统设置'
            ],
            'lufeijun.link.index' => [
                'icon' => '',
                'name' => '友情链接'
            ],
            'lufeijun.page.index' => [
                'icon' => '',
                'name' => '自定义页面'
            ]
        ]
    ]
];