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

Route::get('/', function () {
    return view('home');
});

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
//Change pass
Route::post('/cambiar-contrasena/{id}', 'Auth\ResetPasswordController@update');

//Route::resource('galeria', 'GaleryController');

//Route::resource('noticias', 'NoticesController');

Route::get('/ver-fotos', 'GaleryController@show');
Route::get('/subir-foto', 'GaleryController@create');
Route::post('/subir-foto', 'GaleryController@store');

Route::get('/editar-foto/{id}', 'GaleryController@edit');
Route::post('/editar-foto/{id}', 'GaleryController@update');

Route::get('/crear-noticia', 'NoticesController@create');
Route::post('/crear-noticia', 'NoticesController@store');

Route::post('/send-email', 'EmailController@send');


// PUBLIC

Route::get('/nosotros', function () {
    return view('partials.more-about');
});

Route::get('/noticias', function () {
    return view('partials.more-notices');
});

Route::get('/galeria', function () {
    return view('partials.more-galery');
});
