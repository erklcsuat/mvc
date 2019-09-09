<?php


if (! function_exists('dd')) {
    function dd(...$args) {
        echo "<pre>";
        foreach ($args as $arg) {
            print_r($arg);
        }

        die(2);
    }
}

if (! function_exists('request')) {
    function request(string $param = '') {
        $r = \Framework\Classes\Request::newInstance();
        if ($param == '') {
            return $r;
        } else {
            return $r->get($param);
        }
    }
}
