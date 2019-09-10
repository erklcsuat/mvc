<?php


namespace Framework\Classes;


use Throwable;

class MethodNotAllowed extends \Exception
{
    public function __construct($message = "", Throwable $previous = null)
    {
        $code = 405;
        parent::__construct($message, $code, $previous);
    }
}
