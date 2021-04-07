<?php

namespace LitShop\CP\Goods;

use Illuminate\Http\Request;
use LitShop\CP\BaseCpComponent as Component;

class Create extends Component
{
    protected array $formConf = [
        [
            'section' => '基本信息',
            'fields' => [
                [
                    'showAsterisk' => false,
                    'label' => '商品类型',
                    'type' => 'radio',
                    'name' => 'shipment_type',
                    'rule' => [],
                ],
                [
                    'showAsterisk' => false,
                    'label' => '商品名',
                    'type' => 'text',
                    'name' => 'title',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品类目',
                    'type' => 'select',
                    'name' => 'catalog',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '分享描述',
                    'type' => 'text',
                    'name' => 'share_tip',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品卖点',
                    'type' => 'text',
                    'name' => 'selling_point',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品图',
                    'type' => 'multi_image',
                    'name' => 'images',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品分组',
                    'type' => 'multi_select',
                    'name' => 'category',
                    'rule' => [],
                ],
            ]
        ],
        [
            'section' => '价格库存',
            'fields' => [
                [
                    'showAsterisk' => false,
                    'label' => '商品规格',
                    'type' => 'text',
                    'name' => 'sku',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '价格',
                    'type' => 'text',
                    'name' => 'price',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '划线价',
                    'type' => 'text',
                    'name' => '',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '库存扣减方式',
                    'type' => 'text',
                    'name' => 'msrp',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '库存',
                    'type' => 'text',
                    'name' => 'stock',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品编码',
                    'type' => 'text',
                    'name' => '',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '成本价',
                    'type' => 'text',
                    'name' => 'cost',
                    'rule' => [],
                ],
            ]
        ],
        [
            'section' => '其他信息',
            'fields' => [
                [
                    'showAsterisk' => false,
                    'label' => '售后服务',
                    'type' => 'text',
                    'name' => '',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '起售',
                    'type' => 'text',
                    'name' => 'moq',
                    'rule' => [],
                ],
            ],
        ]
    ];

    public function mount()
    {
        parent::mount();

        if ($this->formConf) {
            foreach ($this->formConf as $item) {
                $this->$item['name'] = $item['value'];
                dd($item);
            }
        }

    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

    public function render()
    {
        return view('cp.goods.create')->layout('layouts.cp');
    }
}
