<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/12
 * Time: 17:51
 */

namespace IMooc;

interface IDatabase
{
    function connect($host, $username, $password, $dbname);
    function query($sql);
    function close();
}


class Database {

    private static $db;

    private function __construct()
    {

    }

    static function getInstance()
    {
        if (self::$db)
        {
            return self::$db;
        }
        self::$db = new self();
        return self::$db;
    }

    function where($where)
    {
        return $this;
    }

    function order($order)
    {
        return $this;
    }

    function limit($limit)
    {
        return $this;
    }

} 