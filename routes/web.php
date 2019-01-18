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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/fornecedores/mensalidades', 'FornecedorController@somarMensalidades')->name('fornecedores.somarMensalidades');

Route::resource('fornecedores', 'FornecedorController', ['only' => ['index', 'create', 'store', 'destroy', 'update', 'show']]);

Route::get('/fornecedores/{id}/edit', 'FornecedorController@edit')->name('fornecedores.edit')->middleware('checkUser');

Route::resource('empresa', 'EmpresaController', ['only' => ['index', 'create', 'store', 'destroy', 'update', 'show']]);

Route::get('/empresa/{id}/edit', 'EmpresaController@edit')->name('empresa.edit')->middleware('checkUser');

