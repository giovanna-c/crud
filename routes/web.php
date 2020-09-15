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

Route::get('/', function () {
    return view('index');
});

Route::get('/pessoa', function () {
    return view('index');
});

Route::get('/pessoa/cadastrar', 'PessoaController@create')->name('cadastrar');
Route::get('/pessoa/consultar', 'PessoaController@index')->name('consultar');
Route::post('/pessoa/store/', 'PessoaController@store')->name('pessoa.store');
Route::get('/pessoa/apagar/{id_pessoa}', 'PessoaController@destroy')->name('apagar');
Route::post('/pessoa/atualizar/{id_pessoa}', 'PessoaController@update')->name('atualizar');
Route::get('/pessoa/editar/{id_pessoa}', 'PessoaController@edit')->name('editar');

Route::resource('pessoa', 'PessoaController');

