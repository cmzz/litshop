<?php
namespace LitCore\Ext;

//扩展的类型定义
class ExtType {
	// 完全自定义
	public const CUSTOM = 10100000;

	// 销售渠道
	public const DISTRIBUTION_CHANNEL = 20200000;

	// 营销玩法
	public const MARKETING = 20300000;

	// 客群维护
	public const CUSTOMER_MAINTAIN = 20400000;

	// 经营分析
	public const BUSINESS_ANALYSIS = 20500000;

	// 订单管理
	public const ORDER_MANAGE = 20600000;

	// 商品管理
	public const GOODS_MANAGE = 20700000;

	// 库存管理
	public const STOCK_MANAGE = 20800000;

	// 支付工具
	public const PAYMENT_KIT = 20900000;

	// 物流仓储/配送
	public const SHIPPING_TOOLS = 20110000;

	// 其他工具
	public const TOOL_KIT = 20120000;

	// 模板
	public const TEMPLATE = 30100000;


	// 完全自定义
	public const CUSTOM_TITLE = '完全自定义';

	// 销售渠道
	public const DISTRIBUTION_CHANNEL_TITLE = '销售渠道';

	// 营销玩法
	public const MARKETING_TITLE = '营销玩法';

	// 客群维护
	public const CUSTOMER_MAINTAIN_TITLE = '客群维护';

	// 经营分析
	public const BUSINESS_ANALYSIS_TITLE = '经营分析';

	// 订单管理
	public const ORDER_MANAGE_TITLE = '订单管理';

	// 商品管理
	public const GOODS_MANAGE_TITLE = '商品管理';

	// 库存管理
	public const STOCK_MANAGE_TITLE = '库存管理';

	// 支付工具
	public const PAYMENT_KIT_TITLE = '支付工具';

	// 物流仓储/配送
	public const SHIPPING_TOOLS_TITLE = '物流仓储/配送';

	// 其他工具
	public const TOOL_KIT_TITLE = '其他工具';

	// 模板
	public const TEMPLATE_TITLE = '模板';


	public const defines = [
		['custom', 10100000, '完全自定义'],
		['distribution_channel', 20200000, '销售渠道'],
		['marketing', 20300000, '营销玩法'],
		['customer_maintain', 20400000, '客群维护'],
		['business_analysis', 20500000, '经营分析'],
		['order_manage', 20600000, '订单管理'],
		['goods_manage', 20700000, '商品管理'],
		['stock_manage', 20800000, '库存管理'],
		['payment_kit', 20900000, '支付工具'],
		['shipping_tools', 20110000, '物流仓储/配送'],
		['tool_kit', 20120000, '其他工具'],
		['template', 30100000, '模板'],
	];

	public static function customTitle(): string {
		return self::CUSTOM_TITLE;
	}

	public static function distributionChannelTitle(): string {
		return self::DISTRIBUTION_CHANNEL_TITLE;
	}

	public static function marketingTitle(): string {
		return self::MARKETING_TITLE;
	}

	public static function customerMaintainTitle(): string {
		return self::CUSTOMER_MAINTAIN_TITLE;
	}

	public static function businessAnalysisTitle(): string {
		return self::BUSINESS_ANALYSIS_TITLE;
	}

	public static function orderManageTitle(): string {
		return self::ORDER_MANAGE_TITLE;
	}

	public static function goodsManageTitle(): string {
		return self::GOODS_MANAGE_TITLE;
	}

	public static function stockManageTitle(): string {
		return self::STOCK_MANAGE_TITLE;
	}

	public static function paymentKitTitle(): string {
		return self::PAYMENT_KIT_TITLE;
	}

	public static function shippingToolsTitle(): string {
		return self::SHIPPING_TOOLS_TITLE;
	}

	public static function toolKitTitle(): string {
		return self::TOOL_KIT_TITLE;
	}

	public static function templateTitle(): string {
		return self::TEMPLATE_TITLE;
	}

	public static function titleByValue($value) {
		return collect(self::defines)->keyBy('1')->get($value)[2];
	}

	public static function titleByName($name) {
		return collect(self::defines)->keyBy('0')->get($name)[2];
	}

	public static function names(): array {
		return collect(self::defines)->pluck('0')->toArray();
	}

	public static function titles(): array {
		return collect(self::defines)->pluck('2')->toArray();
	}

}
