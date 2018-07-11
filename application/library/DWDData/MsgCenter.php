<?php
/**
 * Created by PhpStorm.
 * User: wpp
 * Date: 17-2-6
 * Time: 上午9:41
 */

use dwd\basesdk\AsyncEventManager;

require 'vendor/autoload.php';

abstract class DWDData_MsgCenter
{
    public static function pinSuccessBySpecialActivity($rowPinOrder, $pin_event_id, $pinActivitiesId)
    {
        $specMsgInfo    = array(
            'type'      => 'pinSuccessBySpecialActivity',
            'business'  => 'pinGroup',
            'msgtype'   => 'wechat',
            'body'      => array(
                'userId'        => $rowPinOrder['user_id'],
                'orderId'       => $rowPinOrder['order_id'],
                'pinEventId'    => $pin_event_id,
                'pinActivitiesId'=> $pinActivitiesId,
                'pinSuccessTime'=> time(),
            ),
        );

        DWDData_Util::pushMsgToMsgCenter($specMsgInfo);
    }

    public static function getSpecialPinActivityIds()
    {
        $key = 'virtual_item_pin_activity_id';

        $pinActivityIds      = DWDData_Cache::getInstance()->get($key);

        if (empty($pinActivityIds)) {
            $result = DWDData_Util::getSysConfigParams($key);
            if (!$result) {
                DWDData_Logger::getInstance()->error('get_virtual_item_pin_activity_id_fail');
                return false;
            }

            $pinActivityIds           = json_encode($result);
            if ($pinActivityIds) {
                DWDData_Cache::getInstance()->set($key, $pinActivityIds, 3600);
            }
        }

        return json_decode($pinActivityIds, true);
    }
    /**
     * [paymentSuccessHeadTmp 微信模板消息发送 [普通团|抽奖团]团长付款成功]
     * @param  [type] $userId  [description]
     * @param  [type] $orderId [description]
     * @return [type]          [description]
     */
    public static function paymentSuccessHeadTmp($userId, $orderId)
    {
        $content = ['orderId'=>$orderId];
        $sendType = 'paymentsuccessheadtmp';
        $userId = $userId;
        DWDData_Util::sendWechantTmp($userId,$sendType,$content);
    }
    /**
     * [paymentSuccessHeadTmp 微信模板消息发送 [普通团|抽奖团]团员付款成功]
     * @param  [type] $userId  [description]
     * @param  [type] $orderId [description]
     * @return [type]          [description]
     */
    public static function paymentSuccessMembertTmp($userId, $orderId)
    {
        $content = ['orderId'=>$orderId];
        $sendType = 'paymentsuccessmembertmp';
        $userId = $userId;
        DWDData_Util::sendWechantTmp($userId,$sendType,$content);
    }
    /**
     * [pinSuccess 拼团成功已经切过去 测试完成就可废弃]
     * @param  [type] $userId     [description]
     * @param  [type] $orderId    [description]
     * @param  [type] $orderInfo  [description]
     * @param  [type] $itemDetail [description]
     * @param  [type] $pinEventId [description]
     * @param  [type] $orderType  [description]
     * @return [type]             [description]
     */
    public static function pinSuccess($userId, $orderId, $orderInfo, $itemDetail, $pinEventId, $orderType)
    {
        $msgInfo    = array(
            'type'      => 'pinSuccess',
            'business'  => 'pinGroup',
            'msgtype'   => 'wechat',
            'body'      => array(
                'title'         => $title,
                'userId'        => $userId,
                'orderId'       => $orderId,
                'payMoney'      => $orderInfo['need_pay_price'],
                'payDetail'     => $itemDetail, //商品名
                'payTime'       => date('Y-m-d H:i:s'),
//                'remark'        => '一键分享朋友圈➜➜➜',
//                'url'           => DWDData_Const::PIN_SHARE_URL . $pinEventId,
                'pinSuccessTime'=> time(),
                'orderType'=> $orderType,
            ),
        );
        DWDData_Util::pushMsgToMsgCenter($msgInfo);
    }
    /**
     * [pinPrizeSuccessByLast 模板消息发送 [抽奖团]最后一人抽奖团拼团成功]
     * @param  [type] $rowPinOrder [description]
     * @return [type]              [description]
     */
    public static function pinPrizeSuccessByLast($rowPinOrder)
    {
        $content = ['orderId'=>$rowPinOrder['order_id']];
        $sendType = 'pinprizesuccesstmp';
        $userId = $rowPinOrder['user_id'];
        DWDData_Util::sendWechantTmp($userId,$sendType,$content);
    }
    /**
     * [pinSuccessByLast 模板消息发送 最后一人拼团成功]
     * @param  [type] $title       [description]
     * @param  [type] $rowPinOrder [description]
     * @param  [type] $payMoney    [description]
     * @param  [type] $groupPrice  [description]
     * @param  [type] $orderType   [description]
     * @return [type]              [description]
     */
    public static function pinSuccessByLast($rowPinOrder)
    {
        $content = ['orderId'=>$rowPinOrder['order_id']];
        $sendType = 'pinlastsuccesstmp';
        $userId = $rowPinOrder['user_id'];
        DWDData_Util::sendWechantTmp($userId,$sendType,$content);
        /*$msgInfo    = array(
            'type'      => 'pinSuccessByLast',
            'business'  => 'pinGroup',
            'msgtype'   => 'wechat',
            'body'      => array(
                'title'         => $title,
                'userId'        => $rowPinOrder['user_id'],
                'orderId'       => $rowPinOrder['order_id'],
                'payMoney'      => $payMoney,
                'itemPrice'     => $groupPrice,
                'remark'        => '好食期优选美食2折起，正品保证，PICC承保，保质期透明！查看更多好吃的➜➜➜',
                'url'           => 'http://m.haoshiqi.net/#couple_list?channel_id=mbxxdeal',
                'pinSuccessTime'=> time(),
                'orderType'     => $orderType,
            ),
        );
        DWDData_Util::pushMsgToMsgCenter($msgInfo);
        */
    }
    /**
     * [SuccessByNormal 微信模板消息发送 [普通商品]购买成功]
     * @param [type] $rowOrderInfo [description]
     * @param [type] $skuName      [description]
     */
    public static function SuccessByNormal($rowOrderInfo, $skuName)
    {
        $content = ['orderId'=>$rowOrderInfo['id']];
        $sendType = 'buysuccesstmp';
        $userId = $rowOrderInfo['user_id'];
        DWDData_Util::sendWechantTmp($userId,$sendType,$content);

        /*
        $msgInfo    = array(
            'type'      => 'SuccessByNormal',
            'business'  => 'pinGroup',
            'msgtype'   => 'wechat',
            'body'      => array(
                'title'         => '恭喜您支付成功。我们会尽快为您发货，感谢您选择好食期商城！',
                'userId'        => $rowOrderInfo['user_id'],
                'orderId'       => $rowOrderInfo['id'],
                'itemDetail'    => $skuName,
                'remark'        => '商家将尽快为您发货，查看订单状态➜➜➜',
                'url'           => ' http://m.haoshiqi.net/#order_list?channel_id=mbxxfahuo',
            ),
        );
        DWDData_Util::pushMsgToMsgCenter($msgInfo);
        */
    }

    /**
     * [SuccessBySingleGroup 模板消息发送 单独购拼团成功]
     * @param [type] $rowOrderInfo [description]
     */
    public static function SuccessBySingleGroup($rowOrderInfo)
    {
        $content = ['orderId'=>$rowOrderInfo['id']];
        $sendType = 'pinalonesuccesstmp';
        $userId = $rowOrderInfo['user_id'];
        DWDData_Util::sendWechantTmp($userId,$sendType,$content);
        /*$msgInfo    = array(
            'type'      => 'SuccessBySingleGroup',
            'business'  => 'pinGroup',
            'msgtype'   => 'wechat',
            'body'      => array(
                'title'         => '恭喜您支付成功。我们会尽快为您发货，感谢您选择好食期商城！',
                'userId'        => $rowOrderInfo['user_id'],
                'orderId'       => $rowOrderInfo['id'],
                'itemPrice'     => $rowOrderInfo['need_pay_price'],
                'payMoney'      => $rowOrderInfo['need_pay_price'],
                'remark'        => '好食期优选美食2折起，正品保证，PICC承保，保质期透明！查看更多好吃的➜➜➜',
                'url'           => 'http://m.haoshiqi.net/#couple_list?channel_id=mbxxdeal',
                'pinSuccessTime'=> time(),
            ),
        );
        DWDData_Util::pushMsgToMsgCenter($msgInfo);
        */
    }

    /**
     * [SuccessByOrderRefund 微信模板消息发送 用户申请退款成功]
     * @param [type] $refundPayment [description]
     */
    public static function SuccessByOrderRefund($refundPayment)
    {
        $sendType = 'refundusersuccesstmp';
        $userId = $refundPayment['user_id'];
        $orderIds = explode(',', $refundPayment['order_ids']);
        foreach ($orderIds as $orderId) {
            DWDData_Util::sendWechantTmp($userId,$sendType,['orderId'=>$orderId]);
        }

        $list      = (new TradeOrderModel())->getTradeOrders($orderIds);
        $orderList = [];

        foreach ($list as $item) {
            $orderList[ $item['id'] ] = [
                'orderId'   => $item['id'],
                'orderType' => $item['order_type'],
            ];
        }

        $msgInfo = [
            'body'     => [
                'orderList'   => $orderList,
                'title'       => '您的订单已经退款，将在7个工作日内原路到账。',
                'userId'      => $refundPayment['user_id'],
                'refundMoney' => $refundPayment['need_refund_money'],
                'time'        => $refundPayment['created_at'],
            ],
        ];

        AsyncEventManager::getInstance()->pushLight(DWDData_Const::$MSG_TRANSFER_EVENT['REFUND_FINISH'], $msgInfo);
    }
    /**
     * [unbindMobileNotice 微信模板消息 解绑手机号]
     * @param  [type] $userId [description]
     * @param  [type] $mobile [description]
     * @return [type]         [description]
     */
    public static function unbindMobileNotice($userId, $mobile)
    {
        $msgInfo    = array(
            'type'      => 'unbindMobileNotice',
            'business'  => 'wechatEvent',
            'msgtype'   => 'wechat',
            'body'      => array(
                'userId'              => $userId,
                'mobile'              => $mobile,
                'unbindTime'          => date('Y-m-d H:i:s'),
            ),
        );
        DWDData_Util::pushMsgToMsgCenter($msgInfo);
    }

    /**
     * [winLottery 发送微信模板消息 抽奖团中奖]
     * @param  [type] $data       [description]
     * @return [type]                [description]
     */
    public static function winLottery($data)
    {
        foreach ($data as $userId => $messageDetail) {
            DWDData_Util::sendWechantTmp($userId,$messageDetail['sendType'],$messageDetail['content']);
        }
    }
    /**
     * [unWinLottery 发送微信模板消息 抽奖团未中奖]
     * @param  [type] $data       [description]
     * @return [type]                [description]
     */
    public static function unWinLottery($data)
    {
        foreach ($data as $userId => $messageDetail) {
            DWDData_Util::sendWechantTmp($userId,$messageDetail['sendType'],$messageDetail['content']);
        }
    }

    public static function pushRefundOrder($msgInfo)
    {
        $rabbitMqUtil          = DWDData_RabbitMqUtil::getInstance();
        $routing               = DWDData_Const::RABBIT_MQ_TRADE_CENTER_REFUND_ORDER;
        $exchangeOption        = array(
                                    'name'=> DWDData_Const::RABBIT_MQ_EXCHANGE_DIRECT,
                                    'type'=> DWDData_Const::$EXCHANGE_TYPE['DIRECT'],
                                );
        $res = $rabbitMqUtil->msgProducer(array( 'objType' => $msgInfo['objType'], 'objId'=> $msgInfo['objId'] ), $routing, $exchangeOption);
        if (!$res) {
            DWDData_Logger::getInstance()->error('push bill refund order failed msgInfo:['.json_encode($msgInfo));
        } else {
            DWDData_Logger::getInstance()->trace('push bill refund msgInfo['.json_encode($msgInfo));
        }
        return $res;
    }


    public static function pushRefundOrderByRefundPoint($msgInfo)
    {
        $msg = array(
            'event' => DWDData_Const::$MSG_TRANSFER_EVENT['REFUND_POINT'],
            'msgId' => DWDData_Util::getLogid(),
            'body' => array(
                'refundOrderId' => $msgInfo['refundOrderId'],
                'status' => DWDData_Const::$REFUND_PAYMENT_STATUS['VERIFY_PASS'],
            ),
        );

        $exchangeOption = array(
            'name' => DWDData_Const::$MQ_EXCHANGES['MSG_CENTER_DIRECT'],
            'type' => DWDData_Const::$EXCHANGE_TYPE['DIRECT'],
        );
        $res = DWDData_RabbitMqUtil::getInstance()->msgProducer(json_encode($msg), DWDData_Const::$MQ_ROUTING_KEYS['MSG_TRANSFER'], $exchangeOption);
        if (!$res) {
            DWDData_Logger::getInstance()->error('push msg to mq failed: body[' . json_encode($msg) . '] routing[' . DWDData_Const::$MQ_ROUTING_KEYS['MSG_TRANSFER'] . '] exchange[' . json_encode($exchangeOption) . '] File:' . __FILE__ . ' Line:' . __LINE__);
        }
    }

    public static function pushPinActivity($msgInfo)
    {
        $rabbitMqUtil          = DWDData_RabbitMqUtil::getInstance();
        $routing               = DWDData_Const::RABBIT_MQ_TRADE_CENTER_PIN_ACTIVITY;
        $exchangeOption        = array(
                                    'name'=> DWDData_Const::RABBIT_MQ_EXCHANGE_DIRECT,
                                    'type'=> DWDData_Const::$EXCHANGE_TYPE['DIRECT'],
                                );
        $res = $rabbitMqUtil->msgProducer(array( 'action' => $msgInfo['action'], 'pinActivityIds'=> $msgInfo['pinActivityIds'] ), $routing, $exchangeOption);
        if (!$res) {
            DWDData_Logger::getInstance()->error('push pinactivity failed msgInfo:['.json_encode($msgInfo));
        } else {
            DWDData_Logger::getInstance()->trace('push pinactivity success msgInfo['.json_encode($msgInfo));
        }
        return $res;
    }

    public static function commonMsgToMsgCenter($type, $business, $msgtype, $body)
    {
        $specMsgInfo    = array(
            'type'      => $type,
            'business'  => $business,
            'msgtype'   => $msgtype,
            'body'      => $body,
        );
        $queue = \Yaf\Registry::get('config')->queue->msgcenter->user_notification_new;
        return DWDData_Util::pushMsgToMsgCenter($specMsgInfo, $queue);
    }
}
