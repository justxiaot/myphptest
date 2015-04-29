<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/28
 * Time: 13:46
 */

namespace Yaf;


use Yaf\Exception\StartupError;
use Yaf\Config\Ini;
use Yaf\Config\Simple;
use Yaf\Request\Http;

class Application {

    protected $_config = null;

    protected $_dispatcher = null;

    protected static $_app = null;

    protected $_modules = [];

    protected $_running = false;

    protected $_environ = null;

    protected $_options = [];

    protected $_errno = 0;

    protected $_errmsg = '';

    public function __construct($config, $env = null) {
        $app = self::app();
        if (!is_null($app)) {
            throw new StartupError(
                'Only one application can be initialized'
            );
        }
        $this->_environ = $env;
        $config = $this->_loadConfig($config);

        if ($config == null ||
            (!($config instanceof Config_Abstract))
        || $this->parseOptions($config->toArray()) != true) {
            throw new StartupError('Initialization of application config failed');
        }
        $this->_config = $config;

        $request = new Http();
    }

    protected function _loadConfig($file) {
        $environment = $this->environ();
        if (is_string($file)) {
            $config = new Ini($file, $environment);
        } elseif (is_array($file)) {
            $config = new Simple($file);
        } elseif ($file instanceof Config_Abstract) {
            $config = $file;
        } else {
            throw new Exception (
                'Invalid options provided; must be location of config file, '.
                'a config object, or an array'
            );
        }
        return $config;
    }

    public function environ() {
        $env = $this->_environ;
        if (is_null($env)) {
            $fromIni = ini_get('yaf.environ');
            $env = $fromIni ? : 'product';
        }
        return $env;
    }

    public static function app() {
        return self::$_app;
    }

}