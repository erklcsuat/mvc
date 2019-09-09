<?php


namespace Framework;


class ApplicationContainer
{
    protected $space;
    protected $container;

    public function register(...$o) : void
    {
        foreach ($o as $item) {
            $this->space[] = $item;
        }
    }

    public function runApplication() : void
    {
        foreach ($this->space as $item) {
            $this->container[] = new $item;
        }
    }

}
