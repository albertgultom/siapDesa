<?php
Route::get('/', function () {
    return view('landing');
})->name('beranda');

Route::get('/struktur-organisasi', function () {
    return view('monografi.struktur');
})->name('struktur');

Route::get('/sejarah', function () {
    return view('monografi.sejarah');
})->name('sejarah');

Route::get('/potensi', function () {
    return view('monografi.potensi');
})->name('potensi');

Route::get('/artikel', function () {
    return view('berita.artikel');
})->name('artikel');

Route::get('/foto', function () {
    return view('berita.foto');
})->name('foto');

// Route::get('/layanan', function () {
//     return view('layanan');
// })->name('layanan');

// Route::get('/produk', function () {
//     return view('produk');
// })->name('produk');

Route::resource('/post', 'PostController');
Route::get('/posts', 'PostController@list')->name('posts');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
