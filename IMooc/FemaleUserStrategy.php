<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/16
 * Time: 10:44
 */

namespace IMooc;


class FemaleUserStrategy implements UserStrategy{

    function showAd()
    {
        echo "2014新款女装";
    }

    function showCategory()
    {
        echo "女装";
    }

}