<?php

class DWDData_AntiCheatUtil
{
    const ENTITY_TYPE_FOR_SKU    = 1;
    const ENTITY_TYPE_FOR_COUPON = 2;

    public function getCheatRuleBySkuId($skuId)
    {
        $m_antiCheatRule   = new AntiCheatRuleModel;
        return $m_antiCheatRule->getAntiCheatRule(self::ENTITY_TYPE_FOR_SKU, $skuId);
    }

    public function getCheatRuleByCouponId($couponId)
    {
        $m_antiCheatRule   = new AntiCheatRuleModel;
        return $m_antiCheatRule->getAntiCheatRule(self::ENTITY_TYPE_FOR_COUPON, $couponId);
    }
}