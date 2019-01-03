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

//Tipos de servicio
Route::get('/TiposServicios', 'TipSerController@index');
Route::post('/TipoServicio/agregar', 'TipSerController@store');
Route::post('/TipoServicio/actualizar/{id}', 'TipSerController@update');
Route::get('/TipoServicio/mostrar/{id}', 'TipSerController@show');
Route::get('/TipoServicio/eliminar/{id}', 'TipSerController@destroy');

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
Route::get('TipoUnidad/eliminar/{id}', 'TipoUnidadController@destroy');


//TipoUnidad
Route::get('Unidades','UnidadController@index');
Route::post('Unidad/agregar','UnidadController@store');
Route::post('Unidad/actualizar/{id}', 'UnidadController@update');
Route::get('Unidad/mostrar/{id}', 'UnidadController@show');
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
