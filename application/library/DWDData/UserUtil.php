<?php

class DWDData_UserUtil
{
    public function checkNewUser($userId, $payTime)
    {
        $conditions          = array(
            array(
                'field'      => 'user_id',
                'value'      => $userId,
                'op'         => '=',
            ),
            array(
                'field'      => 'pay_time',
                'value'      => 0,
                'op'         => '>',
            ),
        );
        if (!is_null($payTime)) {
            $conditions[]    = array(
                'field'      => 'pay_time',
                'value'      => $payTime,
                'op'         => '<',
            );
        }

        $m_tradeOrder        = new TradeOrderModel();
        $totalCnt            = $m_tradeOrder->getTradeOrderListCnt($conditions) ? : 0;
        $isNewUser           = true;
        if ($totalCnt > 0) {
            $isNewUser       = false;
        }

        return $isNewUser;
    }
}