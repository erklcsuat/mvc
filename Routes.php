<?php


$route = new \Framework\Classes\Route($uri);

// controller yapısı her zaman böyle olmalı.
// Controller@Method
$route->get('/test', 'TestController@index');

/// örnek url: http://127.0.0.1:8000/?name=emirhan
$route->get('/', function () {
    // form değerleri dinamik olarak eklendiği için
    // bu şekilde de erişebiliriz.
    // alternatif olarak, 'request('name')' de diyebilirdik.
    dd(request()->name);
});
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
