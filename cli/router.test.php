#!/usr/bin/php
<?php
// router.test.php
class Router
{
    public static function load($param)
    {
        $router = new static();
        $router->home = $param;
        return $router;
    }
}

$obj = Router::load(['home' =>'Bla bla Bla...']);

var_dump($obj->home);
