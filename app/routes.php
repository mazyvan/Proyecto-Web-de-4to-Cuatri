<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/clientes', 'ClienteController@index');
Route::get('/libros', 'ProductoController@index');
Route::get('/', 'RentaController@index');

Route::get('clientes/create', 'ClienteController@create');
Route::get('libros/create', 'ProductoController@create');
Route::get('rentas/create', 'RentaController@create');

Route::post('clientes/create', 'ClienteController@store');
Route::post('libros/create', 'ProductoController@store');
Route::post('rentas/create', 'RentaController@store');

Route::get('/clientes/destroy/{id}', 'ClienteController@destroy');
Route::get('/libros/destroy/{id}', 'ProductoController@destroy');
Route::get('/rentas/destroy/{id}', 'RentaController@destroy');

Route::get('clientes/edit/{id}','ClienteController@edit');
Route::get('libros/edit/{id}','ProductoController@edit');
Route::get('rentas/edit/{id}','RentaController@edit');

Route::post('clientes/edit/{id}', 'ClienteController@update');
Route::post('libros/edit/{id}', 'ProductoController@update');
Route::post('rentas/edit/{id}', 'RentaController@update');

Route::post('/{id}', 'RentaController@finalizar');

Route::get('/clientes/{search}', 'ClienteController@search');
Route::get('/libros/{search}', 'ProductoController@search');
Route::get('/{search}', 'RentaController@search');
