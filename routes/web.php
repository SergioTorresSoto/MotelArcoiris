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
    return view('welcome');
});

Route::resource('users','UserController');

	Route::get('users/{id}/destroy', [
			'uses' => 'UserController@destroy',
			'as' => 'users.destroy'
		]);

Route::resource('userstype','UserTypeController');

  Route::get('userstype/{id}/destroy', [
		'uses' => 'UserTypeController@destroy',
		'as' => 'userstype.destroy'
	]);

Route::resource('controlhorario','ControlHorarioController'); 

  Route::get('controlhorario/{id}/destroy', [
		'uses' => 'ControlHorarioController@destroy',
		'as' => 'controlhorario.destroy'
	]);


 Route::resource('jornadas','JornadaController'); 

 	Route::get('jornadas/{id}/destroy', [
		'uses' => 'JornadaController@destroy',
		'as' => 'jornadas.destroy'
	]);

Route::resource('usersjornadas','UserJornadaController'); 

 	Route::get('usersjornadas/{id}/destroy', [
		'uses' => 'userJornadaController@destroy',
		'as' => 'usersjornadas.destroy'
	]);

Route::resource('tipoproducto','TipoProductoController');

  Route::get('tipoproducto/{id}/destroy', [
		'uses' => 'TipoProductoController@destroy',
		'as' => 'tipoproducto.destroy'
	]);

Route::resource('productos','ProductoController');

  Route::get('productos/{id}/destroy', [
		'uses' => 'ProductoController@destroy',
		'as' => 'productos.destroy'
	]);

Route::resource('tipoinsumo','TipoInsumoController');

  Route::get('tipoinsumo/{id}/destroy', [
		'uses' => 'TipoInsumoController@destroy',
		'as' => 'tipoinsumo.destroy'
	]);
Route::resource('insumos','InsumoController');

  Route::get('insumos/{id}/destroy', [
		'uses' => 'InsumoController@destroy',
		'as' => 'insumos.destroy'
	]);	  	  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
