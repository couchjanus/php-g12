#!/usr/bin/php
<?php

// Запуск PHP-скрипта как консольного
// phpinfo();
function getPathControllerAction($route)
{
    $segments = explode('\\', $route);
    list($controller, $action) = explode('@', array_pop($segments));
    var_dump($segments);
    $controllerPath = DIRECTORY_SEPARATOR;
    do {
        if (count($segments)===0) {
            return array ($controllerPath, $controller, $action);
        } else {
            $segment = array_shift($segments);
            $controllerPath = $controllerPath . $segment . DIRECTORY_SEPARATOR;
        }
    } while (count($segments)>=0);
}
var_dump(getPathControllerAction('Admin\DashboardController@index'));


$url = 'http://localhost:8000/admin/posts?a=1#anchor';

var_dump(parse_url($url));
var_dump(parse_url($url, PHP_URL_SCHEME));
var_dump(parse_url($url, PHP_URL_USER));
var_dump(parse_url($url, PHP_URL_PASS));
var_dump(parse_url($url, PHP_URL_HOST));
var_dump(parse_url($url, PHP_URL_PORT));
var_dump(parse_url($url, PHP_URL_PATH));
var_dump(parse_url($url, PHP_URL_QUERY));
var_dump(parse_url($url, PHP_URL_FRAGMENT));

?>