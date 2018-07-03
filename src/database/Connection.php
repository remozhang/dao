<?php

namespace DAO\Database;

/**
 * Class Connection
 *
 * @package DAO\Database
 */
class Connection
{
    /**
     * @var string
     */
    private static $dsn = "mysql:host=127.0.0.1;dbname=crawler;port=3306";

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
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }
}