<?php


namespace Framework\Classes;


class Request
{
    use FormInputs;

    protected $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public static function newInstance(): Request
    {
        return new static();
    }
}
