<?php
Route::get('/', function () {
    return view('landing');
})->name('beranda');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/pustaka', function () {
    return view('pustaka');
})->name('pustaka');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::resource('/post', 'PostController');
Route::get('/posts', 'PostController@list')->name('posts');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
