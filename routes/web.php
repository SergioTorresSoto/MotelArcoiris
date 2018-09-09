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

Route::resource('proveedores','ProveedorController'); 

	Route::get('proveedores/{id}/destroy', [
		'uses' => 'ProveedorController@destroy',
		'as' => 'proveedores.destroy'
	]);

Route::resource('proveedoresinsumos','ProveedorInsumoController'); 


	Route::get('proveedoresinsumos/{id}/destroy', [
		'uses' => 'ProveedorInsumoController@destroy',
		'as' => 'proveedoresinsumos.destroy'
	]);


Route::resource('usuarioshabitaciones','UsuarioHabitacionController'); 

	Route::get('usuarioshabitaciones/{id}/destroy', [
		'uses' => 'UsuarioHabitacionController@destroy',
		'as' => 'usuarioshabitaciones.destroy'
	]);

	Route::get('usuarioshabitaciones/{id}/ticket', [
		'uses' => 'UsuarioHabitacionController@ticket',
		'as' => 'usuarioshabitaciones.ticket'
	]);

	Route::get('usuarioshabitaciones/consulta', 'UsuarioHabitacionController@consulta');
	Route::post('usuarioshabitaciones/consulta', 'UsuarioHabitacionController@consultaPost');

Route::resource('habitacionesinsumos','HabitacionInsumoController'); 

Route::resource('proveedoresproductos','ProveedorProductoController');
	Route::get('proveedoresproductos/{id}/destroy', [
		'uses' => 'ProveedorProductoController@destroy',
		'as' => 'proveedoresproductos.destroy'
	]);

Route::resource('tarifas','TarifaController');



Route::resource('reservaonline','ReservaOnlineController');

	Route::get('reservaonline/consulta', 'ReservaOnlineController@consulta');
	Route::post('reservaonline/consulta', 'ReservaOnlineController@consultaPost');

	Route::get('/downloadPDF/{id}','ReservaOnlineController@downloadPDF');

	Route::post('reservaonline/consulta/enviar', 'ReservaOnlineController@pdfCorreoPost');

	Route::post('reservaonline/consulta/horas', 'ReservaOnlineController@horasPost');

Route::get('grafico/reservas', 'GraficosController@reserva');   // index de gracifos pruebas
	Route::get('grafico/grafica_registros/{anio}/{mes}', 'GraficosController@registros_mes');
	Route::get('grafico/grafica_anio/{anio}', 'GraficosController@registros_anio');
	Route::get('grafico/grafica_publicaciones/{anio}/{mes}', 'GraficosController@total_publicaciones');
	Route::get('grafico/grafica_publicaciones_anios/{anio}', 'GraficosController@total_publicaciones_anios');

Route::get('grafico/comprainsumos', 'GraficosController@compraInsumos'); 
	Route::get('grafico/grafico_compra_insumo_mensual/{anio}/{mes}', 'GraficosController@compraInsumosMensual');
	Route::get('grafico/grafico_numero_compras_mensual/{anio}/{mes}', 'GraficosController@numeroComprasMensual');
	Route::get('grafico/grafica_compra_insumos_anual/{anio}', 'GraficosController@compraInsumosAnual');
	Route::get('grafico/grafica_numero_compras_anual/{anio}', 'GraficosController@numeroComprasAnual');

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

route::resource('tipohabitacion','TipoHabitacionController');

Route::get('tipohabitacion/{id}/destroy', [
		'uses' => 'TipoHabitacionController@destroy',
		'as' => 'tipohabitacion.destroy'
	]);

 Route::resource('estadohabitacion','EstadoHabitacionController');

 Route::get('estadohabitacion/{id}/destroy', [
		'uses' => 'EstadoHabitacionController@destroy',
		'as' => 'estadohabitacion.destroy'
	]);

Route::resource('habitaciones','HabitacionController');

Route::get('habitaciones/{id}/destroy', [
	'uses' => 'HabitacionController@destroy',
	'as' => 'habitaciones.destroy'
	]);

// Paypal
	// Enviamos nuestro pedido a PayPal
	Route::get('payment', array(
		'as' => 'payment',
		'uses' => 'PaypalController@postPayment',
	));
	// Después de realizar el pago Paypal redirecciona a esta ruta
	Route::get('payment/status', array(
		'as' => 'payment.status',
		'uses' => 'PaypalController@getPaymentStatus',
	));


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
