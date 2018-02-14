<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Home
Route::get('/', 'ContentController@home');

// ADMIN
Route::get('/admin', 'Auth\LoginController@getAdmin');

// Route::get('/cambiar-contraseña', function () {
//     return view('emails.contact');
// });

//Login
Route::post('/iniciar-sesion', 'Auth\LoginController@postLogin');

// Logout
Route::get('/cerrar-sesion','Auth\LoginController@getLogout');

//Change pass
Route::get('/cambiar-contrasena', 'Auth\ResetPasswordController@index');
Route::post('/cambiar-contrasena/{id}', 'Auth\ResetPasswordController@update');

//Galery
Route::resource('galeria', 'GaleryController');
Route::get('/admin/galeria', 'GaleryController@index');
Route::delete('/admin/galeria/delete/{id}', ['as' => 'galeria.delete', 'uses' => 'GaleryController@destroy']);
Route::get('/admin/galeria/delete-item/{id}', ['as' => 'galeria.delete.item', 'uses' => 'GaleryController@destroyItem']);


Route::resource('noticias', 'NoticesController');
Route::get('/admin/noticias', 'NoticesController@index');
Route::delete('/admin/noticias/delete/{id}', ['as' => 'noticias.delete', 'uses' => 'NoticesController@destroy']);
Route::get('/admin/noticias/delete-item/{id}', ['as' => 'noticias.delete.item', 'uses' => 'NoticesController@destroyItem']);


Route::post('/send-email', 'EmailController@send');

// PUBLIC
Route::get('/nosotros', function () {
    return view('partials.about.more');
});

Route::get('/noticias', 'ContentController@moreNotices');
Route::get('/galeria', 'ContentController@moreGalery');

