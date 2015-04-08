<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/21
 * Time: 16:25
 */

namespace Test;


class Person {
    private $name = "Go";

    public function setName($_name)
    {
        $this->name = $_name;
    }

    public function getName()
    {
        return $this->name;
    }
}


