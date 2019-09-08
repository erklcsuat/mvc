<?php

Route::get('index',function(){
    Index::view('index');
});

Route::get('book-add',function(){
    BookController::view('book-add');
});