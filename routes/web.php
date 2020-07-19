<?php

use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware' => ['cors'],
], function ($router) {
    Route::get('/', 'CustomerController@index')->name('index');
    Route::get('/novo', 'CustomerController@create');
    Route::post('/', 'CustomerController@store');
    Route::get('/{id}/visualizar', 'CustomerController@show');
    Route::get('/{id}/editar', 'CustomerController@edit');
    Route::put('/{id}', 'CustomerController@update');
    Route::delete('/{id}', 'CustomerController@destroy');
});
