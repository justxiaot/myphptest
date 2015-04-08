<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/15
 * Time: 11:41
 */

namespace IMooc\Database;

use IMooc\IDatabase;


class MYSQL implements IDatabase{

    protected $conn;

    function connect($host, $username, $password, $dbname)
    {
        $conn = mysql_connect($host, $username, $password);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }

    function query($sql)
    {
        mysql_query($sql, $this->conn);
    }

    function close()
    {
        mysql_close($this->conn);
    }
}