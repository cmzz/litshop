<?php

namespace LitShop\CP\Goods;

use Illuminate\Http\Request;
use Util\FormBuilder\FormBuilder;
use Util\FormField\FormFieldTypes;
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
                    'type' => FormFieldTypes::RADIO_BOX,
                    'name' => 'shipment_type',
                    'rule' => [],
                ],
                [
                    'showAsterisk' => false,
                    'label' => '商品名',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'title',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品类目',
                    'type' => FormFieldTypes::SELECT,
                    'name' => 'catalog',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '分享描述',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'share_tip',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品卖点',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'selling_point',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品图',
                    'type' => FormFieldTypes::MULTI_IMAGE_UPLOADER,
                    'name' => 'images',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品分组',
                    'type' => FormFieldTypes::MULTI_SELECT,
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
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'sku',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '价格',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'price',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '划线价',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'through_line_price',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '库存扣减方式',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'msrp',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '库存',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'stock',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '商品编码',
                    'type' => FormFieldTypes::TEXT,
                    'name' => '',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '成本价',
                    'type' => FormFieldTypes::TEXT,
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
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'after_sales_service',
                    'rule' => [],
                ], [
                    'showAsterisk' => false,
                    'label' => '起售',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'moq',
                    'rule' => [],
                ],
            ],
        ]
    ];

    public array $formFields;

    public function mount()
    {
        parent::mount();

        if ($this->formConf) {
            $this->formFields = FormBuilder::build($this->formConf);
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
