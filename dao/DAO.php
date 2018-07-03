<?php

namespace DAO\;

use DAO\Connection;

/**
 * Class DAO
 *
 * @package zlDAO
 */
class DAO
{
    /**
     * @param $class
     * @param $sql
     * @param array ...$args
     *
     * @return mixed
     */
    public static function get($class, $sql, ...$args)
    {
        try {
            $stmt = self::getStmt($sql, ...$args);
            $stmt->excute();

            return $stmt->fetchObject($class);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param $sql
     * @param array ...$args
     * @return bool
     */
    public static function execute($sql, ...$args)
    {
        try{
            $stmt = self::getStmt($sql, ...$args);

            return $stmt->execute();
        } catch (\PDOException $exception){
            throw $exception;
        }
    }

    /**
     * @param $class
     * @param $sql
     * @param array ...$args
     * @return array
     */
    public static function fetchAll($class, $sql, ...$args)
    {
        try{
            $stmt = self::getStmt($sql, ...$args);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);

        } catch (\PDOException $exception){
            throw $exception;
        }
    }

    /**
     * @param $sql
     * @param array ...$args
     * @return string
     */
    public static function fetchOne($sql, ...$args)
    {
        try{
            $stmt = self::getStmt($sql, ...$args);

            $stmt->setFetchMode(\PDO::FETCH_COLUMN,0);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_COLUMN);
        } catch (\PDOException $exception){
            throw $exception;
        }
    }

    /**
     * @param $sql
     * @param array ...$args
     * @return array
     */
    public static function category($sql, ...$args)
    {
        try{
            $stmt = self::getStmt($sql, ...$args);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_KEY_PAIR);
        }catch (\PDOException $exception){
            throw $exception;
        }
    }

    /**
     * @param $sql
     * @param array ...$args
     * @return \PDOStatement
     */
    private static function getStmt($sql, ...$args){

        try{
            $connection = Connection::getInstance();
            $stmt = $connection->prepare($sql);
            foreach ($args as $key => &$arg) {
                $stmt->bindParam($key + 1, $arg);
            }

            return $stmt;
        }catch (\PDOException $exception){
            throw $exception;
        }
    }
}
