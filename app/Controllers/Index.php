<?php


class Index extends Controller
{
    public function index()
    {
        $userModel = $this->model('user');
        $users = $userModel->getData();


        $this->view('index',[
            'users' => $users
        ]);

    }

    public function insert()
    {
        
    }
}

$obj = new Index();
$obj->index();
