<?php

namespace App\Controllers\Controller;

class Controller
{
    public static function view($view_name, $data = [])
    {
        extract($data);

        require_once './Views/'.$view_name.'.php';
    }

    public function model($name)
    {
        require_once './Model/'.ucfirst($name). '.php';
        return new $name();
    }
}
