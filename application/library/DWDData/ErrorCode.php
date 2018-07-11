<?php
/**
 * @file DWDData_ErrorCode.php
 *
 * @author caowei
 *         @date 2015-08-22 下午00:23:36
 *         @brief 系统错误号和错误消息类
 *
 *
 */
class DWDData_ErrorCode
{
    const NORMAL               = 0;
    const NORMAL_MSG           = 'success';
    const NORMAL_APP_MSG       = 'OK';

    // 参数错误
    const MSG_PARAMS_NOT_ARRAY = '参数不是数组';

    // 数据错误
    const MSG_NOTSAFE          = '信息不是数组';

    //未知错误
    const ERRNO_UNKNOW         = '未知错误';


    const XSS_SAFE_ERRNO       = 990001;
    const REDIS_CONNECT_FAILED = 990002;
    const SERVER_ERROR         = 990000;
    const SERVER_ERROR_MSG     = '系统错误';


    const PARAMS_ERROR         = 800001;
    const PARAMS_ERROR_MSG     = '参数错误';
    const FORBBIDEN            = 800403;
    const FORBBIDEN_MSG        = '禁止访问';
    const INSERT_ERROR         = 300001;
    const INSERT_ERROR_MSG     = '插入失败';
    const UPDATE_ERROR         = 300002;
    const UPDATE_ERROR_MSG     = '更新失败';
    const RECORD_EXISTED_ERROR         = 300003;
    const RECORD_EXISTED_ERROR_MSG     = '记录已存在';
    const RECORD_NOT_EXISTED_ERROR     = 300004;
    const RECORD_NOT_EXISTED_ERROR_MSG = '记录不存在';


    // 公用错误
    const TEXT_EMPTY_ERROR              = 110001;
    const TEXT_EMPTY_ERROR_MSG          = '请求参数不能为空';
    const TEXT_LONG_ERROR               = 110002;
    const TEXT_LONG_ERROR_MSG           = '请求参数不能过长';
    const TEXT_FORMAT_ERROR             = 110003;
    const TEXT_FORMAT_ERROR_MSG         = '格式不正确';
    const REQUEST_METHOD_ERROR          = 110004;
    const REQUEST_METHOD_ERROR_MSG      = '请求方式错误';
    const REQUEST_URL_ERROR             = 110005;
    const REQUEST_URL_ERROR_MSG         = '请求URL错误';


    //订单相关
    const ORDER_NOT_FOUND                   = 210001;
    const ORDER_NOT_FOUND_MSG               = '订单不存在';
    const ORDER_CREATED_FAILED              = 210002;
    const ORDER_CREATED_FAILED_MSG          = '下单失败';
    const ORDER_SKU_STOCK_LIMIT             = 210003;
    const ORDER_SKU_STOCK_LIMIT_MSG         = '部分商品库存不足';
    const TMP_ORDER_NOT_EXISTED             = 210004;
    const TMP_ORDER_NOT_EXISTED_MSG         = '临时订单不存在';
    const TRADE_ORDER_NOT_EXISTED           = 210005;
    const TRADE_ORDER_NOT_EXISTED_MSG       = '订单不存在';
    const FORBBIDEN_CANCEL_ORDER            = 210006;
    const FORBBIDEN_CANCEL_ORDER_MSG        = '无权限取消订单';
    const CANCEL_ORDER_STATUS_INVALID       = 210007;
    const CANCEL_ORDER_STATUS_INVALID_MSG   = '订单状态无法取消';
    const CANCEL_ORDER_FAILED               = 210008;
    const CANCEL_ORDER_FAILED_MSG           = '取消订单失败';
    const ADD_THIRDPARTY_ORDER_FAILED       = 210009;
    const ADD_THIRDPARTY_ORDER_FAILED_MSG   = '添加第三方订单失败';
    const THIRDPARTY_ORDER_NOT_EXISTED      = 210010;
    const THIRDPARTY_ORDER_NOT_EXISTED_MSG  = '第三方订单不存在';
    const CREATE_ORDER_PAYMENT_FAILED       = 210011;
    const CREATE_ORDER_PAYMENT_FAILED_MSG   = '创建支付失败';
    const ORDER_PAYMENT_NOT_EXISTED         = 210012;
    const ORDER_PAYMENT_NOT_EXISTED_MSG     = '支付单不存在';
    const ORDER_PAYMENT_STATUS_INVALID      = 210013;
    const ORDER_PAYMENT_STATUS_INVALID_MSG  = '支付单状态不合法';
    const FINISH_ORDER_PAYMENT_FAILED       = 210014;
    const FINISH_ORDER_PAYMENT_FAILED_MSG   = '完成支付订单失败';
    const ORDER_INFO_INVALID                = 210015;
    const ORDER_INFO_INVALID_MSG            = '订单信息不合法';
    const SYNC_ORDER_DELIVERY_FAILED        = 210016;
    const SYNC_ORDER_DELIVERY_FAILED_MSG    = '同步订单物流信息失败';
    const DELIVERY_MESSAGE_NOT_EXISTED      = 210017;
    const DELIVERY_MESSAGE_NOT_EXISTED_MSG  = '订单物流信息不存在';
    const CREATE_REFUND_PAYMENT_FAILED      = 210018;
    const CREATE_REFUND_PAYMENT_FAILED_MSG  = '创建退款单失败';
    const FINISH_PAYMENT_STATUS_INVALID     = 210019;
    const FINISH_PAYMENT_STATUS_INVALID_MSG = '完成支付单状态不合法';
    const FINISH_ORDER_STATUS_INVALID       = 210020;
    const FINISH_ORDER_STATUS_INVALID_MSG   = '订单状态无法确认收货';
    const FORBBIDEN_OPERATOR_ORDER          = 210021;
    const FORBBIDEN_OPERATOR_ORDER_MSG      = '无权限操作订单';
    const COMMENT_ORDER_STATUS_INVALID      = 210022;
    const COMMENT_ORDER_STATUS_INVALID_MSG  = '订单状态无法评价';
    const ORDER_ALREADY_COMMENTED           = 210023;
    const ORDER_ALREADY_COMMENTED_MSG       = '订单已评价';
    const ORDER_COMMENT_FAILED              = 210024;
    const ORDER_COMMENT_FAILED_MSG          = '订单评价失败';
    const UPDATE_REFUND_PAYMENT_FAILED      = 210025;
    const UPDATE_REFUND_PAYMENT_FAILED_MSG  = '更新退款单失败';
    const REFUND_MONEY_MORE_THAN_PAID       = 210026;
    const REFUND_MONEY_MORE_THAN_PAID_MSG   = '退款金额超过支付金额';
    const REFUND_PATMENT_NOT_EXISTS         = 210027;
    const REFUND_PATMENT_NOT_EXISTS_MSG     = '退款单不存在';
    const REFUND_PATMENT_STATUS_INVALID     = 210028;
    const REFUND_PATMENT_STATUS_INVALID_MSG = '退款单状态不合法';
    const PATMENT_PAID_PRICE_INVALID        = 210029;
    const PATMENT_PAID_PRICE_INVALID_MSG    = '支付单金额不正确';
    const UPDATE_ORDER_SETTLE_STATUS_FAILED     = 210030;
    const UPDATE_ORDER_SETTLE_STATUS_FAILED_MSG = '更新订单对账信息失败';
    const REFUND_PATMENT_AUDIT_FAILED       = 210031;
    const REFUND_PATMENT_AUDIT_FAILED_MSG   = '退款单提交审核失败';
    const COUPON_CODE_NOT_EXISTED           = 210032;
    const COUPON_CODE_NOT_EXISTED_MSG       = '优惠券不存在';
    const COUPON_CODE_NOT_INVALID           = 210033;
    const COUPON_CODE_NOT_INVALID_MSG       = '优惠券不可用';
    const DELIVERY_NUMBER_DUPLICATE         = 210034;
    const DELIVERY_NUMBER_DUPLICATE_MSG     = '订单物流号重复';
    const COUPON_STOCK_LIMIT                = 210035;
    const COUPON_STOCK_LIMIT_MSG            = '优惠券已领完';
    const REFUND_ORDER_NOT_EXISTS           = 210036;
    const REFUND_ORDER_NOT_EXISTS_MSG       = '退款订单不存在';
    const SUBORDER_NOT_EXISTED              = 210037;
    const SUBORDER_NOT_EXISTED_MSG          = '订单不存在';
    const SUBORDER_CANNOT_REFUND            = 210038;
    const SUBORDER_CANNOT_REFUND_MSG        = '订单状态无法操作退款';
    const ORDER_EXT_NOT_EXISTED             = 210039;
    const ORDER_EXT_NOT_EXISTED_MSG         = '订单扩展信息不存在';
    const UPDATE_ORDER_MERCHANT_NOTE_FAILED = 210040;
    const UPDATE_ORDER_MERCHANT_NOTE_FAILED_MSG = '更新订单备注信息失败';
    const PRIVATE_KEY_IS_NOT_EXIST          = 210041;
    const PRIVATE_KEY_IS_NOT_EXIST_MSG      = '私钥不存在';
    const DELIVERY_COMPANY_NOT_EXISTED      = 210042;
    const DELIVERY_COMPANY_NOT_EXISTED_MSG  = '物流公司信息不存在';
    const CREATE_ORDER_COMMSITION_FAILED    = 210043;
    const CREATE_ORDER_COMMSITION_FAILED_MSG = '创建订单分佣信息失败';
    const ORDER_WAS_DELIVERY                 = 210044;
    const ORDER_WAS_DELIVERY_MSG             = '订单已发货/配送完成';
    const ORDER_NOT_PAID                     = 210045;
    const ORDER_NOT_PAID_MSG                 = '订单不是未支付状态';
    const UPDATE_ORDER_COMMSITION_FAILED     = 210046;
    const UPDATE_ORDER_COMMSITION_FAILED_MSG = '更新订单分佣信息失败';
    const PAY_WAY_NOT_EXIST                  = 210047;
    const PAY_WAY_NOT_EXIST_MSG              = '支付方式不存在';
    const ORDER_UPDATE_FAILED                = 210048;
    const ORDER_UPDATE_FAILED_MSG            = '订单更新失败';
    const ADDRESS_ORDER_STATUS_INVALID       = 210049;
    const ADDRESS_ORDER_STATUS_INVALID_MSG   = '订单状态无法修改地址信息';
    const UPDATE_ORDER_FAILED                = 210050;
    const UPDATE_ORDER_FAILED_MSG            = '更新订单失败';
    const UPDATE_REFUND_ORDER_EXT_FAILED     = 210053;
    const UPDATE_REFUND_ORDER_EXT_FAILED_MSG = '更新退款订单附属信息失败';

    const ORDER_STATUS_ABNORMAL               = 210051;
    const ORDER_STATUS_ABNORMAL_MSG           = '订单状态异常';
    const PARTIAL_REFUND_MONEY_INVALID       = 210052;
    const PARTIAL_REFUND_MONEY_INVALID_MSG   = '部分退款金额不合法';
    const ORDER_POINT_PAYMENT_NOT_EXISTED           = 210053;
    const ORDER_POINT_PAYMENT_NOT_EXISTED_MSG       = '积分支付单不存在';
    const CREATE_POINT_REFUND_PAYMENT_FAILED        = 210054;
    const CREATE_POINT_REFUND_PAYMENT_FAILED_MSG    = '创建积分退款单失败';
    const CREATED_POINT_PAYMENT_FAILED              = 210055;
    const CREATED_POINT_PAYMENT_FAILED_MSG          = '创建积分支付单失败';
    const POINT_PAYMENT_NOT_EXISTED                 = 210056;
    const POINT_PAYMENT_NOT_EXISTED_MSG             = '积分支付单不存在';
    const POINT_PAYMENT_STATUS_INVALID              = 210057;
    const POINT_PAYMENT_STATUS_INVALID_MSG          = '积分支付单状态不合法';
    const FINISH_POINT_PAYMENT_FAILED               = 210058;
    const FINISH_POINT_PAYMENT_FAILED_MSG           = '完成积分支付失败';
    const UPDATE_POINT_REFUND_PAYMENT_FAILED        = 210059;
    const UPDATE_POINT_REFUND_PAYMENT_FAILED_MSG    = '更新积分退款单失败';
    const DELIVERY_MESSAGE_PLATFORM_INVALID         = 210060;
    const DELIVERY_MESSAGE_PLATFORM_INVALID_MSG     = '物流推送平台不合法';
    const POINT_ACTIVITY_NOT_START     = 210061;
    const POINT_ACTIVITY_NOT_START_MSG = '积分活动还没开始';
    const PATMENT_PAID_PRICE_GT_SKU_PRICE           = 210061;
    const PATMENT_PAID_PRICE_GT_SKU_PRICE_MSG       = '支付金额大于商品单价';

    //营销相关
    const REWARD_NOT_EXISTED                   = 310001;
    const REWARD_NOT_EXISTED_MSG               = '活动不存在';
    const COUPON_NOT_EXISTED                   = 310002;
    const COUPON_NOT_EXISTED_MSG               = '优惠券不存在';
    const ADD_REWARD_INFO_FAILED               = 310003;
    const ADD_REWARD_INFO_FAILED_MSG           = '添加活动信息失败';
    const ADD_REWARD_RULE_FAILED               = 310004;
    const ADD_REWARD_RULE_FAILED_MSG           = '添加优惠规则失败';
    const ADD_REWARD_REDEEM_RECORD_FAILD       = 310005;
    const ADD_REWARD_REDEEM_RECORD_FAILD_MSG   = '添加活动兑换记录失败';
    const ADD_COUPON_FAILD                     = 310006;
    const ADD_COUPON_FAILD_MSG                 = '添加优惠券失败';
    const UPDATE_REWARD_INFO_FAILED            = 310007;
    const UPDATE_REWARD_INFO_FAILED_MSG        = '更新活动信息失败';
    const COUPON_OPRCD_NOT_EXISTED             = 310008;
    const COUPON_OPRCD_NOT_EXISTED_MSG         = '优惠券使用记录不存在';
    const USER_COUPON_BINDED                   = 310009;
    const USER_COUPON_BINDED_MSG               = '优惠券已领取';
    const UPDATE_COUPON_FAILD                  = 310010;
    const UPDATE_COUPON_FAILD_MSG              = '更新优惠券失败';
    const ADD_REWARD_PHONE_FAILED              = 310011;
    const ADD_REWARD_PHONE_FAILED_MSG          = '绑定活动手机失败';
    const REWARD_PHONE_NOT_EXISTED             = 310012;
    const REWARD_PHONE_NOT_EXISTED_MSG         = '活动手机不存在';
    const ADD_MARKETING_ACTIVITY_FAILED        = 310013;
    const ADD_MARKETING_ACTIVITY_FAILED_MSG    = '添加市场活动失败';
    const UPDATE_MARKETING_ACTIVITY_FAILED     = 310014;
    const UPDATE_MARKETING_ACTIVITY_FAILED_MSG = '更新市场活动失败';
    const MARKETING_ACTIVITY_NOT_EXISTED       = 310015;
    const MARKETING_ACTIVITY_NOT_EXISTED_MSG   = '市场活动不存在';
    const REWARD_REDEEM_CODE_NOT_EXISTED       = 310016;
    const REWARD_REDEEM_CODE_NOT_EXISTED_MSG   = '唯一码不存在';
    const REWARD_REDEEM_CODE_IS_USED           = 310017;
    const REWARD_REDEEM_CODE_IS_USED_MSG       = '唯一码已被使用';
    const ADD_REWARD_REDEEM_CODE_FAILED             = 310018;
    const ADD_REWARD_REDEEM_CODE_FAILED_MSG         = '添加唯一码失败';
    const REWARD_REDEEM_CODE_HAS_UNIQUE_CODE        = 310019;
    const REWARD_REDEEM_CODE_HAS_UNIQUE_CODE_MSG    = '活动已生成过唯一码';
    const NEW_USER_BENEFIT_CONFLICT                 = 310020;
    const NEW_USER_BENEFIT_CONFLICT_MSG             = '新人权益受限制';
    const REFUND_COMPLAINT_ERROR                    = 310021;
    const REFUND_COMPLAINT_ERROR_MSG                = '退款申诉失败';
    const REFUND_AUDIT_ERROR                        = 310022;
    const REFUND_AUDIT_ERROR_MSG                    = '退款审核失败';
    const ADD_WECHAT_DATA_STATISTICS_FAILED         = 310023;
    const ADD_WECHAT_DATA_STATISTICS_MSG            = '添加微信数据统计失败';
    const ADD_ANTI_CHEATRULE_FAILED                 = 310024;
    const ADD_ANTI_CHEATRULE_FAILED_MSG             = '添加反作弊失败';
    const NOT_PIN_ORDER                             = 310025;
    const NOT_PIN_ORDER_MSG                         = '非拼团订单';
    const ADD_DELIVERY_LOGISTICS_FAILED             = 310026;
    const ADD_DELIVERY_LOGISTICS_FAILED_MSG         = '添加订单物流信息失败';
    const DELIVERY_LOGISTICS_EXISTED                = 310027;
    const DELIVERY_LOGISTICS_EXISTED_MSG            = '订单物流信息已存在';
    const DELIVERY_LOGISTICS_NOT_EXISTED            = 310028;
    const DELIVERY_LOGISTICS_NOT_EXISTED_MSG        = '订单物流信息不存在';
    const DELIVERY_PROVINCE_NOT_EXISTED             = 310029;
    const DELIVERY_PROVINCE_NOT_EXISTED_MSG         = '填写的省份不正确';
    const DELIVERY_CITY_NOT_EXISTED                 = 310030;
    const DELIVERY_CITY_NOT_EXISTED_MSG             = '填写的城市不正确';
    const DELIVERY_DISTRICT_NOT_EXISTED             = 310031;
    const DELIVERY_DISTRICT_NOT_EXISTED_MSG         = '填写的区域不正确';
    const THIRD_ORDER_NUM_IS_EXISTED                = 310032;
    const THIRD_ORDER_NUM_IS_EXISTED_MSG            = '第三方订单已经存在';
    const INVOICE_TYPE_ERROR                        = 310033;
    const INVOICE_TYPE_ERROR_MSG                    = '发票类型错误';

    //用户相关
    const USER_REGISTER_FAILED          = 510001;
    const USER_REGISTER_FAILED_MSG      = '用户注册失败';
    const USER_EXISTED                  = 510002;
    const USER_EXISTED_MSG              = '用户已存在';
    const USER_NOT_EXISTED              = 510003;
    const USER_NOT_EXISTED_MSG          = '用户不存在';
    const USER_LOGIN_FAILED             = 510004;
    const USER_LOGIN_FAILED_MSG         = '用户登录失败';
    const USER_PASSWORD_INVALID         = 510005;
    const USER_PASSWORD_INVALID_MSG     = '用户密码错误';
    const USER_MOBILE_BINDED            = 510006;
    const USER_MOBILE_BINDED_MSG        = '手机号已绑定';
    const USER_MOBILE_EXISTED           = 510007;
    const USER_MOBILE_EXISTED_MSG       = '用户手机号已存在';
    const USER_BINDED_FAILED            = 510008;
    const USER_BINDED_FAILED_MSG        = '用户绑定失败';
    const USER_MOBILE_INVALID           = 510009;
    const USER_MOBILE_INVALID_MSG       = '手机号不正确';
    const USER_RESETPWD_FAILED          = 510010;
    const USER_RESETPWD_FAILED_MSG      = '重置密码失败';
    const MOBILE_USED                   = 510011;
    const MOBILE_USED_MSG               = '手机号已被使用';
    const ADD_FEEDBACK_FAILED           = 510012;
    const ADD_FEEDBACK_FAILED_MSG       = '添加反馈失败';
    const ADD_ADDRESS_FAILED            = 510013;
    const ADD_ADDRESS_FAILED_MSG        = '添加收货地址失败';
    const UPDATE_ADDRESS_FAILED         = 510014;
    const UPDATE_ADDRESS_FAILED_MSG     = '更新收货地址失败';
    const ADDRESS_NOT_EXISTED           = 510015;
    const ADDRESS_NOT_EXISTED_MSG       = '收货地址不存在';
    const PROVINCE_NOT_EXISTED          = 510016;
    const PROVINCE_NOT_EXISTED_MSG      = '省份信息不正确';
    const CITY_NOT_EXISTED              = 510017;
    const CITY_NOT_EXISTED_MSG          = '城市信息不正确';
    const DISTRICT_NOT_EXISTED          = 510018;
    const DISTRICT_NOT_EXISTED_MSG      = '区县信息不正确';
    const DELETE_ADDRESS_FAILED         = 510019;
    const DELETE_ADDRESS_FAILED_MSG     = '删除地址失败';
    const SET_DEFAULTADDRESS_FAILED     = 510020;
    const SET_DEFAULTADDRESS_FAILED_MSG = '设置默认地址失败';
    const UPDATE_USERINFO_FAILED        = 510021;
    const UPDATE_USERINFO_FAILED_MSG    = '更新用户信息失败';
    const CHANGE_MOBILE_FAILED          = 510022;
    const CHANGE_MOBILE_FAILED_MSG      = '换绑手机失败';
    const RESET_PWD_TYPE_INVALID        = 510023;
    const RESET_PWD_TYPE_INVALID_MSG    = '重置密码类型不正确';
    const OLD_PASSWORD_INVALID          = 510024;
    const OLD_PASSWORD_INVALID_MSG      = '原密码错误';
    const THIRDPARTY_USER_NOT_EXISTED     = 510025;
    const THIRDPARTY_USER_NOT_EXISTED_MSG = '用户第三方帐号不存在';
    const ADD_THIRDPARTY_USER_FAILED      = 510026;
    const ADD_THIRDPARTY_USER_FAILED_MSG  = '添加第三方帐号失败';
    const BIND_PUSH_CLIENT_FAILED         = 510027;
    const BIND_PUSH_CLIENT_FAILED_MSG     = '绑定推送设备失败';
    const PUSH_CLIENT_NOT_EXISTED         = 510028;
    const PUSH_CLIENT_NOT_EXISTED_MSG     = '推送设备信息不存在';
    const INDEX_MODULE_NOT_EXISTED        = 510029;
    const INDEX_MODULE_NOT_EXISTED_MSG    = '首页模块信息不存在';
    const USER_ALREADY_BLOCK              = 510030;
    const USER_ALREADY_BLOCK_MSG          = '用户已被冻结';
    const WITHDRAW_STATUS_ERROR             = 510031;
    const WITHDRAW_STATUS_ERROR_MSG         = '提现申请状态错误';
    const BANK_NOT_EXISTED                  = 510032;
    const BANK_NOT_EXISTED_MSG              = '银行信息不正确';
    const USER_SESSION_NOT_EXISTED        = 510033;
    const USER_SESSION_NOT_EXISTED_MSG    = '用户session信息不存在';
    const ADD_USER_SESSION_FAILED         = 510034;
    const ADD_USER_SESSION_FAILED_MSG     = '添加用户session信息失败';
    const UPDATE_USER_SESSION_FAILED      = 510035;
    const UPDATE_USER_SESSION_FAILED_MSG  = '更新用户session信息失败';
    const MERGE_ACCOUNT_FAILED            = 5100036;
    const MERGE_ACCOUNT_FAILED_MSG        = '合并帐号失败';
    const USER_WECHAT_EXISTED           = 510038;
    const USER_WECHAT_EXISTED_MSG       = '该微信号已被绑定';
    const NOT_NEW_USER                  = 510039;
    const NOT_NEW_USER_MSG              = '您已不是新用户，不能再买啦~';

    # 达人相关
    const TALENT_FANS_MAP_FAILED          = 520001;
    const TALENT_FANS_MAP_FAILED_MSG      = '关注达人失败';
    const USER_TALENT_BLOCKED             = 520002;
    const USER_TALENT_BLOCKED_MSG         = '达人账号已被冻结';
    const USER_BALANCE_ERROR              = 520003;
    const USER_BALANCE_ERROR_MSG          = '申请提现金额超过账户余额';

    const ADD_USER_RECEIPT_ACCOUNT_FAILED           = 520004;
    const ADD_USER_RECEIPT_ACCOUNT_FAILED_MSG       = '添加用户收款账号失败';
    const USER_RECEIPT_ACCOUNT_ALEARD_EXISTS        = 520005;
    const USER_RECEIPT_ACCOUNT_ALEARD_EXISTS_MSG    = '用户收款账号已存在';
    const UPDATE_USER_RECEIPT_ACCOUNT_FAILED        = 520006;
    const UPDATE_USER_RECEIPT_ACCOUNT_FAILED_MSG    = '更新用户收款账号失败';

    # 批发相关
    const INSERT_USER_DEALER_LICENSE_FAILED         = 530000;
    const INSERT_USER_DEALER_LICENSE_FAILED_MSG     = '添加门店资质失败';
    const UPDATE_USER_DEALER_LICENSE_FAILED         = 530001;
    const UPDATE_USER_DEALER_LICENSE_FAILED_MSG     = '更新门店资质失败';
    const USER_DEALER_LICENSE_NOT_EXISTS            = 530002;
    const USER_DEALER_LICENSE_NOT_EXISTS_MSG        = '门店资质信息不存在';
    const USER_DEALER_LICENSE_AUDIT_FAILED          = 530003;
    const USER_DEALER_LICENSE_AUDIT_FAILED_MSG      = '审核门店资质信息失败';
    const INSERT_DEALER_LICENSE_AUDIT_FAILED        = 530004;
    const INSERT_DEALER_LICENSE_AUDIT_FAILED_MSG    = '添加门店资质审核记录失败';

    //商品相关
    const PRODUCT_INSTER_FAILED         = 610001;
    const PRODUCT_INSTER_FAILED_MSG     = '商品添加失败';
    const SKU_ATTRS_VAL_DUPLICATE       = 610002;
    const SKU_ATTRS_VAL_DUPLICATE_MSG   = 'sku信息已存在';
    const SKUITEM_INSTER_FAILED         = 610003;
    const SKUITEM_INSTER_FAILED_MSG     = 'sku添加失败';
    const PRODUCT_NOT_EXISTED           = 610004;
    const PRODUCT_NOT_EXISTED_MSG       = '商品不存在';
    const SKU_ATTRIBUTE_EMPTY           = 610005;
    const SKU_ATTRIBUTE_EMPTY_MSG       = 'sku属性不能为空';
    const SKU_NOT_EXISTED               = 610006;
    const SKU_NOT_EXISTED_MSG           = '单品不存在';
    const SKUITEM_UPDATE_FAILED         = 610007;
    const SKUITEM_UPDATE_FAILED_MSG     = 'sku更新失败';
    const SKUITEM_DELETE_FAILED         = 610008;
    const SKUITEM_DELETE_FAILED_MSG     = 'sku删除失败';
    const MERCHANT_NOT_EXISTED          = 610009;
    const MERCHANT_NOT_EXISTED_MSG      = '商户不存在';
    const MERCHANT_ADDRESS_NOT_EXISTED      = 610010;
    const MERCHANT_ADDRESS_NOT_EXISTED_MSG  = '商户地址不存在';
    const SKU_STOCK_NOT_ENOUGH          = 610011;
    const SKU_STOCK_NOT_ENOUGH_MSG      = '库存不足';
    const DEAL_PRICE_INVALID            = 610012;
    const DEAL_PRICE_INVALID_MSG        = '交易价格有误';
    const ADD_SKU_TO_CART_FAILED        = 610013;
    const ADD_SKU_TO_CART_FAILED_MSG    = '添加到购物车失败';
    const SKU_OFFLIENDED                = 610014;
    const SKU_OFFLIENDED_MSG            = '商品已下架';
    const SKU_NOT_SELLING               = 610015;
    const SKU_NOT_SELLING_MSG           = '商品未开售';
    const CLEAR_CART_FAILED             = 610016;
    const CLEAR_CART_FAILED_MSG         = '清空购物车失败';
    const DELETE_CART_SKU_FAILED        = 610017;
    const DELETE_CART_SKU_FAILED_MSG    = '删除购物车商品失败';
    const INIT_ORDER_FAILED             = 610018;
    const INIT_ORDER_FAILED_MSG         = '初始化订单失败';
    const SKU_SALED_OUT                 = 610019;
    const SKU_SALED_OUT_MSG             = '商品已抢光';
    const SKU_STOP_SALE                 = 610020;
    const SKU_STOP_SALE_MSG             = '商品已停售';
    const USER_CART_AMOUNT_LIMITED      = 610021;
    const USER_CART_AMOUNT_LIMITED_MSG  = '购物车已满';
    const PRODUCT_UPDATE_FAILED         = 610022;
    const PRODUCT_UPDATE_FAILED_MSG     = '商品更新失败';
    const ADD_TOPIC_SKU_FAILED          = 610023;
    const ADD_TOPIC_SKU_FAILED_MSG      = '添加专题商品失败';
    const TOPIC_NOT_EXISTED             = 610024;
    const TOPIC_NOT_EXISTED_MSG         = '专题不存在';
    const TOPIC_SKU_NOT_EXISTED         = 610025;
    const TOPIC_SKU_NOT_EXISTED_MSG     = '专题单品不存在';
    const UPDATE_TOPIC_SKU_FAILED       = 610026;
    const UPDATE_TOPIC_SKU_FAILED_MSG   = '更新专题商品失败';
    const TOPIC_EXPIRED                 = 610027;
    const TOPIC_EXPIRED_MSG             = '专题已过期';
    const TOPIC_SKU_ALREADY_EXISTED     = 610028;
    const TOPIC_SKU_ALREADY_EXISTED_MSG = '专题商品已存在';
    const CATEGORY_NOT_EXISTED          = 610029;
    const CATEGORY_NOT_EXISTED_MSG      = '分类不存在';
    const SKU_OVER_BUY_LIMIT            = 610030;
    const SKU_OVER_BUY_LIMIT_MSG        = '限购';
    const CUSTOM_TOPIC_NOT_EXISTED      = 610031;
    const CUSTOM_TOPIC_NOT_EXISTED_MSG  = '自定义专题不存在';
    const UPDATE_TOPIC_FAILED           = '610032';
    const UPDATE_TOPIC_FAILED_MSG       = '更新专题失败';
    const UPDATE_CUSTOM_TOPIC_FAILED    = '610033';
    const UPDATE_CUSTOM_TOPIC_FAILED_MSG = '更新自定义专题失败';
    const ADD_CUSTOM_TOPIC_FAILED       = '610034';
    const ADD_CUSTOM_TOPIC_FAILED_MSG   = '添加自定义专题失败';
    const TOPIC_DETAIL_NOT_EXISTED      = 610035;
    const TOPIC_DETAIL_NOT_EXISTED_MSG  = '自定义专题富文本获取失败';
    const ADD_PIN_ACTIVITIES_FAILED     = 610036;
    const ADD_PIN_ACTIVITIES_FAILED_MSG = '添加拼团活动失败';
    const PIN_ACTIVITIES_NOT_EXISTED     = 610037;
    const PIN_ACTIVITIES_NOT_EXISTED_MSG = '拼团活动不存在';
    const PIN_ACTIVITIES_LIST_FAILED     = 610038;
    const PIN_ACTIVITIES_LIST_FAILED_MSG = '获取拼团活动列表失败';
    const ADD_PIN_ACTIVITIES_EVENT_FAILED     = 610039;
    const ADD_PIN_ACTIVITIES_EVENT_FAILED_MSG = '添加拼团事件失败';
    const PIN_ACTIVITIES_WAS_SUCCESS     = 610040;
    const PIN_ACTIVITIES_WAS_SUCCESS_MSG = '拼团已经被组队完成';
    const PIN_ACTIVITIES_INFO_FAILED     = 610041;
    const PIN_ACTIVITIES_INFO_FAILED_MSG = '获取拼团活动信息失败';
    const PIN_ACTIVITIES_EVENT_FAILED    = 610042;
    const PIN_ACTIVITIES_EVENT_FAILED_MSG = '获取拼团事件失败';
    const PIN_ACTIVITIES_IS_ONLINE        = 610043;
    const PIN_ACTIVITIES_IS_ONLINE_MSG    = '拼团活动在线或已下线';
    const UPDATE_PIN_ACTIVITIES_FAILED     = 610044;
    const UPDATE_PIN_ACTIVITIES_FAILED_MSG = '更新拼团活动失败';
    const PIN_ACTIVITIES_IS_NOT_PASS_AUDIT     = 610045;
    const PIN_ACTIVITIES_IS_NOT_PASS_AUDIT_MSG = '拼团活动未通过审核';
    const PIN_ACTIVITIES_NOT_ONLINE        = 610046;
    const PIN_ACTIVITIES_NOT_ONLINE_MSG    = '拼团活动未在线';
    const PIN_ACTIVITIES_EVENT_NOT_EXISTED        = 610047;
    const PIN_ACTIVITIES_EVENT_NOT_EXISTED_MSG    = '拼团事件不存在';
    const PIN_AUDIT_NOTE_EMPTY                    = 610048;
    const PIN_AUDIT_NOTE_EMPTY_MSG                = '拼团活动审核不通过理由未填写';
    const ADD_PIN_AUDIT_RECORD_FAILED             = 610049;
    const ADD_PIN_AUDIT_RECORD_FAILED_MSG         = '添加拼团审核记录失败';
    const PIN_EVENT_OUT_TIME                      = 610050;
    const PIN_EVENT_OUT_TIME_MSG                  = '拼团事件时间结束';
    const PIN_ACTIVITIES_FAILED                   = 610051;
    const PIN_ACTIVITIES_FAILED_MSG               = '拼团失败';
    const PIN_ACTIVITIES_ORDER_NOT_EXISTED        = 610052;
    const PIN_ACTIVITIES_ORDER_NOT_EXISTED_MSG    = '拼团订单不存在';
    const OFFLINE_PIN_ACTIVITIES_FAILED           = 610053;
    const OFFLINE_PIN_ACTIVITIES_FAILED_MSG       = '下线拼图活动失败';
    const AUTO_END_PIN_EVENT_FAILED                    = 610054;
    const AUTO_END_PIN_EVENT_FAILED_MSG                = '自动结束未完成拼团事件失败';
    const AUTO_END_PIN_ORDER_FAILED                    = 610055;
    const AUTO_END_PIN_ORDER_FAILED_MSG                = '自动结束未完成拼团订单失败';
    const AUTO_ON_LINE_PIN_ACTIVITIES_FAILED           = 610056;
    const AUTO_ON_LINE_PIN_ACTIVITIES_FAILED_MSG       = '自动上线拼团活动失败';
    const AUTO_REFUND_PIN_ORDER_FAILED            = 610057;
    const AUTO_REFUND_PIN_ORDER_FAILED_MSG        = '创建拼团退款单失败';
    const PIN_EVENT_STATUS_ERR                      = 610058;
    const PIN_EVENT_STATUS_ERR_MSG                  = '拼团事件状态错误';
    const FINISH_PIN_EVENT_FAILED                   = 610059;
    const FINISH_PIN_EVENT_FAILED_MSG               = '拼团成团失败';
    const LOTTERY_ACTIVITY_ABNORMAL               = 610060;
    const LOTTERY_ACTIVITY_ABNORMAL_MSG           = '活动不是抽奖团';
    const PIN_EVENT_JOIN_COUNT_WAS_ENOUGH            = 610061;
    const PIN_EVENT_JOIN_COUNT_WAS_ENOUGH_MSG        = '参团人数已满';
    const PIN_EXCEED_MAXIMUM_NUMBER                  = 610062;
    const PIN_EXCEED_MAXIMUM_NUMBER_MSG              = '活动限制参与%u次';
    const UPDATE_PIN_ORDER_FAILED                    = 610063;
    const UPDATE_PIN_ORDER_FAILED_MSG                = '更新拼团订单失败';

    const MSG_PUSH_FINISH_PIN_ORDER_FAILED          = 610101;
    const MSG_PUSH_FINISH_PIN_ORDER_FAILED_MSG      = '拼团成团消息推送失败';
    const ADD_POINT_SKU_FAILED                      = 610201;
    const ADD_POINT_SKU_FAILED_MSG                  = '添加积分单品失败';
    const UPDATE_POINT_SKU_FAILED                   = 610202;
    const UPDATE_POINT_SKU_FAILED_MSG               = '更新积分单品失败';
    const POINT_SKU_NOT_EXISTED                     = 610203;
    const POINT_SKU_NOT_EXISTED_MSG                 = '积分单品不存在';
    const ADD_POINT_SKU_AUDIT_RECORD_FAILED         = 610204;
    const ADD_POINT_SKU_AUDIT_RECORD_FAILED_MSG     = '添加积分单品审核记录失败';
    const POINT_BENEFIT_NOT_EXISTED                 = 610205;
    const POINT_BENEFIT_NOT_EXISTED_MSG             = '积分权益不存在';
    const POINT_SKU_EXIST_ERROR                     = 610206;
    const POINT_SKU_EXIST_ERROR_MSG                 = '同一SKU，不能同时上架。';
    const ADD_POINT_SKU_ACTIVITY_FAILED             = 610207;
    const ADD_POINT_SKU_ACTIVITY_MSG                = '添加支付宝活动配置失败';
    const ADD_MTC_NOTIFY_TEMPLATE_FAILED            = 610208;
    const ADD_MTC_NOTIFY_TEMPLATE_FAILED_MSG        = '添加消息模板失败';
    const ADD_MTC_NOTIFY_EVENT_NOTIFY_FAILED        = 610209;
    const ADD_MTC_NOTIFY_EVENT_NOTIFY_FAILED_MSG    = '添加消息事件失败';
    const MTC_NOTIFY_TPL_NOT_EXISTED                = 610230;
    const MTC_NOTIFY_TPL_NOT_EXISTED_MSG            = '消息模板不存在';
    const DELETE_MTC_NOTIFY_TPL_FAILED              = 610231;
    const DELETE_MTC_NOTIFY_TPL_FAILED_MSG          = '删除消息模板失败';
    const DELETE_MTC_EVENT_NOTIFY_FAILED            = 610232;
    const DELETE_MTC_EVENT_NOTIFY_FAILED_MSG        = '删除消息事件失败';
    const GET_MTC_EVENT_NOTIFY_FAILED               = 610233;
    const GET_MTC_EVENT_NOTIFY_FAILED_MSG           = '获取模版事件失败';
    const ONLINE_MTC_EVENT_NOTIFY_FAILED            = 610234;
    const ONLINE_MTC_EVENT_NOTIFY_FAILED_MSG        = '该事件已开启，不能重复开启';
    const UPDATE_MTC_NOTIFY_TPL_FAILED              = 610235;
    const UPDATE_MTC_NOTIFY_TPL_FAILED_MSG          = '更新消息模板失败';
    const UPDATE_MTC_EVENT_NOTIFY_FAILED            = 610236;
    const UPDATE_MTC_EVENT_NOTIFY_FAILED_MSG        = '更新消息事件失败';
    const GET_MTC_TASK_FAILED                       = 610237;
    const GET_MTC_TASK_FAILED_MSG                   = '获取任务失败';


    const UPDATE_INDEX_SELECTED_FAILED            = 610058;
    const UPDATE_INDEX_SELECTED_FAILED_MSG        = '更新精选商品失败';
    const UPDATE_PRODUCT_COMMENTS_FAILED          = 610059;
    const UPDATE_PRODUCT_COMMENTS_FAILED_MSG      = '更新精选商品小编评价失败';
    const EDITOR_COMMENTS_NOT_EXISTED             = 610060;
    const EDITOR_COMMENTS_NOT_EXISTED_MSG         = '精选商品不存在';
    const SKU_PROMOTION_NOT_EXISTED               = 610061;
    const SKU_PROMOTION_NOT_EXISTED_MSG           = 'sku结算信息不存在';
    const DELETED_COUPON_LIMIT_ID_FAILED          = 610062;
    const DELETED_COUPON_LIMIT_ID_FAILED_MSG      = '删除优惠券关联ID失败';
    const UPDATE_COUPON_LIMIT_ID_FAILED           = 610063;
    const UPDATE_COUPON_LIMIT_ID_FAILED_MSG       = '更新优惠券关联ID失败';
    const ADD_COUPON_LIMIT_ID_FAILED              = 610064;
    const ADD_COUPON_LIMIT_ID_FAILED_MSG          = '添加优惠券关联ID失败';

    const SKU_COMMISSION_NOT_EXISTED              = 610065;
    const SKU_COMMISSION_NOT_EXISTED_MSG          = 'sku分佣信息不存在';
    const PRODUCT_SOURCE_MAP_NOT_EXISTED          = 610066;
    const PRODUCT_SOURCE_MAP_NOT_EXISTED_MSG      = '商品未参加分销';
    const USER_SUBSCRIBE_FAILED                   = 610067;
    const USER_SUBSCRIBE_FAILED_MSG               = '用户订阅失败';
    const CANCEL_USER_SUBSCRIBE_FAILED            = 610068;
    const CANCEL_USER_SUBSCRIBE_FAILED_MSG        = '用户取消订阅失败';
    const PIN_ACTIVITIES_STATUS_ERROR             = 610069;
    const PIN_ACTIVITIES_STATUS_ERROR_MSG         = '拼团活动状态错误';
    const DELETE_PIN_ACTIVITIES_FAILED            = 610070;
    const DELETE_PIN_ACTIVITIES_FAILED_MSG        = '作废拼图活动失败';

    //抽奖系统
    const LOTTERY_EVENT_NOT_EXISTED               = 620001;
    const LOTTERY_EVENT_NOT_EXISTED_MSG           = '抽奖事件不存在';
    const LOTTERY_EVENT_STATUS_INVALID            = 620002;
    const LOTTERY_EVENT_STATUS_INVALID_MSG        = '抽奖事件状态不合法';
    const UPDATE_LOTTERY_EVENT_FAILED             = 620003;
    const UPDATE_LOTTERY_EVENT_FAILED_MSG         = '更新抽奖事件失败';
    const UPDATE_LOTTERY_INFO_FAILED              = 620004;
    const UPDATE_LOTTERY_INFO_FAILED_MSG          = '更新抽奖号失败';
    const LOTTERY_ENTITY_NOT_EXISTED              = 620005;
    const LOTTERY_ENTITY_NOT_EXISTED_MSG          = '抽奖实体不存在';
    const INSERT_LOTTERY_INFO_FAILED              = 620006;
    const INSERT_LOTTERY_INFO_FAILED_MSG          = '添加抽奖号失败';
    const LOTTERY_INFO_NOT_EXISTED                = 620007;
    const LOTTERY_INFO_NOT_EXISTED_MSG            = '抽奖号不存在';
    const SKU_STOCK_ABNORMAL                      = 620008;
    const SKU_STOCK_ABNORMAL_MSG                  = '库存异常';

    //商户相关
    const INSERT_MERCHANT_FAILED        = 710001;
    const INSERT_MERCHANT_FAILED_MSG    = '添加商户信息失败';
    const UPDATE_MERCHANT_FAILED        = 710002;
    const UPDATE_MERCHANT_FAILED_MSG    = '更新商户信息失败';
    const INSERT_MERCHANT_QUALIFICATION_FAILED      = 710003;
    const INSERT_MERCHANT_QUALIFICATION_FAILED_MSG  = '添加商户资质失败';
    const UPDATE_MERCHANT_QUALIFICATION_FAILED      = 710004;
    const UPDATE_MERCHANT_QUALIFICATION_FAILED_MSG  = '更新商户资质失败';
    const MERCHANT_QUALIFICATION_NOT_EXISTED        = 710005;
    const MERCHANT_QUALIFICATION_NOT_EXISTED_MSG    = '商户资质不存在';
    const INSERT_MERCHANT_BRAND_LICENSE_FAILED      = 710006;
    const INSERT_MERCHANT_BRAND_LICENSE_FAILED_MSG  = '添加商户授权书失败';
    const UPDATE_MERCHANT_BRAND_LICENSE_FAILED      = 710007;
    const UPDATE_MERCHANT_BRAND_LICENSE_FAILED_MSG  = '更新商户授权书失败';
    const DELETE_MERCHANT_BRAND_LICENSE_FAILED      = 710008;
    const DELETE_MERCHANT_BRAND_LICENSE_FAILED_MSG  = '删除商户授权书失败';
    const MERCHANT_BRAND_LICENSE_NOT_EXISTED        = 710009;
    const MERCHANT_BRAND_LICENSE_NOT_EXISTED_MSG    = '商户授权书不存在';
    const MERCHANT_DELIVERY_LIMITED                 = 710010;
    const MERCHANT_DELIVERY_LIMITED_MSG             = '配送范围达不到';
    const MERCHANT_BILL_CREATE_FAILED               = 710011;
    const MERCHANT_BILL_CREATE_FAILED_MSG           = '创建商户对账单失败';
    const MERCHANT_BILL_NOT_EXISTED                 = 710012;
    const MERCHANT_BILL_NOT_EXISTED_MSG             = '商户对账单不存在';
    const SUBMIT_AUDIT_FAILED                       = 710013;
    const SUBMIT_AUDIT_FAILED_MSG                   = '商户提交审核失败';
    const CREATE_DELIVERY_TEMPLATE_FAILED           = 710014;
    const CREATE_DELIVERY_TEMPLATE_FAILED_MSG       = '创建运费模板失败';
    const DEPT_ADDRESS_NOT_EXISTED                  = 710015;
    const DEPT_ADDRESS_NOT_EXISTED_MSG              = '发货地址不存在';
    const DELIVERY_TEMPLATE_NOT_EXISTED             = 710016;
    const DELIVERY_TEMPLATE_NOT_EXISTED_MSG         = '运费模板不存在';
    const DELIVERY_TEMPLATE_ALREADY_EXISTED         = 710017;
    const DELIVERY_TEMPLATE_ALREADY_EXISTED_MSG     = '运费模板已存在';
    const MERCHANT_NAME_DUPLICATE                   = 710018;
    const MERCHANT_NAME_DUPLICATE_MSG               = '商户名已存在';
    const INSERT_MERCHANT_GIFT_FAILED               = 710019;
    const INSERT_MERCHANT_GIFT_FAILED_MSG           = '添加商户满赠促销失败';
    const UPDATE_MERCHANT_GIFT_FAILED               = 710020;
    const UPDATE_MERCHANT_GIFT_FAILED_MSG           = '更新商户满赠促销失败';
    const MERCHANT_GIFT_NOT_EXISTED                 = 710021;
    const MERCHANT_GIFT_NOT_EXISTED_MSG             = '商户满赠促销不存在';
    const INSERT_MERCHANT_SYSTEM_NOTICE_FAILED      = 710022;
    const INSERT_MERCHANT_SYSTEM_NOTICE_FAILED_MSG  = '添加系统公告失败';
    const BILL_NOT_EXISTED                          = 710023;
    const BILL_NOT_EXISTED_MSG                      = '对账单不存在';
    const WDT_INFO_NOT_EXISTED                      = 710024;
    const WDT_INFO_NOT_EXISTED_MSG                  = '旺店通信息不存在';
    const INSERT_MERCHANT_META_FAILED               = 710025;
    const INSERT_MERCHANT_META_FAILED_MSG           = '添加商户附属信息失败';
    const INSERT_TRADE_SETTLE_ORDER                 = 710026;
    const INSERT_TRADE_SETTLE_ORDER_MSG             = '添加打款订单记录失败';
    const INSERT_VENDOR_AUDIT_RECORD_FAILED         = 710027;
    const INSERT_VENDOR_AUDIT_RECORD_FAILED_MSG     = '添加批发申请记录失败';
    const UPDATE_VENDOR_AUDIT_RECORD_FAILED         = 710028;
    const UPDATE_VENDOR_AUDIT_RECORD_FAILED_MSG     = '更新批发申请记录失败';
    const MERCHANT_VENDOR_AUDIT_FAILED              = 710029;
    const MERCHANT_VENDOR_AUDIT_FAILED_MSG          = '审核批发资质失败';

    //评论相关
    const UGC_NOT_EXISTED                           = 810001;
    const UGC_NOT_EXISTED_MSG                       = '评论不存在';
    const UPDATE_UGC_FAILED                         = 810002;
    const UPDATE_UGC_FAILED_MSG                     = '更新评论信息失败';

    //banner相关
    const INSERT_BANNER_FAILED                      = 820001;
    const INSERT_BANNER_FAILED_MSG                  = '添加banner信息失败';
    const UPDATE_BANNER_FAILED                      = 820002;
    const UPDATE_BANNER_FAILED_MSG                  = '更新banner信息失败';
    const BANNER_NOT_EXISTED                        = 820003;
    const BANNER_NOT_EXISTED_MSG                    = 'banner信息不存在';

    //搜索热词相关
    const UPDATE_STATUS_HOTSEARCH                   = 820004;
    const UPDATE_STATUS_HOTSEARCH_MSG               = '最多只能设置15个有效的数据';
    const UPDATE_STATUS_SEARCHBOX                   = 820005;
    const UPDATE_STATUS_SEARCHBOX_MSG               = '最多只能设置1个有效的数据';


    //system相关
    const INSERT_ADMIN_USER_OP_LOG_FAILED           = 830001;
    const INSERT_ADMIN_USER_OP_LOG_FAILED_MSG       = '添加后台用户操作日志失败';
    const UPDATE_SYS_CONFIG_FAILED                  = 830002;
    const UPDATE_SYS_CONFIG_FAILED_MSG              = '更新系统配置信息失败';
    const UPSERT_SYS_CONFIG_FAILED                  = 830003;
    const UPSERT_SYS_CONFIG_FAILED_MSG              = '保存系统配置信息失败';
    const SYS_CONFIG_NOT_EXISTED                    = 830004;
    const SYS_CONFIG_NOT_EXISTED_MSG                = '系统配置信息不存在';


    //首页模块相关
    const INSERT_INDEX_MODULE_FAILED                = 840001;
    const INSERT_INDEX_MODULE_FAILED_MSG            = '添加indexModule信息失败';
    const UPDATE_INDEX_MODULE_FAILED                = 840002;
    const UPDATE_INDEX_MODULE_FAILED_MSG            = '更新indexModule信息失败';
    const MODULE_TYPE_IS_NOT_TOP_NAVIGATE_FAILED     = 840003;
    const MODULE_TYPE_IS_NOT_TOP_NAVIGATE_FAILED_MSG = '模块类型不是顶部导航';
    const MODULE_TYPE_IS_NOT_LABEL_BUTTON_FAILED     = 840004;
    const MODULE_TYPE_IS_NOT_LABEL_BUTTON_FAILED_MSG = '模块类型不是标签按钮';

    //template相关
    const INSERT_WCHAT_TEMPLATE_FAILED                      = 850001;
    const INSERT_WCHAT_TEMPLATE_FAILED_MSG                  = '添加wchat_template信息失败';
    const UPDATE_WCHAT_TEMPLATE_FAILED                      = 850002;
    const UPDATE_WCHAT_TEMPLATE_FAILED_MSG                  = '更新wchat_template信息失败';
    const WCHAT_TEMPLATE_NOT_EXISTED                        = 850003;
    const WCHAT_TEMPLATE_NOT_EXISTED_MSG                    = 'wchat_template信息不存在';

    const INSERT_WCHAT_TEMPLATE_MSG_FAILED                      = 860001;
    const INSERT_WCHAT_TEMPLATE_MSG_FAILED_MSG                  = '添加wchat_template_msg信息失败';
    const UPDATE_WCHAT_TEMPLATE_MSG_FAILED                      = 860002;
    const UPDATE_WCHAT_TEMPLATE_MSG_FAILED_MSG                  = '更新wchat_template_msg信息失败';
    const WCHAT_TEMPLATE_NOT_MSG_EXISTED                        = 860003;
    const WCHAT_TEMPLATE_NOT_MSG_EXISTED_MSG                    = 'wchat_template_msg信息不存在';

    const INSERT_WCHAT_TEMPLATE_OPENID_FAILED                      = 870001;
    const INSERT_WCHAT_TEMPLATE_OPENID_FAILED_MSG                  = '添加wchat_template_openid信息失败';

    const INSERT_WCHAT_FANS_JOB_FAILED                       = 862001;
    const INSERT_WCHAT_FANS_JOB_FAILED_MSG                   = '添加信息失败';
    const INSERT_WCHAT_FANS_JOB_REPEAT_FAILED                = 862002;
    const INSERT_WCHAT_FANS_JOB_REPEAT_FAILED_MSG            = '请勿重复添加';


    // 任务事件相关
    const TASK_EVENT_NOTIFY_NOT_EXISTED                         = 870001;
    const TASK_EVENT_NOTIFY_NOT_EXISTED_MSG                     = '通知事件不存在';
    const TASK_EVENT_RUN_RECORD_EXISTED                         = 870002;
    const TASK_EVENT_RUN_RECORD_EXISTED_MSG                     = '事件记录已存在';
    const TASK_NOTIFY_TPL_NOT_EXISTED                           = 870003;
    const TASK_NOTIFY_TPL_NOT_EXISTED_MSG                       = '通知模板不存在';
    const TASK_EVENT_RUN_RECORD_CREATE_FAILED                   = 870004;
    const TASK_EVENT_RUN_RECORD_CREATE_FAILED_MSG               = '事件记录创建失败';
    const TASK_EVENT_RUN_RECORD_NOT_EXISTED                     = 870005;
    const TASK_EVENT_RUN_RECORD_NOT_EXISTED_MSG                 = '事件记录不存在';
    const TASK_EVENT_RUN_RECORD_UPDATE_FAILED                   = 870006;
    const TASK_EVENT_RUN_RECORD_UPDATE_FAILED_MSG               = '事件记录更新失败';

    const TAOBAO_PUSH_NOTICE_ERROR_FAILED                       = 880001;
    const TAOBAO_PUSH_NOTICE_ERROR_FAILED_MSG                   = '推送淘宝消息失败';
    const UPDATE_TRADE_ORDER_STATUS_ERROR                       = 880002;
    const UPDATE_TRADE_ORDER_STATUS_ERROR_MSG                   = '修改订单状态失败';
    const UPDATE_TRADE_SUB_ORDER_STATUS_ERROR                   = 880003;
    const UPDATE_TRADE_SUB_ORDER_STATUS_ERROR_MSG               = '修改子订单状态失败';


    //组件包相关
    const UNIT_INFO_NOT_EXISTED      = 910001;
    const UNIT_INFO_NOT_EXISTED_MSG  = '组件包信息不存在';
    const COUPON_CODE_IS_EXPIRED     = 910002;
    const COUPON_CODE_IS_EXPIRED_MSG = '很抱歉，您的优惠券已失效';

    const SKU_OFFLINE_FAILED     = 910004;
    const SKU_OFFLINE_FAILED_MSG = 'SKU下架失败';
    const SKU_STATUS_INVALID     = 910005;
    const SKU_STATUS_INVALID_MSG = 'SKU状态不合法';

}
