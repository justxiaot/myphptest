<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/11
 * Time: 13:07
 */
namespace IMooc;

class Loader
{
    static function autoload($class)
    {
        //var_dump($class);
        $file = BASEDIR.'/'.str_replace('\\', '/', $class).'.php';
        //$file = BASEDIR.'/'.$class.'.php';
        //var_dump($file);
        require $file;
    }
}
