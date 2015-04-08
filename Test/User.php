<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/23
 * Time: 11:34
 */

namespace Test;


abstract class User
{
    protected static $sal = 0;
    static abstract function getSal();
    static abstract function setSal($sal);
}

class Vip extends User
{
    static function getSal()
    {
        return self::$sal;
    }
    static function setSal($sal)
    {
        self::$sal = $sal;
    }
}