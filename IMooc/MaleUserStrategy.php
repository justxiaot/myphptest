<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/16
 * Time: 10:47
 */

namespace IMooc;


class MaleUserStrategy implements UserStrategy{

    function showAd()
    {
        echo "Iphone6";
    }

    function showCategory()
    {
        echo "IT数码";
    }

}