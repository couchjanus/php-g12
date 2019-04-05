<?php

define('ROUTES', require CONFIG.'routes'.EXT);

class Router
{
    protected $routes = ROUTES;

    public function direct($uri)
    {   
        if (array_key_exists($uri, $this->routes)) {
            return $this->callAction(
                ...$this->getAction($this->routes[$uri])
            );
        } else {
            return $this->callAction(
                ...$this->getAction($this->routes['404'])
            ); 
        }
    }

    private function getAction($route)
    {
        list($segments, $action) = explode('@', $route);
        $segments = explode('\\', $segments);
        $controller = array_pop($segments);
        $controllerFile = '/';
        do {
            if (count($segments)==0) {
                return array ($controller, $action, $controllerFile);
            } else {
                $segment = array_shift($segments);
                $controllerFile = $controllerFile.$segment.'/';
            }
        } while ( count($segments) >= 0);
    }

    protected function callAction($controller, $action, $controllerPath)
    {
        include CONTROLLERS .$controllerPath . $controller . EXT;
        
        $controller = new $controller;
        
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action();
    }
}
