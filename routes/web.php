<?php
// PUBLIC ROUTES
Route::get('/', 'HomeController@index')->name('beranda');
Route::get('/struktur-organisasi', 'HomeController@struktur')->name('struktur');
Route::get('/sejarah', 'HomeController@sejarah')->name('sejarah');
Route::get('/potensi','HomeController@potensi'); 
Route::get('/artikel', 'HomeController@artikel')->name('artikel');
Route::get('/artikel/{name}', 'HomeController@lihat_artikel')->name('artikel.lihat');
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
// Route::get('profil/{name}', 'ProfileController@struktur');

Route::resource('/gallery', 'GalleryController');
Route::get('/galleries/{content}', 'GalleryController@list')->name('galleries');

Route::resource('/population', 'PopulationController');
Route::resource('/education', 'EducationController');
Route::resource('/occupation', 'OccupationController');
Route::resource('/facility', 'FacilityController');
Route::resource('/servicing', 'ServicingController');
Route::resource('/criteria', 'CriteriaController');