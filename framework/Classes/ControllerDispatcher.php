<?php


namespace Framework\Classes;


class ControllerDispatcher
{
    public function dispatch($controller, $method, $args = [])
    {

        if (method_exists($controller, 'callAction')) {
            return $controller->callAction($method, $args);
        }

        return $controller->{$method}(...$args);
    }
}
