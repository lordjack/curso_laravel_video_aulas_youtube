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

Route::get('/aluno_', function () {
    return view('main');
});

Route::get('/aluno','AlunoController@listar');

Route::get('/cliente','ClienteController@listar');
Route::get('/cliente/cadastrar','ClienteController@cadastrar');//chamar view clienteCadastrar
Route::post('/cliente/salvar/{id}','ClienteController@salvar');//chama metodo salvar o cliente
Route::get('/cliente/editar/{id}','ClienteController@editar');//editar cliente
Route::get('/cliente/deletar/{id}','ClienteController@deletar');//deletar cliente
Route::post('/cliente/pesquisar','ClienteController@pesquisar');

