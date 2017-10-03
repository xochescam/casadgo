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
Route::get('/', 'contentController@home');

// ADMIN
Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/cambiar-contraseña', function () {
    return view('emails.contact');
});

//Login
Route::post('/iniciar-sesion', 'Auth\LoginController@postLogin');

// Logout
Route::get('/cerrar-sesion','Auth\LoginController@getLogout');

//Change pass
Route::get('/cambiar-contrasena/{id}', 'Auth\ResetPasswordController@index');
Route::post('/cambiar-contrasena/{id}', 'Auth\ResetPasswordController@update');

Route::resource('galeria', 'GaleryController');

Route::resource('noticia', 'NoticesController');

// Route::post('/send-email', 'EmailController@send');


// PUBLIC
Route::get('/nosotros', function () {
    return view('partials.about.more');
});

Route::get('/noticias', function () {
    return view('partials.notices.more');
});

Route::get('/galeria', function () {
    return view('partials.galery.more');
});
