<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/28
 * Time: 14:26
 */

namespace Yaf\Config;


use Yaf\Config_Abstract;
use Yaf\Exception;
use Yaf\Exception\TypeError;

class Simple extends Config_Abstract implements
    \Iterator, \ArrayAccess, \Countable {

    protected $_skipNextIteration = false;

    public function __construct($config, $readonly=false) {
       if (is_array($config)) {
           $this->_config = [];
           foreach ($config as $key=>$value) {
               if(is_array($value)) {
                   $this->_config[$key] = new self($value);
               } else {
                   $this->_config[$key] = $value;
               }
           }
       } else {
           throw new Exception('param must be array.');
       }
        $this->_readonly = (bool)$readonly;
    }

    public function count() {
        return count($this->_config);
    }

    public function current() {
        $this->_skipNextIteration = false;
        return current($this->_config);
    }

    public function __get($name) {
        return $this->get($name);
    }

    public function __set($name, $value) {
        if(!$this->_readonly) {
            if (is_string($name)) {
                if (is_array($value)) {
                    $this->_config[$name] = new self($value, false);
                } else {
                    $this->_config[$name] = $value;
                }
            } else {
                throw new TypeError('Expect a string key.');
            }
        } else {
            throw new Exception('Config is readonly.');
        }
        return true;
    }

    public function __unset($name) {
        if (!$this->_readonly) {
            unset($this->_config[$name]);
            $this->_skipNextIteration = true;
        } else {
            throw new Exception('Config is readonly.');
        }
    }

    public function __isset($name) {
        return isset($this->_config[$name]);
    }

    public function offsetExists($name) {
        return $this->__isset($name);
    }

    public function offsetGet($name) {
        return $this->__get($name);
    }

    public function offsetSet($name, $value) {
        return $this->__set($name, $value);
    }

    public function offsetUnset($name) {
        if (!$this->_readonly)
            unset($this->_config[$name]);
        else
            throw new Exception('Config is readonly.');
    }

    public function key() {
        return key($this->_config);
    }

    public function next() {
        if ($this->_skipNextIteration) {
            $this->_skipNextIteration = false;
            return;
        }
        next($this->_config);
    }

    public function rewind() {
        $this->_skipNextIteration = false;
        reset($this->_config);
    }

    public function toArray() {
        $array = [];
        $data = $this->_config;

        foreach ($data as $key=>$value) {
            if ($value instanceof Simple) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    public function valid() {
        $key = key($this->_config);
        return $key ? true : false;
    }

    public function get($name) {
        $result = false;

        if (array_key_exists($name, $this->_config)) {
            $result = $this->_config[$name];
        }
        if (is_array($result)) {
            $result = new self($result, $this->readonly());
        }
        return $result;
    }

    public function set($name, $value) {
        return $this->__set($name, $value);
    }

    protected function _arrayMergeRecursive($firstArray, $secondArray) {
        if(is_array($firstArray) && is_array($secondArray)) {
            foreach ($secondArray as $key=>$value) {
                if (isset($firstArray[$key])) {
                    $firstArray[$key] = $this->_arrayMergeRecursive($firstArray[$key], $value);
                } else {
                    if ($key === 0) {
                        $firstArray = [0 => $this->_arrayMergeRecursive($firstArray, $value)];
                    } else {
                        $firstArray[$key] = $value;
                    }
                }
            }
        } else {
            $firstArray = $secondArray;
        }

        return $firstArray;
    }
}