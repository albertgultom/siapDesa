<?php
Route::get('/', function () {
    return view('landing');
});

Route::resource('/post', 'PostController');
Route::get('/posts', 'PostController@list')->name('posts');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
