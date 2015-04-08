<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/23
 * Time: 11:14
 */

namespace Test;


class Employee {
    private $sal = 3000;
    public function getSal()
    {
        return $this->sal;
    }

}

class Manager extends Employee
{
    protected $sal = 5000;
    public function getParentSal()
    {
        return parent::getSal();
    }
}

$manager = new Manager();
echo "PHP: ".phpversion()."<br/>";
echo $manager->getSal();
echo "<br/>";
echo "parent's \$sal is: ".$manager->getParentSal();
