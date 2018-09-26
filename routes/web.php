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
    return view('reservaonline.index');
});



route::group(['middleware' => ['auth','recepcion']],function(){

Route::resource('usuarioshabitaciones','UsuarioHabitacionController'); 

	
Route::get('usuarioshabitaciones/{id}/destroy', [
		'uses' => 'UsuarioHabitacionController@destroy',
		'as' => 'usuarioshabitaciones.destroy'
]);

Route::get('usuarioshabitaciones/{id}/ticket', [
		'uses' => 'UsuarioHabitacionController@ticket',
		'as' => 'usuarioshabitaciones.ticket'
]);


Route::resource('habitacionesinsumos','HabitacionInsumoController'); 


Route::resource('productosusuarios','ProductoUsuarioController');
	Route::get('productosusuarios/{id}/destroy', [
			'uses' => 'ProductoUsuarioController@destroy',
			'as' => 'productosusuarios.destroy'	
		]);

	Route::get('estado_compra/{id}', 'ProductoUsuarioController@cambiarEstadoCompra'); 


Route::resource('controlhorario','ControlHorarioController'); 

Route::get('controlhorario/{id}/destroy', [
		'uses' => 'ControlHorarioController@destroy',
		'as' => 'controlhorario.destroy'
	]);



});
Route::get('usuarioshabitaciones/consulta', 'UsuarioHabitacionController@consulta');
Route::post('usuarioshabitaciones/consulta', 'UsuarioHabitacionController@consultaPost');
Route::post('usuarioshabitaciones/consultareserva', 'UsuarioHabitacionController@consultaReserva');

route::group(['middleware' => ['auth','admin']],function(){


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

Route::resource('tiposervicio','TipoServicioController');

  Route::get('tiposervicio/{id}/destroy', [
		'uses' => 'TipoServicioController@destroy',
		'as' => 'tiposervicio.destroy'
	]);

  Route::resource('pagoservicio','PagoServicioController');

  Route::get('pagoservicio/{id}/destroy', [
		'uses' => 'PagoServicioController@destroy',
		'as' => 'pagoservicio.destroy'
	]);


Route::resource('proveedoresproductos','ProveedorProductoController');
	Route::get('proveedoresproductos/{id}/destroy', [
		'uses' => 'ProveedorProductoController@destroy',
		'as' => 'proveedoresproductos.destroy'
	]);

Route::resource('tarifas','TarifaController');


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

	Route::get('usersjornadas/modificar_horario/{id}/{start}/{end}', 'UserJornadaController@modificarHorario'); 
	Route::get('modificar_ajax/{id}/{id_user}/{id_jornada}/{fecha_entrada}/{color}', 'UserJornadaController@modificarAjax'); 
	

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


Route::get('grafico/reservas', 'GraficosController@reserva');   // index de gracifos pruebas
	Route::get('grafico/grafica_registros', 'GraficosController@registroReservaBarras');
	Route::get('grafico/grafica_anio', 'GraficosController@registroReservaLineas');
	


	Route::get('grafico/registro_compras_insumos', 'GraficosController@registroComprasInsumosBarras');
	Route::get('grafico/registro_compras_insumos_lineas', 'GraficosController@registroComprasInsumosLineas');
	

Route::get('grafico/compraproductos', 'GraficosController@compraProductos'); 
	Route::get('grafico/registro_compras_productos', 'GraficosController@registroComprasProductosBarras'); 
	Route::get('grafico/registro_compras_productos_lineas', 'GraficosController@registroCompraProductosLineas');

Route::get('grafico/ventaproductos', 'GraficosController@ventaProductos'); 
	Route::get('grafico/registro_ventas_productos', 'GraficosController@registroVentasProductosBarras'); 
	Route::get('grafico/registro_ventas_productos_lineas', 'GraficosController@registroVentasProductosLineas');
	Route::get('grafico/registro_ventas_insumos_lineas', 'GraficosController@registroVentasInsumosLineas');



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



/*fin middleware admin*/


});






	route::group(['middleware' => ['auth','cliente']],function(){

	Route::get('productosclientes/filtroproductos/{nombre}','ProductoClienteController@filtroProductos');
    Route::resource('productosclientes','ProductoClienteController');

});


Route::resource('habitaciones','HabitacionController');

Route::get('habitaciones/{id}/destroy', [
	'uses' => 'HabitacionController@destroy',
	'as' => 'habitaciones.destroy'
	]);

		

Route::resource('reservaonline','ReservaOnlineController');

	Route::get('reservaonline/consulta', 'ReservaOnlineController@consulta');
	Route::post('reservaonline/consulta', 'ReservaOnlineController@consultaPost');

	Route::get('/downloadPDF/{id}','ReservaOnlineController@downloadPDF');

	Route::post('reservaonline/consulta/enviar', 'ReservaOnlineController@pdfCorreoPost');

	Route::post('reservaonline/consulta/horas', 'ReservaOnlineController@horasPost');

	Route::get('/reservaonline/disponibles/{fecha}/{horas}', 'ReservaOnlineController@consultarHorasDisponibles');




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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
