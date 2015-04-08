<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/12
 * Time: 18:05
 */

namespace IMooc;


class Register {

    protected static $objects;

    static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    static function get($alias)
    {
        return self::$objects[$alias];
    }

    function _unset()
    {

    }

} 