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
Route::get('/Clientes', 'ClienteController@index');
Route::post('/Cliente/agregar', 'ClienteController@store');
Route::post('/Cliente/actualizar/{id}', 'ClienteController@update');
Route::get('/Cliente/mostrar/{id}', 'ClienteController@show');
Route::get('/Cliente/eliminar/{id}', 'ClienteController@destroy');
