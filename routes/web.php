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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin']],function ()
{
  //Tipos de servicio
  Route::get('/TiposServicios', 'TipSerController@index');
  Route::post('/TipoServicio/agregar', 'TipSerController@store');
  Route::post('/TipoServicio/actualizar/{id}', 'TipSerController@update');
  Route::get('/TipoServicio/mostrar/{id}', 'TipSerController@show');
  Route::get('/TipoServicio/eliminar/{id}', 'TipSerController@destroy');

  //Tarifas
  Route::get('/Tarifas', 'TarifaController@index');
  Route::post('/Tarifa/agregar', 'TarifaController@store');
  Route::post('/Tarifa/actualizar/{id}', 'TarifaController@update');
  Route::get('/Tarifa/mostrar/{id}', 'TarifaController@show');
  Route::get('/TarifaCliente/mostrar/{cliente}/{tipo}', 'TarifaController@showTipo');
  Route::get('/Tarifa/eliminar/{id}', 'TarifaController@destroy');

  //Clientes
  Route::get('Clientes', 'ClienteController@index');
  Route::post('Cliente/agregar', 'ClienteController@store');
  Route::post('Cliente/actualizar/{id}', 'ClienteController@update');
  Route::get('Cliente/mostrar/{id}', 'ClienteController@show');
  Route::get('Cliente/eliminar/{id}', 'ClienteController@destroy');

  //Localidades
  Route::get('Localidades','LocalidadController@index');
  Route::post('Localidad/agregar','LocalidadController@store');
  Route::post('Localidad/actualizar/{id}', 'LocalidadController@update');
  Route::get('Localidad/mostrar/{id}', 'LocalidadController@show');

  Route::get('Localidad/eliminar/{id}', 'LocalidadController@destroy');

  //TipoUnidad
  Route::get('TipoUnidades','TipoUnidadController@index');
  Route::post('TipoUnidad/agregar','TipoUnidadController@store');
  Route::post('TipoUnidad/actualizar/{id}', 'TipoUnidadController@update');
  Route::get('TipoUnidad/mostrar/{id}', 'TipoUnidadController@show');
  Route::get('TipoUnidad/mostrar/tipo/{idCliente}', 'TipoUnidadController@showCliente');
  Route::get('TipoUnidad/mostrar/capacidad/{capacidad}','TipoUnidadController@showCapacidad');
  Route::get('TipoUnidad/eliminar/{id}', 'TipoUnidadController@destroy');

  //TipoUnidad
  Route::get('Unidades','UnidadController@index');
  Route::post('Unidad/agregar','UnidadController@store');
  Route::post('Unidad/actualizar/{id}', 'UnidadController@update');
  Route::get('Unidad/mostrar/{id}', 'UnidadController@show');
  Route::get('Unidad/mostrar/tipo/{idTipo}', 'UnidadController@showTipo');
  Route::get('Unidad/eliminar/{id}', 'UnidadController@destroy');

  //Clase
  Route::get('Clases','ClaseController@index');
  Route::post('Clase/agregar','ClaseController@store');
  Route::post('Clase/actualizar/{id}', 'ClaseController@update');
  Route::get('Clase/mostrar/{id}', 'ClaseController@show');
  Route::get('Clase/eliminar/{id}', 'ClaseController@destroy');

  //Transportista
  Route::get('Transportistas','TransportistaController@index');
  Route::post('Transportista/agregar','TransportistaController@store');
  Route::post('Transportista/actualizar/{id}', 'TransportistaController@update');
  Route::get('Transportista/mostrar/{id}', 'TransportistaController@show');
  Route::get('Transportista/eliminar/{id}', 'TransportistaController@destroy');


  //Operador
  Route::get('Operadores','OperadorController@index');
  Route::post('Operador/agregar','OperadorController@store');
  Route::post('Operador/actualizar/{id}', 'OperadorController@update');
  Route::get('Operador/mostrar/{id}', 'OperadorController@show');
  Route::get('Operador/eliminar/{id}', 'OperadorController@destroy');

  //Finanzas
  Route::get('Finanzas','FinanzaController@index');
  Route::post('Finanza/agregar','FinanzaController@store');
  Route::post('Finanza/actualizar/{id}', 'FinanzaController@update');
  Route::get('Finanza/mostrar/{id}', 'FinanzaController@show');
  Route::get('Finanza/eliminar/{id}', 'FinanzaController@destroy');

  //Adicionales
  Route::get('Adicionales','AdicionalController@index');
  Route::post('Adicional/agregar','AdicionalController@store');
  Route::post('Adicional/actualizar/{id}', 'AdicionalController@update');
  Route::get('Adicional/mostrar/{id}', 'AdicionalController@show');
  Route::get('Adicional/eliminar/{id}', 'AdicionalController@destroy');

  //Evidencias PENDIENTE
  Route::get('Evidencias','EvidenciaController@index');
  Route::post('Evidencia/agregar','EvidenciaController@store');
  Route::post('Evidencia/actualizar/{id}', 'EvidenciaController@update');
  Route::get('Evidencia/mostrar/{id}', 'EvidenciaController@show');
  Route::get('Evidencia/mostrar/archivo/{id}', 'EvidenciaController@file');
  Route::get('Evidencia/eliminar/{id}', 'EvidenciaController@destroy');

  //FasesMovimientos
  Route::get('FasesMovimientos','FaseMovimientoController@index');
  Route::post('FaseMovimiento/agregar','FaseMovimientoController@store');
  Route::post('FaseMovimiento/actualizar/{id}', 'FaseMovimientoController@update');
  Route::get('FaseMovimiento/mostrar/{id}', 'FaseMovimientoController@show');
  Route::get('FaseMovimiento/eliminar/{id}', 'FaseMovimientoController@destroy');

  //Movimientos
  Route::get('Movimientos','MovimientoController@index');
  Route::post('Movimiento/agregar','MovimientoController@store');
  Route::get('Movimiento/crear','MovimientoController@create');
  Route::post('Movimiento/actualizar/{id}', 'MovimientoController@update');
  Route::get('Movimiento/mostrar/{id}', 'MovimientoController@show');
  Route::get('Movimiento/eliminar/{id}', 'MovimientoController@destroy');

  //Unidades, Operadores, Transportistas
  Route::get('UniOpeTra','UniOpeTraController@index');
  Route::post('UniOpeTra/actualizar/{id}', 'UniOpeTraController@update');
  Route::get('UniOpeTra/mostrar/{id}', 'UniOpeTraController@show');
  Route::get('UniOpeTra/eliminar/{id}', 'UniOpeTraController@destroy');

  //Usuarios
  Route::get('Usuarios','RolesUsuarioController@index');
  Route::post('Usuario/agregar','RolesUsuarioController@store');
  Route::post('Usuario/actualizar/{id}', 'RolesUsuarioController@update');
  Route::get('Usuario/mostrar/{id}', 'RolesUsuarioController@show');
  Route::get('Usuario/eliminar/{id}', 'RolesUsuarioController@destroy');

  //Facturas cuentas por pagar
  Route::get('FacturasCxp','FacturaCxpController@index');
  Route::post('FacturaCxp/agregar','FacturaCxpController@store');
  Route::post('FacturaCxp/actualizar/{id}', 'FacturaCxpController@update');
  Route::get('FacturaCxp/mostrar/{id}', 'FacturaCxpController@show');
  Route::get('FacturaCxp/eliminar/{id}', 'FacturaCxpController@destroy');

  //Traer importe del movimiento
  Route::get('Movimiento/importe/{id}', 'MovimientoController@getImporte');

  //Pagos cuentas por pagar
  Route::get('PagosCxp','PagoCxpController@index');
  Route::post('PagoCxp/agregar','PagoCxpController@store');
  Route::post('PagoCxp/actualizar/{id}', 'PagoCxpController@update');
  Route::get('PagoCxp/mostrar/{id}', 'PagoCxpController@show');
  Route::get('PagoCxp/eliminar/{id}', 'PagoCxpController@destroy');

  //Facturas cuentas por pagar
  Route::get('FacturasCxc','FacturaCxcController@index');
  Route::get('FacturaCxc/excel','FacturaCxcController@excel');
  Route::post('FacturaCxc/agregar','FacturaCxcController@store');
  Route::post('FacturaCxc/actualizar/{id}', 'FacturaCxcController@update');
  Route::get('FacturaCxc/mostrar/{id}', 'FacturaCxcController@show');
  Route::get('FacturaCxc/eliminar/{id}', 'FacturaCxcController@destroy');

  //Pagos cuentas por pagar
  Route::get('PagosCxc','PagoCxcController@index');
  Route::get('FacturaCxp/excel','FacturaCxpController@excel');
  Route::post('PagoCxc/agregar','PagoCxcController@store');
  Route::post('PagoCxc/actualizar/{id}', 'PagoCxcController@update');
  Route::get('PagoCxc/mostrar/{id}', 'PagoCxcController@show');
  Route::get('PagoCxc/eliminar/{id}', 'PagoCxcController@destroy');
});

//Todos tienen acceso a esta url
Route::get('Evento/buscar','EventoController@buscar');


//Usuario CAPTURADOR
Route::group(['middleware' => ['capturador']],function(){
//Eventos
Route::post('Evento/agregar','EventoController@guardar');
Route::get('Eventos/minigrip/{id}','EventoController@indexMinigrip');
Route::get('Eventos/localidad/{id}','EventoController@indexLocalidad');
Route::post('Evento/actualizar/{id}', 'EventoController@update');
Route::get('Evento/mostrar/{id}', 'EventoController@show');
Route::get('Evento/eliminar/{id}', 'EventoController@destroy');
Route::get('Localidades/mostrar/{id}', 'LocalidadController@showLocalidades');

//Agregar evidencias
Route::get('Evidencias','EvidenciaController@index');
Route::post('Evidencia/agregar','EvidenciaController@store');

});
