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
    return view('login');
});

/* ---- Ruuta para llamar al dashboard , modificarla si es necesario ----- */
Route::get('dashboard', 'LoginController@index');

/* --- Usuarios ---*/
Route::resource('/usuarios','UserController');


/*---------- RUTAS DE LOGIN ----------------*/
Route::post('auth', 'LoginController@login')->name('auth');
Route::post('/logout', 'LoginController@logout')->name('logout');
