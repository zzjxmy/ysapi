<?php
/**
 * Redis连接
 * author caowei
 */
class DWDData_Cache
{
    /**
     * Static instance of self
     *
     * @var CacheInstance
     */
    protected static $_instance;

    /**
     * Redis instance
     *
     * @var mysqli
     */
    protected $_redis;

    /**
     * @param int $port
     */
    public function __construct()
    {
        if (!$this->_redis) {
            $this->connect();
        }
        self::$_instance  = $this;
    }

    protected function connect()
    {
        $config       = Yaf\Registry::get("config");
        $this->_redis = new Redis();
        $res          = $this->_redis->connect($config->redis->config->host, $config->redis->config->port);
        
        if (false == $res) {
            DWDData_Logger::getInstance()->error('redis server error : ' . __FILE__ . 'line: ' . __LINE__);
            throw new Exception("Redis Server Error", DWDData_ErrorCode::SERVER_ERROR);
        }

        if ($config->redis->config->isauth) {
            $res      = $this->_redis->auth($config->redis->config->auth);
            if (false == $res) {
                DWDData_Logger::getInstance()->error('redis auth error : ' . __FILE__ . 'line: ' . __LINE__);
            }
        }

        $dbIndex      = is_numeric($config->redis->config->dbIndex) ? $config->redis->config->dbIndex : 0;
        $this->_redis->select($dbIndex);
    }

    public function getRedisInstance()
    {
        return $this->_redis;
    }

    /**
     * Close connection
     */
    public function __destruct()
    {
        if ($this->_redis) {
            $this->_redis->close();
        }
    }

    /**
     *
     * @uses $db = DWDData_Cache::getInstance();
     *
     * @return object Returns the current instance.
     */
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new DWDData_Cache();
        }

        return self::$_instance;
    }

    //Key
    public function exists($key)
    {
        if (!$this->_redis) {
            $this->connect();
        }

        return $this->_redis->exists($key);
    }

    public function delete($key)
    {
        if (!$this->_redis) {
            $this->connect();
        }

        return $this->_redis->delete($key);
    }

    public function expire($key, $timeout) 
    {
        if (!$this->_redis) {
            $this->connect();
        }

        $res = $this->_redis->expire($key, $timeout);
        return $res;
    }

    public function expireAt($key, $timestamp)
    {
        if (!$this->_redis) {
            $this->connect();
        }

        return $this->_redis->expireAt($key, $timestamp);
    }

    //String
    public function get($key)
    {
    	if (!$this->_redis) {
            $this->connect();
    	}

    	return $this->_redis->get($key);
    }

    public function set($key, $value, $options = array())
    {
        if (!$this->_redis) {
            $this->connect();
        }

        if (empty($options)) {
            return $this->_redis->set($key, $value);
        }
         
        return $this->_redis->set($key, $value, $options);
    }

    public function incr($key)
    {
        if (!$this->_redis) {
            $this->connect();
        }
        return $this->_redis->incr($key);
    }

    public function decr($key)
    {
        if (!$this->_redis) {
            $this->connect();
        }
        return $this->_redis->decr($key);
    }

    public function incrBy( $key, $value )
    {
        if (!$this->_redis) {
            $this->connect();
        }
        return $this->_redis->incrBy( $key, $value );
    }

    public function decrBy( $key, $value )
    {
        if (!$this->_redis) {
            $this->connect();
        }
        return $this->_redis->decrBy( $key, $value );
    }

    //Hash
    public function hIncrBy($key, $field, $increment = 1) 
    {

        if (!$this->_redis){
            $this->connect();
        }

        return $this->_redis->hIncrBy($key, $field, $increment);
    }

    public function hget($key, $field) 
    {

        if (!$this->_redis){
            $this->connect();
        }

        $res = $this->_redis->hget($key, $field);
        return $res;
    }

    //List
    public function rPush( $key, $value )
    {
        if ( !$this->_redis ){
            $this->connect();
        }

        return $this->_redis->rPush( $key, $value );
    }

    public function lPop( $key )
    {
        if ( !$this->_redis ){
            $this->connect();
        }

        return $this->_redis->lPop( $key );
    }

    public function lRange($key, $start, $end)
    {
        if (!$this->_redis){
            $this->connect();
        }
        return $this->_redis->lRange($key, $start, $end);
    }

    public function lLen($key)
    {
        if (!$this->_redis) {
            $this->connect();
        }

        return $this->_redis->lLen($key);
    }


    //Set
    public function sAdd($key, $value)
    {
        if (!$this->_redis){
            $this->connect();
        }

        $res = $this->_redis->sAdd($key, $value);
        return $res;
    }

    public function sRem($key, $value)
    {
        if (!$this->_redis){
            $this->connect();
        }

        $res = $this->_redis->sRem($key, $value);
        return $res;
    }

    public function sRandMember( $key, $count = 1 )
    {
        if (!$this->_redis){
            $this->connect();
        }

        $res = $this->_redis->sRandMember($key, $count);
        return $res;
    }

    public function sMembers($key)
    {
        if (!$this->_redis) {
            $this->connect();
        }
        return $this->_redis->sMembers($key);
    }

    //Sorted-Set
    public function zAdd($key, $score, $value)
    {
        if (!$this->_redis){
            $this->connect();
        }

        $res = $this->_redis->zAdd($key, $score, $value);
        $this->_redis->expire($key, 300);
        return $res;
    }

    public function zRange($key, $start, $end)
    {
        if (!$this->_redis){
            $this->connect();
        }

        return $this->_redis->zRange($key, $start, $end);
    }


    public function zRevRange($key, $start, $end, $withscore = false)
    {
        if(!$this->_redis){
            $this->connect();
        }

        return $this->_redis->zRevRange($key, $start, $end, $withscore);
    }

    public function zIncrBy($key, $increment, $value)
    {
        if(!$this->_redis){
            $this->connect();
        }

        return $this->_redis->zIncrBy($key, $increment, $value);
    }

    public function zScore($key, $value)
    {
        if(!$this->_redis){
            $this->connect();
        }

        return $this->_redis->zScore($key, $value);
    }
}