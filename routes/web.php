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

Route::post('/iniciar-sesion', 'Auth\LoginController@postLogin');

//Route::resource('galeria', 'GaleryController');

//Route::resource('noticias', 'NoticesController');

Route::get('/subir-foto', 'GaleryController@create');

Route::get('/crear-noticia', 'NoticesController@create');


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
