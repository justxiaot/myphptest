<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/11
 * Time: 12:59
 */
/*define('BASEDIR', __DIR__);
include BASEDIR.'/IMooc/Loader.php';
spl_autoload_register('\\IMooc\\Loader::autoload');
//echo 123;
//IMooc\Loader::autoload();
IMooc\Object::test();
echo "<br/>";
App\Controller\Home\Index::test();

//$db = new IMooc\Database();

//$db = IMooc\Factory::createDatabase();

$db = IMooc\Database::getInstance();*/

/*class Page
{

    protected $strategy;
    function index()
    {
        if (isset($_GET['female']))
        {

        } else
        {

        }
    }

    function setStrategy(\IMooc\UserStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
}

$page = new Page();

if ($_GET['female'])
{
    $strategy = new IMooc\FemaleUserStrategy();
}
$page->setStrategy($strategy);
$page->index();*/

/*$user = new \IMooc\User(1);
$user->mobile = "11111111111";
$user->name = "xiaot";
$user->regtime = time();*/

class Bim {
    public function doSomething() {
        echo __METHOD__, '|';
    }
}

class Bar {
    public function doSomething() {
        $bim = new Bim();
        $bim->doSomething();
        echo __METHOD__, '|';
    }
}

class Foo {
    public function doSomething() {
        $bar = new Bar();
        $bar->doSomething();
        echo __METHOD__, '|';
    }
}

$foo = new Foo();
$foo->doSomething();
echo "<br/>";
class Bim2 {
    public function doSomething() {
        echo __METHOD__, '|';
    }
}

class Bar2 {

    private $bim2;

    public function __construct(Bim2 $bim2) {
        $this->bim2 = $bim2;
    }
    public function doSomething() {
        $this->bim2->doSomething();
        echo __METHOD__, '|';
    }
}

class Foo2 {

    private $bar2;

    public function __construct(Bar2 $bar2) {
        $this->bar2 = $bar2;
    }

    public function doSomething() {
        $this->bar2->doSomething();
        echo __METHOD__, '|';
    }
}

$foo2 = new Foo2(new Bar2(new Bim2()));
$foo2->doSomething();


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
    return new Bim2();
};

$container->bar = function($container) {
    return new Bar2($container->bim);
};

$container->foo = function($container) {
    return new Foo2($container->bar);
};
echo "<br/>";
$foo = $container->foo;
$foo->dosomething();