<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/8
 * Time: 17:39
 */

class Container {

    private $s = [];

    function __set($k, $v) {
        $this->s[$k] = $v;
    }

    function __get($k) {
        return $this->s[$k]($this);
    }
}

$container = new Container();
$container->bim = function() {
    return new Bim();
};

$container->bar = function($container) {
    return new Bar($container->bim);
};