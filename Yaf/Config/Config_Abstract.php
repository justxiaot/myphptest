<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/28
 * Time: 14:15
 */

namespace Yaf;


abstract class Config_Abstract {

    protected $_config = array();

    protected $_readonly = false;

    abstract public function get($name);

    abstract public function set($name, $value);

    public function readonly() {
        return $this->_readonly;
    }

    abstract public function toArray();
}