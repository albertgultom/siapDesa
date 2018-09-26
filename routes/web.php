<?php
// PUBLIC ROUTES
Route::get('/', 'HomeController@index')->name('beranda');
Route::get('/struktur-organisasi', 'HomeController@struktur')->name('struktur');
Route::get('/sejarah', 'HomeController@sejarah')->name('sejarah');

Route::get('/potensi','HomeController@potensi'); 

Route::get('/artikel', function () {
    return view('berita.artikel');
})->name('artikel');

Route::get('/foto','HomeController@foto' )->name('foto');

// Route::get('/layanan', function () {
//     return view('layanan');
// })->name('layanan');

// Route::get('/produk', function () {
//     return view('produk');
// })->name('produk');
Route::get('/test/{id}', 'PostController@test');

Route::resource('/post', 'PostController');
Route::get('/posts', 'PostController@list')->name('posts');

Route::resource('/tag', 'TagController');
Route::resource('/apparatus', 'ApparatusController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{nama}', 'HomeController@show');

Route::resource('/type', 'TypeController');
Route::get('/types', 'TypeController@list')->name('types');

Route::resource('/profile', 'ProfileController');
Route::get('profil/{name}', 'ProfileController@profil');

