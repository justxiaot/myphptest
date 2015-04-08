<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/12
 * Time: 17:48
 */

namespace IMooc;


class Factory {
    static function createDatabase()
    {
        $db = new Database();
        return $db;
    }

} 