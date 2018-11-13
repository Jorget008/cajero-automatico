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

Auth::routes(); //ruta login, ruta resgister


Route::post('registrarusuario', 'UsuarioController@store')->name('usuario');
Route::resource('usuarios', 'UsuarioController');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/cajero', 'CuentaController@index')->name('home');
    Route::post('retiro','CuentaController@miretiro')->name('retiro');
    Route::get('consulta/{tipocuenta}','CuentaController@misaldo')->name('saldo');
    Route::get('estracto','MovimientoController@estracto')->name('estracto');
    Route::get('/','MiController@micajero');

} );

