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

Route::get('/clientes', 'ClienteController@index')->before('auth.basic');
Route::get('/libros', 'ProductoController@index')->before('auth.basic');
Route::get('/', 'RentaController@index')->before('auth.basic');

Route::get('clientes/create', 'ClienteController@create')->before('auth.basic');
Route::get('libros/create', 'ProductoController@create')->before('auth.basic');
Route::get('rentas/create', 'RentaController@create')->before('auth.basic');

Route::post('clientes/create', 'ClienteController@store')->before('auth.basic');
Route::post('libros/create', 'ProductoController@store')->before('auth.basic');
Route::post('rentas/create', 'RentaController@store')->before('auth.basic');

Route::get('/clientes/destroy/{id}', 'ClienteController@destroy')->before('auth.basic');
Route::get('/libros/destroy/{id}', 'ProductoController@destroy')->before('auth.basic');
Route::get('/rentas/destroy/{id}', 'RentaController@destroy')->before('auth.basic');

Route::get('clientes/edit/{id}','ClienteController@edit')->before('auth.basic');
Route::get('libros/edit/{id}','ProductoController@edit')->before('auth.basic');
Route::get('rentas/edit/{id}','RentaController@edit')->before('auth.basic');

Route::post('clientes/edit/{id}', 'ClienteController@update')->before('auth.basic');
Route::post('libros/edit/{id}', 'ProductoController@update')->before('auth.basic');
Route::post('rentas/edit/{id}', 'RentaController@update')->before('auth.basic');

Route::post('/{id}', 'RentaController@finalizar')->before('auth.basic');

Route::get('/clientes/{search}', 'ClienteController@search')->before('auth.basic');
Route::get('/libros/{search}', 'ProductoController@search')->before('auth.basic');
Route::get('/{search}', 'RentaController@search')->before('auth.basic');



Route::get('users/create', 'UserController@create');
Route::post('users/create', 'UserController@store');

Route::get('/logout', function() {
    return Redirect::to(preg_replace("/:\/\//", "://log-me-out:fake-pwd@", url('/logout')));
});