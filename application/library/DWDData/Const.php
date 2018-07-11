<?php
/**
 * @file DWDData_Const.php
 *
 * @author caowei
 *         @date 2015-08-22 下午00:23:36
 *         @brief 系统错误号和错误消息类
 *
 *
 */
class DWDData_Const
{
    const DEFAULT_PAGE_LIMIT            = 20;
    const DEFAULT_PAGE_NUM                    = 1;
    const DEFAULT_OFFSET                      = 0;
    const MAX_PAGE_LIMIT                = 1500;
    const ORDER_BY_ASC_ID               = 0;
    const ORDER_BY_ASC                  = 'asc';
    const ORDER_BY_DESC_ID              = 1;
    const ORDER_BY_DESC                 = 'desc';
    const ENABLED                       = 1;
    const UNUSED                        = 0;
    const USED                          = 1;
    const DISABLED                      = 0;
    const ACTIVE                                  = 1;
    const INACTIVE                      = 0;
    const AUTO_OFFLINE                  = 2;
    const DEFAULT_AVATAR                = 'https://img2.haoshiqi.net/avatar_default.png';
    const DEFAULT_PASSWORD              = '$abcd%6789&';
    const DEFAULT_SEX                   = 0;

    const TRADE_ORDER_TYPE_NORMAL           = 1;
    const TRADE_ORDER_TYPE_SINGLE           = 2;
    const TRADE_ORDER_TYPE_GROUP            = 3;
    const TRADE_ORDER_TYPE_LOTTERY          = 4;
    const TRADE_ORDER_TYPE_LOTTERY_SINGLE   = 5;
    const TRADE_ORDER_TYPE_POINT            = 6;
    const TRADE_ORDER_TYPE_ASSISTANCE       = 7;
    const TRADE_ORDER_TYPE_TAOBAO           = 8;
    
    public static $TRADE_ORDER_TYPES               = array(
        self::TRADE_ORDER_TYPE_NORMAL           => '普通订单',
        self::TRADE_ORDER_TYPE_SINGLE           => '单独购订单',
        self::TRADE_ORDER_TYPE_GROUP            => '拼团订单',
        self::TRADE_ORDER_TYPE_LOTTERY          => '抽奖团订单',
        self::TRADE_ORDER_TYPE_LOTTERY_SINGLE   => '抽奖团单独购订单',
        self::TRADE_ORDER_TYPE_POINT            => '积分购订单',
        self::TRADE_ORDER_TYPE_ASSISTANCE       => '助力订单',
    );

    const MOBILE_ACCOUNT                    = 1;
    const WECHAT_ACCOUNT                    = 2;
    const ALIPAY_ACCOUNT                    = 3;

    const VERIFYCODE_ACCOUNT            = 5;
    const CART_CREATE_ORDER_DELETE_TYPE = 2;//下单删除购物车
    const TRADE_ORDER_NOT_PAY           = 1;//订单未支付状态
    const TRADE_ORDER_NOT_DELIVERY      = 1;//订单未配送状态
    const TRADE_ORDER_NOT_COMMENT       = 1;//订单未评论状态
    const TRADE_ORDER_CANCELED          = 4;//订单取消

    const MAIN_CATEGORY_ID                      = 0;
    const TASTE_ATTR_ID                       = 1;
    const VOLUME_ATTR_ID                      = 2;
    const BATCH_ATTR_ID                          = 5;
    const PACKAGE_SIZE_ATTR_ID                = 6;
    const BATCH_AT_LEAST_ATTR_ID              = 8;
    const SUGGESTED_PRICE_ATTR_ID             = 9;

    const PAYMENT_STATUS_NOT_PAY        = 1;
    const PAYMENT_STATUS_PAID           = 2;

    const BRAND_LICENSE_NOT_VERIFY      = 1;

    const DEPT_ADDRESS_TYPE             = 1;
    const DEST_ADDRESS_TYPE             = 2;

    const SYSTEM_USER_ID                = 99;

    const DELIVERY_FEE_WAY_ONLINE   = 1;        //物流费用线上支付
    const DELIVERY_FEE_WAY_OFFLINE  = 2;        //物流费用线下支付

    const DELIVERY_TYPE_SHIP_NORMAL  = 1;
    const DELIVERY_TYPE_RETURN_GOODS = 2;
    
    const DELIVERY_WAY_EXPRESS     = 1;        //快递
    const DELIVERY_WAY_LOGISTICS   = 2;        //物流
    
    const REQUEST_OK                    = 0;


    public static $CHANNEL_LIST         = array(
                                                'ALIPAY.ANT' => 1,
                                            );

    public static $COMMON_AUDIT_STATUS          = array(
                                                        'NOT_SUBMIT'      =>  0,
                                                        'AUDITING'        =>  1,
                                                        'AUDIT_PASS'      =>  2,
                                                        'AUDIT_REFUSE'    =>  3,
                                                    );
    public static $ORDER_STATUS                = array(
                                            'ALL'             =>  0,
                                            'NOT_PAY'         =>  1,
                                            'PAID'            =>  2,
                                            'FINISHED'        =>  3,
                                            'CANCELED'        =>  4,
                                            'APPLY_REFUND'    =>  5,
                                            'REFUNDING'       =>  6,
                                            'REFUNDED'        =>  7,
                                            'REFUND_REFUSE'   =>  8,
                                            'PIN_PAID'        =>  9,
                                            'REVIEWING'       =>  10, //cheat order, 审核中
                                            'WAITING_LOTTERY' =>  11, //抽奖团订单，等待开奖
                                            'APPLICATION_FOR_RETURN' => 12,//申请退货
                                            'READY_RETURN_GOODS'     => 13,//待退货
                                            'RETURN_GOODS_ON_ROAD'   => 14,//退货中
                                            'REFUSE_RETURN_GOODS'    => 15,//拒绝退货
                                            'RETURNED_GOODS'         => 16,//已退货
                                            'RETURN_GOODS_REFUNDING' => 17,//已退货退款中
                                            'RETURN_GOODS_REFUND'    => 18,//已退款退货

    );


    public static $TASK_EVENT_STATUS        = array(
                                                    'INIT'          =>  1,
                                                    'OPEN'          =>  2,
                                                    'CLOSED'        =>  3,
                                                );

    public static $TASK_EVENT_RUN_STATUS    = array(
                                                    'PROCESSING'    =>  1, // 执行中
                                                    'FINISHED'      =>  2, // 执行完成
                                                    'FAILED'        =>  3, // 执行失败
                                                );

    public static $PAYMENT_STATUS              = array(
                                            'NOT_PAY'      => 1,
                                            'PAID'         => 2,
                                            'REFUNDING'    => 3,
                                            'REFUNED'      => 4,
                                        );
    public static $DELIVERY_STATUS            = array(
                                            'NON_DELIVERY' =>  1,
                                            'DELIVERING'   =>  2,
                                            'FINISHED'     =>  3,
                                        );
    public static $COMMENT_STATUS             = array(
                                            'NOT_COMMENT'  =>  1,
                                            'COMMENTED'    =>  2,
                                            'REPLIED'      =>  3,
                                        );

    public static $REFUND_ORDER_STATUS        = array(
                                            'VERIFING'                      => 1,
                                            'REFUNDING'                     => 2,
                                            'REFUNDED'                      => 3,
                                            'VERIFY_REFUSE'                 => 4,
                                            'RETURN_GOODS_VERIFY'           => 5,
                                            'RETURN_GOODS_PASS'             => 6,
                                            'GOODS_IN_RETURN'               => 7,
                                            'REFUSE_RETURN_GOODS'           => 8,
                                            'RETURN_GOODS_COMPLETE'         => 9,
                                            'RETURN_GOODS_REFUNDING'        => 10,//已退货退款中
                                            'RETURN_GOODS_REFUND'           => 11,//已退货退款
                                            'RETURN_GOODS_RETURNED_REFUND'  => 12,//已退货拒绝退款
                                            'REFUND_STATUS_REVOKE'          => 13,//已撤销
                                        );
    public static $CHEAT_ORDER_STATUS        = array(
                                            'CHEAT'           =>  1,
                                            'NO_CHEAT'        =>  2,
                                            'REVIEWING'       =>  3,
                                        );
    public static $MERCHANT_AUDIT_STATUS      = array(
                                            'NOT_SUBMIT'      =>  0,
                                            'AUDITING'        =>  1,
                                            'AUDIT_PASS'      =>  2,
                                            'AUDIT_REFUSE'    =>  3,
                                        );
    public static $BRAND_AUDIT_STATUS      = array(
                                            'NOT_SUBMIT'      =>  0,
                                            'AUDITING'        =>  1,
                                            'AUDIT_PASS'      =>  2,
                                            'AUDIT_REFUSE'    =>  3,
                                        );

    public static $DEALER_AUDIT_STATUS      = array(
                                            'NOT_SUBMIT'      =>  0,
                                            'AUDITING'        =>  1,
                                            'AUDIT_PASS'      =>  2,
                                            'AUDIT_REFUSE'    =>  3,
                                        );

    public static $SKU_AUDIT_STATUS           = array(
                                            'NOT_SUBMIT'      => 0,
                                            'AUDITING'        => 1,
                                            'AUDIT_PASS'      => 2,
                                            'AUDIT_REFUSE'    => 3,
                                            'AUDIT_REMIND'    => 4,
                                        );
    public static $UGC_AUDIT_STATUS           = array(
                                            'NOT_SUBMIT'      =>  0,
                                            'AUDITING'        =>  1,
                                            'AUDIT_PASS'      =>  2,
                                            'AUDIT_REFUSE'    =>  3,
                                        );
   
    public static $AUDIT_STATUS               = array(
                                            'NOT_SUBMIT'      =>  0,
                                            'AUDITING'        =>  1,
                                            'AUDIT_PASS'      =>  2,
                                            'AUDIT_REFUSE'    =>  3,
                                            'MERCHANT_REFUSE' =>  4,
                                        );
    public static $REFUND_PAYMENT_STATUS      = array(
                                            'WAIT_VERIFY'     =>  1,
                                            'VERIFY_PASS'     =>  2,
                                            'VERIFY_REFUSE'   =>  3,
                                            'REFUNDING'       =>  4,
                                            'REFUNDED'        =>  5,
                                            'ABNORMAL'        =>  6,
                                        );
    public static $REFUND_PAYMENT_TYPE      = array(
                                            'SYSTEM_REFUND'   =>  1,
                                            'MERCHANT_REFUND' =>  2,
                                            'USER_REFUND'     =>  3,
                                            'CS_REFUND'       =>  4,
                                        );
    public static $BANNER_TYPE                = array(
                                            'DEFAULT'         =>  1,
                                            'WEB'             =>  2,
                                            'INTERNAL'        =>  3,
                                        );
    public static $REFUND_WAY                 = array(
                                             'ORIGINAL_REFUND' =>  1,
                                        );
    public static $SPECIAL_TOPIC_STATUS       = array(
                                             'INIT'            =>  1,
                                             'WAITING_ONLINE'  =>  2,
                                             'ONLINE'          =>  3,
                                             'OFFLINE'         =>  4,
                                             'EXPIRED'         =>  5,
                                        );
    public static $COUPON_TYPE                = array(
                                              'PLATFORM_COUPON'   => 1,
                                              'MERCHANT_COUPON'   => 2,
                                              'SKU_COUPON'        => 3,
                                        );
    public static $COUPON_RANGE_TYPE         = array(
                                            'MERCHANT'      => 'MERCHANT',
                                            'SKU'           => 'SKU',
                                        );
    public static $PIN_AUDIT_STATUS          = array(
                                              'NOT_SUBMIT_AUDIT'   => 1,
                                              'NOT_AUDIT'          => 2,
                                              'AUDIT_PASS'         => 3,
                                              'REFUSE_AUDIT'       => 4,
                                        );
    public static $TRADE_REFUND_AUDIT_STATUS = array(
                                            'CS_AUDIT'             => 1,
                                            'SYSTEM_AUDIT'         => 2,
                                            'MERCHANT_AUDIT'       => 3,
                                        );
    public static $PIN_STATUS               = array(
                                             'NOT_SUBMIT'      => 1,
                                             'WAIT_ONLINE'     => 2,
                                             'ONLINE'          => 3,
                                             'OFFLINE'         => 4,
                                             'DELETE'          => 5,
                                        );
    public static $PIN_SUB_STATUS           = array(
                                             'INIT'             => 0,
                                             'AUTO_OFFLINE'     => 1,
                                             'MERCHANT_OFFLINE' => 2,
                                             'OP_OFFLINE'       => 3,
                                             'LOTTERY_DRAW'     => 4,
                                       );
    public static $LOTTERY_EVENT_STATUS     = array(
                                            'INIT'              => 0,
                                            'PROCESSING'        => 1,
                                            'SUCCESS'           => 2,
                                            'FAILED'            => 3,
                                            'ABNORMAL'          => 4,
                                       );
    public static $TRADE_SUB_STATUS           = array(
                                                'INIT'             => 0,
                                                'NOT_WINNER'       => 1,
                                            );
    public static $PIN_EVENT_STATUS         = array(
                                             'PROCESSING'      => 1,
                                             'SUCCESS'         => 2,
                                             'FAILED'          => 3,
                                             'PIN_FAILED'      => 4,
    );
    public static $TRADE_REFUND_TYPE        = array(
                                            'USER_REFUND'     => 1,
                                            'MERCHANT_REFUND' => 2,
                                            'PIN_REFUND'      => 3,
                                        );
    public static $INDEX_MODULE_TYPE        = array(
                                            'LABEL_BUTTON'              => 1,
                                            'FIXED_PROMOTION_BOX'       => 2,
                                            'NEW_FIXED_PROMOTION_BOX'   => 3,
                                            'PIN_LABEL_BUTTON'          => 5,
                                       );
    
    public static $CART_SKU_BEHAVIOR        = array(
                                            'ADD'              => 1,
                                            'CHANGE'           => 2,
    );
     
    public static $REFUND_OP_TYPE          = array(
                                            'MERCHANT'        => 1,
                                            'CS'              => 2,
                                        );

    public static $DELIVERY_MESSAGE_STATUS     = array(
                                              'DELIVERING'       => 0,
                                              'RECEIVE'          => 1,
                                              'PACKAGE_DIFFICULT'=> 2,
                                              'CONFIRM'          => 3,
                                              'PACKAGE_REFUSE'   => 4,
                                              'SENDING'          => 5,
                                              'RETREAT'          => 6,
                                              'NON'              => 7,
                                          );

    //1.新客 2.用户手机和收货人手机号不一致 4.同 ip 地址下单过多 8.限制同一支付帐号 16.收货人信息类似 32.限制同一帐号
    public static $CHEAT_RULETYPES          = array(
                                            'NEW_USER'             => 1,
                                            'PHONE_CONFLICT'       => 2,
                                            'IP_CONFLICT'          => 4,
                                            'PAY_ACCOUNT_CONFLICT' => 8,
                                            'CONSIGNEE_SIMILAR'    => 16,
                                            'ACCOUNT_CONFLICT'     => 32,
                                        );

    const RESETPWD_BY_MOBILE_TYPE     = 1;
    const RESETPWD_BY_OLDPWD_TYPE     = 2;
    const INC_SKU_CART                = 1;
    const DEC_SKU_CART                = 2;
    const INC_SKU_STOCK               = 1;
    const DEC_SKU_STOCK               = 2;
    const USER_DELETE_CART            = 1;
    const ORDER_DELETE_CART           = 2;
    const TIMEOUT_DELETE_CART         = 3;


    const SOURCE_TYPE_RETAIL              = 1;        //好食期零售
    const SOURCE_TYPE_WFX                 = 2;        //好食期微分销
    const SOURCE_TYPE_BATCH               = 3;        //好食期批发
    const SOURCE_TYPE_ALIPAY_POINT        = 4;        //好食期积分购
    const SOURCE_TYPE_HSQ_APP             = 1;  // 好食期App
    const SOURCE_TYPE_HSQ_WECHAT          = 2;  // 好食期精选
    const SOURCE_TYPE_HSQ_ALIPAY_ANT      = 4;  // 好食期支付宝蚂蚁会员
    const SOURCE_TYPE_WECHAT_MINI_PROGRAM = 5; //微信小程序
    const SOURCE_TYPE_ALIPAY_MINI_PROGRAM = 6; //支付宝小程序
    const SOURCE_TYPE_WECHAT              = 7; //微信H5
    const SOURCE_TYPE_HSQ_ALIPAY_HUABEI   = 8; //花呗
    const SOURCE_TYPE_ALIPAY_PREFERENTIAL_MINI_PROGRAM = 9; //支付宝特惠食品小程序
    const SOURCE_TYPE_TAOBAO              = 12;
    
    const LABELBUTTON_BACKGROUND_APP     = 'labelbutton_background_app'; //标签按钮背景 APP
    const LABELBUTTON_BACKGROUND_H5      = 'labelbutton_background_h5';  //标签按钮背景 H5
    const LABELBUTTON_BACKGROUND_DEFAULT = 'labelbutton_background_default';//标签按钮背景 默认


    const DELIVERY_PLATFORM_DEFAULT                     = 1;
    const DELIVERY_PLATFORM_KUAIDI100                   = 2;
    const DELIVERY_PLATFORM_KUAIDINIAO                  = 3;

    public static $SOURCE_TYPES              = array(
                                            self::SOURCE_TYPE_HSQ_APP       => '好食期App',
                                            self::SOURCE_TYPE_HSQ_WECHAT    => '好食期精选',
                                            self::SOURCE_TYPE_BATCH         => '好食期批发',
                                        );
    public static $TALENT_REQUEST_LIMIT      = array(
                                            'NEED_WECHAT_SUBSCRIBE' => 1,
                                            'HAS_TRADE_ORDER'       => 1,
                                            'NEED_REVIEWED'         => 0,
                                        );
    const COMMSITION_STATUS_ALL         = 'all';        # 已支付之后的订单
    const COMMSITION_STATUS_CONFIRM     = 'confirm';    # 已收货但尚未过退款期限
    const COMMSITION_STATUS_COMMSITION  = 'commsition'; # 已分佣
    public static $COMMSITION_STATUS_LISTS     = array(
                                            self::COMMSITION_STATUS_ALL         => 0,   # 已支付之后的订单
                                            self::COMMSITION_STATUS_CONFIRM     => 1,   # 已收货但尚未过退款期限
                                            self::COMMSITION_STATUS_COMMSITION  => 2,   # 已分佣
                                        );
    const HAS_TRADE_ORDER_INIT          = 0; # 不需要订单
    const HAS_TRADE_ORDER_CONFIRM       = 1; # 已确认收货
    const HAS_TRADE_ORDER_PAID          = 2; # 已支付，未确认收货
    
   
    //redis key 定义
    const KEYVALUE_TYPE                                 = 'k_';
    const HASH_TYPE                                     = 'h_';
    const LIST_TYPE                                     = 'l_';
    const SET_TYPE                                      = 's_';
    const SORT_SET_TYPE                                 = 'z_';
    const REDIS_KEY_FOR_USERINFO_TOKEN_CACHE            = "uToken_v2:%s";
    const REDIS_KEY_FOR_SYS_CONFIG_CACHE                = "sysConfig:%s";
    const REDIS_KEY_FOR_WECHAT_JSSDK_ACCESS_TOKEN       = 'k_wechatJssdkAccessToken';
    const REDIS_KEY_FOR_WECHAT_JSSDK_TICKET             = 'k_wechatJssdkTicket';
    const REDIS_KEY_FOR_SKU_SOLD_SUMMARY_CACHE          = 'skuSoldSummary:%s';
    const REDIS_KEY_FOR_BU_SKU_SOLD_SUMMARY_CACHE       = 'buSkuSoldSummary:%s';
    const REDIS_KEY_FOR_COUPON_LIMIT_IDS_QUEUE          = 'l_couponLimitIds';
    const REDIS_KEY_FOR_PIN_ACTIVITIES_SALE_RANGE       = 'pinActivitiesSaleRange';
    const REDIS_KEY_FOR_SKU_LEFT_STOCK                  = 'skuLeftStock:%s';
    const REDIS_KEY_FOR_PIN_EVENT_PROCESS_CNT           = 'pinEventProcessCnt:%s';
    const REDIS_KEY_FOR_PIN_EVENT_SUCCESS_CNT           = 'pinEventSuccessCnt:%s';
    const REDIS_KEY_FOR_MANUAL_IMPORT_BATCH_OPEN_IDS    = 'l_manaualImportBatchOpenids';
    const REDIS_KEY_FOR_DAILY_INCOME_CACHE              = 'k_opDashboardDailyIncome';
    const REDIS_KEY_FOR_PRODUCT_UNIT                    = 'k_productUnit';
    const REDIS_KEY_FOR_PRODUCT_PACKAGE_UNIT            = 'k_ProductPackageUnit';
    const REDIS_KEY_FOR_PIN_ACTIVITIES_FAST_JOIN        = 'pinActivitiesFastJoin:%s';
    const REDIS_KEY_FOR_MERCHANT_ORDER_EXPORT_QUEUE     = 'l_merchant:%s:orderExport';
    const REDIS_KEY_FOR_POINT_SKU_RECOMMEND_SET         = 'pointSkuRecommendSet';
    const REDIS_KEY_FOR_POINT_SKU_LIST_CACHE            = 'pointSkuList';
    const REDIS_KEY_FOR_USER_ADDRESS                    = 'addsInfo:%s';
    const REDIS_KEY_FOR_USER_DEFAULT_ADDRESS            = 'userDefaultAdds:%s';
    const REDIS_KEY_FOR_POINT_SKUINFO_WITHATTRS         = 'pSkuInfo:%s:withAttrs:%s';
    const REDIS_KEY_FOR_PROVINCELIST_CACHE              = 'k_provinceList';
    const REDIS_KEY_FOR_POINTSKURECOMMENDLIST_CACHE     = 'pointSkuRecommendList:pSkuId:%s';
    const REDIS_KEY_FOR_TOPIC_SKULIST_CACHE             = "topicSkuList:%s";

    const SYSCONFIG_KEY_TALENT_LIMIT_FOR_WEIFENXIAO = 'talent_limit_for_weifenxiao';
    const SYSCONFIG_KEY_TALENT_RULES                = 'talent_rules';
    const SYSCONFIG_KEY_COMMISSION_CONFIG           = 'commission_config';
    const SYSCONFIG_KEY_NEW_USER_BENEFIT            = 'new_user_benefit';
    const SYSCONFIG_KEY_HSQ_WECHAT_SERVICE          = 'hsq_wechat_service';
    const SYSCONFIG_KEY_JINGXUAN_WECHAT_SERVICE     = 'jingxuan_wechat_service';
    const SYSCONFIG_KEY_REFUND_LIMIT                = 'refund_limit';
    const SYSCONFIG_KEY_PSKU_RECOMMEND_FROM_MONGODB = 'psku_recommend_from_mongodb';
    const SYSCONFIG_NEW_USER_INVITE_SHARE_INFO      = 'new_user_invite_share_info';
    const SYSCONFOG_KEY_NO_SHOW_IN_TODAY            = 'no_show_new_activity_list';

    const TALENT_LEVEL_MAX_DEPTH    = 3;  # 1-3 粉丝最大深度
    const TALENT_LEVEL_CURR_DEPTH   = 2;  # 1-3 粉丝当前最大深度
    const WECHAT_TYPE_MOBILE = 1; # wechat.mobile
    const WECHAT_TYPE_MP = 2;     # wechat.mp
    const WITHDRAW_TRANSFER_TYPE_MANUAL = 1;    # 财务手动打款
    const WITHDRAW_TRANSFER_TYPE_AUTO   = 2;      # 自动打款
    const WITHDRAW_STATUS_INIT = 1;          // 申请已提交
    const WITHDRAW_STATUS_PROCESSING = 2;    // 处理中（财务已确认）
    const WITHDRAW_STATUS_REJECT = 3;        // 提现拒绝
    const WITHDRAW_STATUS_FAIL = 4;          // 提现失败
    const WITHDRAW_STATUS_SUCCESS = 5;       // 提现成功
    const WITHDRAW_REVIEW_STATUS_INIT                       = 20;    // 待确认
    const WITHDRAW_REVIEW_STATUS_WAITING_TRANSFER_MANUAL    = 21;    // 待手动打款
    const WITHDRAW_REVIEW_STATUS_WAITING_TRANSFER_AUTO      = 22;    // 待自动打款
    const TRANSFER_STATUS_PROCESSING                        = 1;    // 申请成功等待到账
    const TRANSFER_STATUS_FAILED                            = 2;    // 申请失败
    const TRANSFER_STATUS_INCOME_SUCCESFUL                  = 3;    // 到账成功
    const TRANSFER_STATUS_INCOME_FAILED                     = 4;    // 到账失败
    const LOG_USER_BALANCE_TYPE_INCOME                      = 1;    // 收入（分拥成功）+
    const LOG_USER_BALANCE_TYPE_WITHDRAW                    = 2;    // 提现申请成功，从余额中扣款 -
    const LOG_USER_BALANCE_TYPE_WITHDRAW_REFUND             = 3;    // 提现拒绝，退还到余额 +
    const LOG_USER_LOCKED_BALANCE_TYPE_INCOME               = 4;    // 完成支付 即将到账余额 +
    const LOG_USER_LOCKED_BALANCE_TYPE_REFUND               = 5;    // 售后退款，即将到账余额 -
    const REFUND_ORDER_TRANCE_TYPE_APPLY_REFUND             = 1;
    const REFUND_ORDER_TRANCE_TYPE_REFUND_REFUSE            = 2;
    public static $TRANSFER_TYPE_METHOD      = [
        'TRANSFER_BANK'         => '银行卡',
        'TRANSFER_ALIPAY'       => '支付宝',
        'TRANSFER_WECHAT'       => '微信',
    ];
    const USER_RECEIPT_ACCOUNT_TYPE_WECHAT                  = 1;
    const USER_RECEIPT_ACCOUNT_TYPE_BANKCARD                = 2;
    const USER_RECEIPT_ACCOUNT_TYPE_ALIPAY                  = 3;
    public static $USER_RECEIPT_ACCOUNT_TYPE_LIST                  = array(
                                                                  self::USER_RECEIPT_ACCOUNT_TYPE_WECHAT              => '微信',
                                                                  self::USER_RECEIPT_ACCOUNT_TYPE_BANKCARD            => '银行卡',
                                                                  self::USER_RECEIPT_ACCOUNT_TYPE_ALIPAY              => '支付宝',
                                                              );
    public static $TRADE_COMMISSION_STATUS                         = array(
                                                                    'CONFIRM'           =>  1,
                                                                    'COMMISSION'        =>  2,
                                                                    'REFUND'            =>  3,
                                                                    'PAID'              =>  4,
                                                                );
    public static $CANCEL_ORDER_REASON                             = array(
                                                                    'MERCHANT'                      => 0,
                                                                    'DO_NOT_WANT_BUY '              => 1,
                                                                    'INFO_ERROR'                    => 2,
                                                                    'PRODUCT_STOCK_NOT_ENOUGH'      => 3,
                                                                    'OTHER_REASON'                  => 4,
                                                                    'PIN_FAILURE'                   => 5,
                                                                    'LOTTERY_ACTIVITY_OFFLINE'      => 6,
                                                                    'NOT_WINNER'                    => 7,
                                                                    'SYSTEM_CANCEL'                 => 99,
                                                                );
    public static $SYS_CONFIG_TYPE                                 = array(
                                                                    'ALL'               =>  0,
                                                                    'ANDROID'           =>  1,
                                                                    'IOS'               =>  2,
                                                                    'H5'                =>  3,
                                                                    'INTERNAL_API'      =>  4,
                                                                    'OPEN_API'          =>  5,
                                                                    'BACKGROUND_SCRIPT' =>  6,
                                                              );
    const SYS_CONFIG_TYPE_INTERNAL_API                      = 4;
    const RABBIT_MQ_EXCHANGE_DIRECT                         = "prod.hsq.direct";
    const RABBIT_MQ_EXCHANGE_TOPIC                          = "prod.hsq.topic";
    const RABBIT_MQ_SKU_CENTER_SEARCH_ENGINE                = 'hsq.skucenter.search_engine';
    const RABBIT_MQ_SUCCESS_PIN_EVENT                       = 'hsq.success_pin_event';
    const RABBIT_MQ_TRADE_CENTER_REFUND_ORDER               = 'hsq.tradecenter.refund_order';
    const RABBIT_MQ_TRADE_CENTER_PIN_ACTIVITY               = 'hsq.tradecenter.pin_activity';
    const RABBIT_MQ_BILL_FINISH_PAYMENT                     = 'prod_*_finish_payment';
    const RABBIT_MQ_PIN_EVENTS_PRODUCER                     = 'pinevents_producer';
    const PIN_SHARE_URL                                     = 'http://m.haoshiqi.net/#couple_share?channel_id=h5&pineventid=';
    public static $REFUND_ORDER_TYPE_MAP                    = array(
                                                                    'USER'          => 1,
                                                                    'MERCHANT'      => 2,
                                                                    'SYSTEM'        => 3,
                                                                    'CS'            => 4,
                                                                );

    public static $REFUND_PAYMENT_REFUND_TYPE_MAP           = array(
                                                                    'SYSTEM'        => 1,
                                                                    'MERCHANT'      => 2,
                                                                    'USER'          => 3,
                                                                    'CS'            => 4,
                                                                );

    const REFUND_AUDIT_TYPE_CS                              = 1; # 客服审核
    const REFUND_AUDIT_TYPE_SYSTEM                          = 2; # 系统审核
    const REFUND_AUDIT_TYPE_MERCHANT                        = 3; # 商户审核
    const REFUND_AUDIT_TYPE_USER                            = 4; # 用户审核
    const REFUND_AUDIT_RCD_TYPE_MERCHANT                    = 1; # 商户审核
    const REFUND_AUDIT_RCD_TYPE_CS                          = 2; # 客服审核
    const REFUND_AUDIT_RCD_TYPE_USER                        = 3; # 用户申诉
    const REFUND_AUDIT_RCD_TYPE_SYSTEM                      = 4; # 系统审核
    const TRADE_CENTER_REFUND_ORDER_TYPE_LOTTERY            = 1;
    public static $TRADE_CENTER_REFUND_ORDER_TYPE           = array(
                                                                    'TRADE_CENTER_REFUND_ORDER_TYPE_LOTTERY' => 1,
                                                                    'TRADE_CENTER_REFUND_ORDER_TYPE_BILL'  => 2,
                                                                );
    public static $REFUND_SOURCE_TYPE                       = array(
                                                                    'USER'      => 1,
                                                                    'MERCHANT'  => 2,
                                                                    'SYSTEM'    => 3,
                                                                    'CS'        => 4,
                                                              );

    public static $REFUND_METHODS                            = array(
                                                                      'ONLY_MONEY'        => 1,
                                                                      'ONLY_POINT'        => 2,
                                                                      'MONEY_AND_POINT'   => 3,
                                                                      'REFUND_OF_REFUNDS' => 4, //退货退款,
                                                                        
                                                                  );
    const REFUND_MONEY_ALL                                  = 1;
    const REFUND_MONEY_PARTIAL                              = 2;
    const REFUND_RANGE_ORDER                                = 1; # 整单
    const REFUND_RANGE_SUB_ORDER                            = 2; # 子订单
    const REFUND_PRE_SALES                                  = 'PRE_SALES';      # 售前退款
    const REFUND_AFTER_SALES                                = 'AFTER_SALES';    # 售后退款
    const REFUND_ALL_SALES                                  = 'ALL_SALES';      # 不限
    public static $REFUND_SALES_LIST                        = array(
                                                                    self::REFUND_ALL_SALES    => 0,
                                                                    self::REFUND_PRE_SALES      => 1,
                                                                    self::REFUND_AFTER_SALES    => 2,
                                                                );
    public static $REFUND_AUDIT_RECORD_STATUS               = array(
                                                                    'AUDIT_REFUSE'  => 3,
                                                                    'AUDIT_PASS'    => 2,
                                                              );
    public static $SPECIAL_TOPIC_SKU_TYPE                   = array(
                                                                    'SKU'           => 1,
                                                                    'PIN'           => 2,
                                                                    'BATCH'         => 3,
                                                              );
    
    public static $SPECIAL_TOPIC_CHANNEL_TYPE                = array(
                                                                    'MAIN'          => 1, //主站
                                                                    'ALIPAY_LOAN'   => 2, //支付宝花呗
                                                                    'ALIPAY_ANT'    => 3, //支付宝蚂蚁会员
                                                               );

    const IS_WINNER                                         = 1; //中奖
    const PIN_TYPE_NORMAL                                   = 1;
    const PIN_TYPE_LOTTERY                                  = 2;
    const COMMISSION_TYPE_SYSTEM                            = 1; // 系统
    const COMMISSION_TYPE_CUSTOM                            = 2; // 自定义
    public static $SKU_COMMISSION_TYPES                            = array(
                                                                    self::COMMISSION_TYPE_SYSTEM => '系统',
                                                                    self::COMMISSION_TYPE_CUSTOM => '自定义',
                                                                );
    public static $EXCHANGE_TYPE                                   = array(
                                                                  'DIRECT'          => 'direct',
                                                                  'TOPIC'           => 'topic',
                                                                  'DELAY'           => 'x-delayed-message',
                                                              );
    public static $MQ_EXCHANGES                                    = array(
                                                                  'MSG_CENTER_DIRECT'       => 'hsq.msgcenter.direct',
                                                                  'TRADE_CENTER_DIRECT'     => 'hsq.tradecenter.direct',
                                                                  'TRADE_CENTER_TOPIC'      => 'hsq.tradecenter.topic',
                                                                  'MARKETING_CENTER_DIRECT' => 'hsq.marketingcenter.direct',
                                                                  'TRADE_CENTER_DELAY'      => 'hsq.tradecenter.delay',
                                                              );
    public static $MQ_ROUTING_KEYS                                 = array(
                                                                'MSG_TRANSFER'                                  => 'hsq.msgcenter.msg_transfer',
                                                                'MQ_QUEUE_FOR_FINISH_PAYMENT_FOR_PIN_ORDER'     => 'hsq.marketingcenter.finish_payment_for_pin_order',
                                                                'MSG_PIN_SUCCESS'                               => 'hsq.marketcenter.success_pin_event',
                                                                'PINEVENTS_PRODUCER'                            => 'pinevents_producer',
                                                                'FINISH_PAYMENT'                                => 'finish_payment',
                                                                'FINISH_PIN_EVENT'                              => 'finish_pin_event',
                                                                'FINISH_PIN_EVENT_EXCEPTION'                    => 'finish_pin_event_exception',
                                                                'REFUND_POINT'                                  => 'hsq.tradecenter.refund_piont',
                                                                'NON_TRACE_DELIVERY_TRACK'                      => 'non_trace_delivery_track',
                                                                'SYNC_TO_SEARCH_ENGINE'                         => 'orders_for_sync_to_search_engine',
                                                                'ORDER_EXPORT'                                  => 'order_export',
                                                              );
    public static $MSG_CENTER_EVENTS                               = array(
                                                                  'FINISH_PIN_EVENT'   => 'pinSuccessByLast',
                                                                  'PIN_SUCCESS'        => 'pinSuccess',
                                                                  'SINGLE_PIN_SUCCESS' => 'successBySingleGroup',
                                                                  'PAID_NORMAL_ORDER'  => 'successByNormal',
                                                                  'PIN_STOCK_LIMIT'    => 'pinFailByTooPeople',
                                                              );
    public static $MSG_CENTER_BUSINESS                             = array(
                                                                  'PIN_BUSINESS'       => 'pinGroup',
                                                                  'NORMAL_ORDER'       => 'normalOrder',
                                                              );
    public static $MSG_CENTER_MSGTYPE                              = array(
                                                                  'WECHAT'             => 'wechat',
                                                              );
    const ACTION_REFUSE                                     = 'refuse';
    const ACTION_PASS                                       = 'pass';
    public static $TEMPLATE_MSG_LIST                               = array(
                                                                  'STATUS_MSG_NOT_SEND'      => 1,
                                                                  'STATUS_MSG_SEND_PROCESS'  => 2,
                                                                  'STATUS_MSG_SENDED'        => 3,
                                                                  'STATUS_MSG_SEND_DELETE'   => 4,
                                                              );
    public static $TRADE_CENTER_PIN_ACTIVITY_ACTION                = array(
                                                                  'ADD'    => 'add',
                                                                  'DELETE' => 'delete',
                                                              );
    public static $REFUND_REASON                                   = array(
                                                                  'PAID_ORDER_INVALID' => '支付成功后,订单不满足交易成功条件:%s',
                                                              );
    public static $MSG_TRANSFER_EVENT = array(
        'FINISH_PIN_EVENT'      => 'FINISH_PIN_EVENT',
        'PIN_EVENT_SUCCESS'     => 'PIN_EVENT_SUCCESS',
        'PIN_EVENT_CANCEL'      => 'PIN_EVENT_CANCEL',
        'FINISH_PAYMENT'        => 'FINISH_PAYMENT',
        'LOTTERY_ORDER_DELIVER' => 'LOTTERY_ORDER_DELIVER',
        'REFUND_POINT'          => 'REFUND_POINT',
        'LAUNCH_PIN_EVENT'      => 'LAUNCH_PIN_EVENT',
        'REFUND_FINISH'         => 'order/RefundOrder',
    );

    public static $TRADE_ORDER_PAYWAYS                             = array(
                                                                  'CASH'   => 1,
                                                                  'POINT'  => 2,
                                                                  'COUPON' => 4,
                                                              );
    public static $SETTLEMENT_WAY                                  = array(
                                                                  'ONLINE'   => 1,
                                                                  'OFFLINE'  => 2,
                                                              );

    const ORDER_STATUS_ALL              = 'ALL';                // 全部订单
    const ORDER_STATUS_WAITING_PAY      = 'WAITING_PAY';        // 待付款订单
    const ORDER_STATUS_WAITING_RECEIVE  = 'WAITING_RECEIVE';    // 待收货订单
    const ORDER_STATUS_WAITING_COMMENT  = 'WAITING_COMMENT';    // 待评价订单
    const ORDER_STATUS_AFTER_SALES      = 'AFTER_SALES';        // 售后订单

    public static $ORDER_LIST_TYPES            = array(
                                            self::ORDER_STATUS_ALL                      => 0,
                                            self::ORDER_STATUS_WAITING_PAY              => 1,
                                            self::ORDER_STATUS_WAITING_RECEIVE          => 2,
                                            self::ORDER_STATUS_WAITING_COMMENT          => 3,
                                            self::ORDER_STATUS_AFTER_SALES              => 4,
                                        );
    const INVOICE_TYPE_NOT_NEED         = 1;
    const INVOICE_TYPE_PERSONAL         = 2;
    const INVOICE_TYPE_COMPANY          = 3;

    public static $USER_BENEFIT_STATUS  = array(
                                                'NOT_ONLINE' => 1,
                                                'ONLINE'     => 2,
                                                'OFFLINE'    => 3,
                                            );

    
    public static $USER_BENEFIT_ITEM_TYPE = array(
                                            'SKU'        => 1,
                                            'GROUP_BUY'  => 2,   
                                        );

    public static $PC_POINT_SKU_SUB_CHANNEL = array(
                                                    'ALIPAY_ANT'      => 1,
                                                    'ALIPAY_HUABEI'   => 2,
                                                );
    //支付宝子渠道
    const POINT_SKU_SUBCHANNEL_ANT = 1; //蚂蚁会员
    const POINT_SKU_SUBCHANNEL_HUABEI = 2; //花呗

    //助力免单特定事件ID
    const MTC_TASK_OUT_ID               = 4;

    const ACTIVITY_TYPE_ASSISTANCE          = 1; // 助力活动

    public static $activityTypeMap  = array(
        'lottery'       => 1, // 抽奖团
        'assistance'    => 2, // 助力
    );

    const ACTIVITY_TYPE_PINTUAN     = 1;//拼团活动
    const ACTIVITY_TYPE_ALIPAY      = 2;//支付宝活动

    public static $activityTypePinTuanMap = array(
        self::SOURCE_TYPE_HSQ_APP,
        self::SOURCE_TYPE_HSQ_WECHAT,
        self::SOURCE_TYPE_BATCH,
        self::SOURCE_TYPE_ALIPAY_MINI_PROGRAM,
        self::SOURCE_TYPE_WECHAT_MINI_PROGRAM,
        self::SOURCE_TYPE_WECHAT,
    );

    public static $activityTypePointMap  = array(
        self::SOURCE_TYPE_HSQ_ALIPAY_ANT,
        self::SOURCE_TYPE_HSQ_ALIPAY_HUABEI,
    );


    public static $SubChannelCorrespondSource = array(
        self::POINT_SKU_SUBCHANNEL_ANT => [self::SOURCE_TYPE_ALIPAY_POINT,self::SOURCE_TYPE_ALIPAY_PREFERENTIAL_MINI_PROGRAM],
        self::POINT_SKU_SUBCHANNEL_HUABEI => [self::SOURCE_TYPE_HSQ_ALIPAY_HUABEI],
    );
    
    const IMPORT_THIRD_DEFAULT_USER_ID  = 101;

    //拼团失败的原因（库存不足）
    const PIN_EVENT_FAIL_NO_STOCK = 1;

    //拼团失败的原因（事件截止时间到了）
    const PIN_EVENT_FAIL_TIMEOUT  = 3;
}