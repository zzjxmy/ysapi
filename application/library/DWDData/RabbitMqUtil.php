<?php
/**
 * RabbitMqUtil
 */
require 'vendor/autoload.php';

class DWDData_RabbitMqUtil
{
    private $amqpHost;
    private $amqpPort;
    private $amqpUserName;
    private $amqpPassWord;

    private $conn = [];

    private $registry = null;

    private $producer = null;

    const PERSISTENT = 2;

    /**
     * Static instance of self
     *
     * @var MQInstance
     */
    protected static $_instance;

    public function __construct()
    {
        $config                       = Yaf\Registry::get("config");
        $this->amqpHost               = $config->amqp->host ;
        $this->amqpPort               = $config->amqp->port ;
        $this->amqpUserName           = $config->amqp->username ;
        $this->amqpPassWord           = $config->amqp->password ;
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new DWDData_RabbitMqUtil();
        }

        return self::$_instance;
    }

    public function msgProducer($msg, $routingKey, $exchangeOption)
    {
        $registry = $this->registry();
        $producer = $this->producer();

        if (is_array($msg)) {
            $msg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        }

        if ($producer) {
            $producer->setExchangeOptions($exchangeOption);
            $producer->publish($msg, $routingKey);
            return true;
        } else {
            $errMsg = "failed msgProducer: ROUTINGKEY['.$routingKey.'] MSG[".$msg."] EXCHANGEOPTION[ " . json_encode($exchangeOption) . "] " . __FILE__ . ":Line " . __LINE__;
            DWDData_Logger::getInstance()->error($errMsg);
            return false;
        }
    }

    public function msgProducerAdvance($msg, $routingKey, $exchangeOption, $parameterOption)
    {
        if (is_array($msg)) {
            $msg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        }

        $registry       = $this->registry();
        $connection     = $registry->getConnection();
        if ($connection) {
            $channel    = $connection->channel();

            $channel->exchange_declare(
                $exchangeOption['name'],
                $exchangeOption['type'],
                false,
                true,
                false
            );

            $message = new \PhpAmqpLib\Message\AMQPMessage(
                $msg,
                array('delivery_mode' => self::PERSISTENT)
            );

            foreach ($parameterOption as $key => $value) {
                $message->set($key, $value);
            }

            $channel->basic_publish(
                $message,
                $exchangeOption['name'],
                !empty($routingKey) ? $routingKey : ""
            );
            return true;
        } else {
            $errMsg = "failed msgProducerAdvance " . __FILE__ . ":Line " . __LINE__;
            DWDData_Logger::getInstance()->error($errMsg);
            return false;
        }
    }

    public function connection()
    {
        if ($this->conn) {
            return $this->conn;
        }

        $this->conn = [
            'default' => new \PhpAmqpLib\Connection\AMQPLazyConnection($this->amqpHost, $this->amqpPort, $this->amqpUserName, $this->amqpPassWord, '/'),
        ];

        return $this->conn;
    }


    public function registry()
    {
        if (!$this->registry) {
            $con = $this->connection();
            $this->registry = new \Thumper\ConnectionRegistry($con, 'default');
        }

        return $this->registry;
    }

    public function producer()
    {
        if (!$this->producer) {
            $registry = $this->registry();
            if ($registry) {
                $this->producer = new \Thumper\Producer($registry->getConnection());
            }
        }

        return $this->producer;
    }
}
