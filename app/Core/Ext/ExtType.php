<?php


namespace LitShop\Core\Ext;


/**
 * 扩展的类型定义
 *      大分类(2位）小分类(3位）子分类（3位）
 *
 * Class ExtType
 * @package LitShop\Core\Ext
 */
class ExtType
{
    #[name('完全自定义')]
    public const custom = 10100000;

    #[name('销售渠道')]
    public const distribution_channel = 20200000;

    #[name('营销玩法')]
    public const marketing = 20300000;

    #[name('客群维护')]
    public const customer_maintain = 20400000;

    #[name('经营分析')]
    public const business_analysis = 20500000;

    /**
     * 订单管理
     */
    public const order_manage = 20600000;

    /**
     * 商品管理
     */
    public const goods_manage = 20700000;

    /**
     * 库存管理
     */
    public const stock_manage = 20800000;

    /**
     * 支付工具
     */
    public const payment_kit = 20900000;

    /**
     * 物流仓储/配送
     */
    public const shipping_tools = 20110000;

    /**
     * 其他工具
     */
    public const tool_kit = 20120000;

    /**
     * 模板
     */
    public const template = 30100000;

}
