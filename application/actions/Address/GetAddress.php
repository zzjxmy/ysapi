<?php
/**
 * @name GetAddressAction
 * @author cway
 */

class GetAddressAction extends DWDData_Action
{
    private function getAddressFromCache( $addressId )
    {
        $redisKeyParams = array(
                              'vType' => 'kv',
                              'last'  => $addressId,
                          );
        $redisKey       = DWDData_Util::getRedisKey(DWDData_Const::REDIS_KEY_FOR_USER_ADDRESS, $redisKeyParams);

        $value          = DWDData_Cache::getInstance()->get($redisKey);
        return $value ? unserialize( $value ) : array();
    }

    public function _exec()
    {
        $this->renderSuccessJson(array( 'data' => [111,222] ));
    }
}
