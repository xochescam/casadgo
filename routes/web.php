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
// Route::get('/', function () {

//     $image = Image::make('image.jpg');

//     $image->crop(100, 100);

//     $image->save('image2.jpg');

// });


// Home
Route::get('/', 'ContentController@home');

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

//Galery
Route::resource('galeria', 'GaleryController');
Route::get('/admin/galeria', 'GaleryController@index');
Route::delete('/admin/galeria/delete/{id}', ['as' => 'galeria.delete', 'uses' => 'GaleryController@destroy']);

Route::resource('noticias', 'NoticesController');
Route::get('/admin/noticias', 'NoticesController@index');
Route::get('/admin/noticias/{id}', 'NoticesController@showAdmin');
Route::delete('/admin/noticias/delete/{id}', ['as' => 'noticias.delete', 'uses' => 'NoticesController@destroy']);

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
