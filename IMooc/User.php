<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/16
 * Time: 10:59
 */

namespace IMooc;


class User {

    public $id;
    public $name;
    public $mobile;
    public $regtime;

    function __construct($id)
    {
        $this->db = new Database\MYSQL();
        $this->db->connect('127.0.0.1', 'root', 'root', 'test');
        $this->db->query("select * from user limit 1");
    }

    function __destruct()
    {

    }

}