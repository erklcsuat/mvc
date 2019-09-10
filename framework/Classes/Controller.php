<?php


namespace Framework\Classes;


class Controller
{
    public function callAction($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }
}
