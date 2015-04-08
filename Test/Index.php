<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/21
 * Time: 16:29
 */

namespace Test;
/*include "Person.php";
$p = new Person();
$p->setName("xiaot");
echo $p->getName();*/

/*include "Dog.php";

$myDog = new Dog();
$myDog->setWeight(20);
echo "Mydog's weight is ".$myDog->getWeight().'<br/>';
$myDog->bark();*/

    include "User.php";
    Vip::setSal(5000);
    echo "your sal is ".Vip::getSal();