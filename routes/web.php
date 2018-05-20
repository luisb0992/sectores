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

/*---------- RUTAS DE LOGIN ----------------*/
Route::get('/', function () {
  return view('login');
})->name('login');
Route::post('auth', 'LoginController@login')->name('auth');
Route::post('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() { //middleware auth
  /* ---- Ruta para llamar al dashboard , modificarla si es necesario ----- */
	Route::get('dashboard', 'LoginController@index')->name('dashboard');
	/* --- Usuarios ---*/
	Route::resource('/users','UserController');
	//* --- Perfil --- */
	Route::get('/perfil', 'UserController@perfil')->name('perfil');
	Route::patch('/perfil', 'UserController@update_perfil')->name('update_perfil');
	//estructura
	Route::resource('/estructura','EstructuraController');
	Route::get('/borrar','EstructuraController@deleteRow')->name('borrar.base');
	Route::post('/comunidad','EstructuraController@comunidad')->name('comunidad.calle');
	Route::post('/calles','EstructuraController@calles')->name('calles.registrar');
	Route::post('/com','EstructuraController@comunidades')->name('comunidad.registrar');
	Route::get('/lineas','GraficosController@lineas')->name('lineas.grafico');
	Route::get('/sectoresGraficos','GraficosController@sectores')->name('sectores.grafico');
	// carga de data sectores sociales
	Route::get('verdata','DataController@index')->name('verData');
	Route::get('datasala','DataController@create')->name('createData');
	Route::post('datasala','DataController@store')->name('cargaData');
	Route::get('statusdata','DataController@status')->name('statusData');
	Route::post('statusdata','DataController@cambioStatus')->name('cambioStatus');
	Route::post('alldata','DataController@allData')->name('allData');
	Route::post('deletedata','DataController@eliminarData')->name('eliminarData');
	Route::get('datasala/{id}','DataController@edit')->name('editData');
	Route::get('parro/{municipio}','DataController@parroquias');
	Route::get('DataSectoresGraficos','GraficosController@sectoresGrafico')->name('data.sectores');
});