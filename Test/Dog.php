<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/23
 * Time: 11:02
 */

namespace Test;

include "animal.php";

class Dog extends Animal
{
    public function bark()
    {
        echo "wang--wang--";
    }
}