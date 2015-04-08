<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/23
 * Time: 11:43
 */

namespace Test;

interface User
{
    const MAX_GRADE = 99;
    function getName();
    function setName($_name);
}

class NormalUser implements User{
    private $name;
    function getName()
    {
        return $this->name;
    }
    function setName($_name)
    {
        $this->name = $_name;
    }
}

interface Administrator
{
    function setBulletin($_bulletin);
}

class Admin implements User,Administrator
{
    function getName()
    {

    }
    function setName($_name)
    {

    }
    function setBulletin($_bulletin)
    {

    }

}