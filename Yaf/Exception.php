<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/28
 * Time: 14:19
 */

namespace Yaf;


class Exception extends \Exception {
    public static function trigger_error($errmsg='', $errtype=0) {
        $application = Application::app();
        if (!is_null($application)) {
            $application->setErrorNo($errmsg);
            $application->setErrorType($errtype);
        }
        trigger_error($errmsg, $errtype);
    }
}