<?php 
/**
 * @file Result.php
 *
 * @author caowei
 *         @date 2015-08-23 下午11:52:02
 *         @brief 描述
 *
 */
class DWDData_Result
{
    
    /*
     * 结果中ERRNO的字段名
     */
    const ERRNO = 'errno';

    /*
     * 结果中ERRMSG的字段名
     */
    const ERRMSG = 'errmsg';

    /*
     * 结果中DATA的字段名
     */
    const DATA = 'data';

    /*
     * 结果中msg的字段名
     */
    const MSG = 'msg';
    
    /**
     * [mergeData 合并两个result对象]
     * @param  DWDData_Result $result [description]
     * @return [type]             [description]
     */
    public function mergeData(DWDData_Result $result)
    {
        $this->setData($result->getData());
        $this->setErrno($result->getErrno());
        $this->setErrmsg($result->getErrmsg($this->{self::ERRMSG}));
        $this->setMsg($result->getMsg($this->{self::MSG}));
    }

    /**
     * [setData 设置数据]
     * @param [type] $data [description]
     */
    public function setData($data)
    {
        $this->{self::DATA} = $data;
    }

    /**
     * [setErrno 设置错误号]
     * @param [type] $errno [description]
     */
    public function setErrno($errno)
    {
        $this->{self::ERRNO} = $errno;
    }

    /**
     * [setErrmsg 设置错误消息]
     * @param [type] $errmsg [description]
     */
    public function setErrmsg($errmsg)
    {
        $this->{self::ERRMSG} = $errmsg;
    }
    
    public function setMsg($msg)
    {
        $this->{self::MSG} = $msg;
    }
    /**
     * [getErrno 获取错误号]
     * @return [type] [description]
     */
    public function getErrno()
    {
        if (isset($this->{self::ERRNO})) {
            return $this->{self::ERRNO};
        } else {
            return DWDData_ErrorCode::ERRNO_UNKNOW;
        }
    }
    
    /**
     * [getErrmsg 获取错误消息]
     * @param  [type] $errno [description]
     * @return [type]        [description]
     */
    public function getErrmsg($errno = DWDData_ErrorCode::ERRNO_UNKNOW)
    {
        if (isset($this->{self::ERRMSG})) {
            return $this->{self::ERRMSG};
        } elseif ($this->{self::ERRNO} == DWDData_ErrorCode::NORMAL) {
            return DWDData_ErrorCode::NORMAL_MSG;
        } else {
            return DWDData_ErrorCode::ERRNO_UNKNOW;
        }
    }
    
    /**
     * [getData 必须返回字典,不允许是其他类型 @return Array]
     * @return [type] [description]
     */
    public function getData()
    {
        if (isset($this->{self::DATA})) {
            return $this->{self::DATA};
        } else {
            return array();
        }
    }
    
    /**
     * [getMsg 获取返回信息]
     * @return [type] [description]
     */
    public function getMsg()
    {
        if (isset($this->{self::MSG})) {
            return $this->{self::MSG};
        } else {
            return $this->getErrmsg();
        }
    }
    
    /**
     * [getResult 以数组的形式返回所有数据]
     * @return [type] [description]
     */
    public function getResult()
    {
        $result = array(
                self::ERRNO => $this->getErrno(),
                self::ERRMSG => $this->getErrmsg(),
                self::DATA => $this->getData(),
                'timestamp' => time(),
                'serverlogid' => 111,
        );

        return $result;
    }
 

    /**
     * [getDataByKey 根据键值取数据]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function getDataByKey($key)
    {
        if (!isset($this->{self::DATA}[$key])) {
            return $this->{self::DATA}[$key];
        } else {
            return null;
        }
    }

    /**
     * [toJson 结果转化为JSON]
     * @return [type] [description]
     */
    public function toJson()
    {
        $result = $this->getResult();
        
        if (is_array($result[self::DATA]) && empty($result[self::DATA])) {
            $result[self::DATA] = new stdClass();
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * [__toString 结果当做字符串]
     * @return string [description]
     */
    public function __toString()
    {
        $result = $this->getResult();
        
        if (is_array($result[self::DATA]) && empty($result[self::DATA])) {
            $result[self::DATA] = new stdClass();
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
