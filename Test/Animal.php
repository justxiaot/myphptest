<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/23
 * Time: 10:59
 */

namespace Test;


class Animal {
    private $weight;

    public function __construct()
    {
        $this->weight = 0;
        echo "I am an animal <br/>";
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($w)
    {
        $this->weight = $w;
    }
}