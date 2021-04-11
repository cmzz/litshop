<?php

namespace LitShop\CP\Goods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LitCore\Entities\Goods;
use Util\FormBuilder\FormBuilder;
use Util\FormField\FormFieldTypes;
use LitShop\CP\BaseCpComponent as Component;

class Create extends Component
{
    public array $formConf = [
        [
            'section' => '基本信息',
            'fields' => [
                [
                    'show_asterisk' => false,
                    'label' => '商品类型',
                    'type' => FormFieldTypes::RADIO_BOX,
                    'name' => 'goods_type',
                    'value' => 'goods_type_sw',
                    'options' => [
                        'goods_type_sw' => [
                            'title' => '实物商品',
                            'sub_title' => '(需要物流)',
                        ],
                        'goods_type_xn' => [
                            'title' => '虚拟商品',
                            'sub_title' => '(无需物流)',
                        ]
                    ],
                    'rule' => [],
                ],
                [
                    'show_asterisk' => false,
                    'label' => '商品名',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'title',
                    'helper' => '请选择合适商品类型',
                    'palceholder' => '请输入商品标题',
                    'value' => '8888',
                    'rule' => ['required', 'string'],
                ], [
                    'show_asterisk' => false,
                    'label' => '商品类目',
                    'type' => FormFieldTypes::SELECT,
                    'name' => 'catalog',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '分享描述',
                    'type' => FormFieldTypes::TEXT,
                    'value' => '33332',
                    'name' => 'share_tip',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '商品卖点',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'selling_point',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '商品图',
                    'type' => FormFieldTypes::MULTI_IMAGE_UPLOADER,
                    'name' => 'images',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
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
                    'show_asterisk' => false,
                    'label' => '商品规格',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'sku',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '价格',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'price',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '划线价',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'through_line_price',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '库存扣减方式',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'msrp',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '库存',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'stock',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '商品编码',
                    'type' => FormFieldTypes::TEXT,
                    'name' => '',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
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
                    'show_asterisk' => false,
                    'label' => '售后服务',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'after_sales_service',
                    'rule' => [],
                ], [
                    'show_asterisk' => false,
                    'label' => '起售',
                    'type' => FormFieldTypes::TEXT,
                    'name' => 'moq',
                    'rule' => [],
                ],
            ],
        ]
    ];

    public array $formFields = [];

    protected array $rules = [];
    public array $creationData;

    public function mount()
    {
        parent::mount();

        if ($this->formConf) {
            foreach ($this->formConf as $section) {
                if (isValidityArrayField($section, 'fields')) {
                    foreach ($section['fields'] as $_field) {
                        if (data_get($_field,'name')) {
                            $this->creationData[data_get($_field,'name')] = data_get($_field,'value');
                            $this->rules['creationData.'.data_get($_field,'name')] = data_get($_field,'value');
                        }
                    }
                }
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
