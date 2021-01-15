<?php


return [
    'cp' => [
        [
            'name' => '概况',
            'section' => 'default',
            'icon' => 'presentation-chart-line',
            'children' => [],
            'active' => '',
            'order' => 0,
            'isDefault' => true,
            'route' => [
                'cp.index'
            ],
        ],[
            'name' => '商品',
            'section' => 'goods',
            'icon' => 'cube',
            'active' => '',
            'order' => 0,
            'children' => [
                [
                    'name' => '订单管理',
                    'active' => '',
                    'order' => 0,
                    'section' => 'trade',
                    'children' => [
                        [
                            'name' => '全部订单',
                            'active' => '',
                            'order' => 0,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                        [
                            'name' => '退款订单',
                            'active' => '',
                            'order' => 10,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                        [
                            'name' => '售后订单',
                            'active' => '',
                            'order' => 20,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                        [
                            'name' => '已关闭订单',
                            'active' => '',
                            'order' => 30,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                    ]
                ],

                [
                    'name' => '商品管理',
                    'active' => '',
                    'section' => 'goods',
                    'order' => 1,
                    'isDefault' => true,
                    'route' => [
                        'cp.goods.manage'
                    ],
                ],
                [
                    'name' => '发布商品',
                    'active' => '',
                    'order' => 10,
                    'section' => 'goods',
                    'route' => [
                        'cp.goods.new'
                    ],
                ],
                [
                    'name' => '出售中的商品',
                    'active' => '',
                    'order' => 20,
                    'section' => 'goods',
                    'route' => [
                        'cp.goods.manage',
                        [
                            'status' => 'onsale'
                        ]
                    ]
                ],
                [
                    'name' => '仓库中的商品',
                    'active' => '',
                    'order' => 30,
                    'section' => 'goods',
                    'route' => [
                        'cp.goods.manage',
                        [
                            'status' => 'instock'
                        ]
                    ]
                ],
                [
                    'name' => '商品分类',
                    'active' => '',
                    'order' => 40,
                    'section' => 'goods',
                    'route' => [
                        'cp.goods.category'
                    ],
                ],
                [
                    'name' => '品牌',
                    'active' => '',
                    'order' => 50,
                    'section' => 'goods',
                    'route' => [
                        'cp.goods.brand'
                    ],
                ],
            ]
        ],

        [
            'name' => '交易',
            'section' => 'trade',
            'order' => 10,
            'icon' => 'menu-alt-2',
            'children' => [
                [
                    'name' => '订单管理',
                    'active' => '',
                    'order' => 0,
                    'section' => 'trade',
                    'children' => [
                        [
                            'name' => '全部订单',
                            'active' => '',
                            'order' => 0,
                            'section' => 'trade',
                            'isDefault' => true,
                            'route' => [
                                'cp.index'
                            ]
                        ],
                        [
                            'name' => '退款订单',
                            'active' => '',
                            'order' => 10,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                        [
                            'name' => '售后订单',
                            'active' => '',
                            'order' => 20,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                        [
                            'name' => '已关闭订单',
                            'active' => '',
                            'order' => 30,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ]
                        ],
                    ]
                ],

                [
                    'name' => '物流工具',
                    'active' => '',
                    'order' => 10,
                    'section' => 'trade',
                    'children' => [
                        [
                            'name' => '快递',
                            'active' => '',
                            'order' => 0,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ],
                        ],
                        [
                            'name' => '发货',
                            'active' => '',
                            'order' => 0,
                            'section' => 'trade',
                            'route' => [
                                'cp.index'
                            ],
                        ],
                    ]
                ]

            ],
            'active' => '',
            'route' => [
                'cp.index'
            ],
        ],[
            'name' => '客户',
            'section' => 'customer',
            'icon' => 'user-group',
            'children' => [],
            'active' => '',
            'order' => 30,
            'route' => [
                'cp.index'
            ],
        ],[
            'name' => '设置',
            'section' => 'setting',
            'url' => '/cp',
            'order' => 40,
            'icon' => 'cog',
            'children' => [],
            'active' => '',
            'route' => [
                'cp.index'
            ],
        ],
    ]
];
