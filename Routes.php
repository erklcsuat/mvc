<?php


$route = new \Framework\Classes\Route($uri);

$route->get('/bu/bir/test//0x10', function () {
    $req = new \Framework\Classes\Request();
    dd($req->all());
});
$route->get('index', function(){
    Index::view('index');
});

$route->get('book-add', function(){
    BookController::view('book-add');
});
