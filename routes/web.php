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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Pessoas
Route::get('/pessoas/novo','PersonController@create');
Route::post('/pessoas/novo','PersonController@store');
Route::post('/pessoas/update/{id}','PersonController@update');
Route::get('/pessoas', 'PersonController@index')->name('persons-list');
Route::get('/pessoa/deletar/{id}', 'PersonController@destroy');
Route::get('/pessoa/editar/{id}', 'PersonController@edit');

// Equipamentos
Route::get('/equipamentos/novo','EquipmentController@create');
Route::post('/equipamentos/novo','EquipmentController@store');
Route::post('/equipamentos/update/{id}','EquipmentController@update');
Route::get('/equipamentos', 'EquipmentController@index')->name('equipment-list');
Route::get('/equipamentos/deletar/{id}', 'EquipmentController@destroy');
Route::get('/equipamentos/editar/{id}', 'EquipmentController@edit');
