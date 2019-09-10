<?php


namespace Framework\Classes;


class Container
{
    protected $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function make($class)
    {
        return new $class;
    }
}
