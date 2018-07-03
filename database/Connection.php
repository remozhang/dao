<?php

namespace DAO;

/**
 * Class Connection
 *
 * @package zlDAO
 */
class Connection
{
    /**
     * @var string
     */
    private static $dsn = "mysql:host=192.168.10.10;dbname=homestead;port=3306;charset=UTF-8";

    /**
     * @var string
     */
    private static $username = "homestead";

    /**
     * @var string
     */
    private static $password = "secret";

    /**
     * @var
     */
    private static $instance;

    /**
     * Connection constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return \PDO
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new \PDO(self::$dsn, self::$username, self::$password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}