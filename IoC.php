<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/8
 * Time: 18:05
 */

class IoC {

    protected static $registry = [];

    public static function bind($name, Callable $resolver) {
        static::$registry[$name] = $resolver;
    }

    public static function make($name) {
        if(isset(static::$registry[$name])) {
            $resolver = static::$registry['name'];
            return $resolver();
        }
        throw new Exception('Alias not exist in the IoC registry.');
    }
}

IoC::bind('bim', function() {
    return new Bim2();
});
IoC::bind('bar', function() {
    return new Bar2(IoC::make('bim'));
});

IoC::bind('foo', function() {
    return new Foo2(IoC::make('bar'));
});

$foo = IoC::make('foo');
$foo->doSomething();