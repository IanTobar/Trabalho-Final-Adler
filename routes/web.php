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

/*Rota para acessar a view da pagina inicial(resources\views)*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => 'web'], function(){

		/*Redireciona para a pagina inicial ser a de login. Irá acessar o HomeController (app\Http\Controllers)*/
		/*O metodo index, do arquivo HomeController.php, retornara a view home.blade.php (resources\views)*/
		Route::get('/', 'HomeController@index');

		/*Pega todas as rotas referente a autenticação (auth)*/
		Route::auth();

});

Route::resource('disciplina','DisciplinasController');
Route::resource('curso','CursosController');
Route::resource('funcionario','FuncionariosController');
Route::resource('aluno','AlunosController');
Route::resource('conta','ContasController');
Route::resource('incoming','IncomingsController');
Route::resource('estoque','EstoqueController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pesquisaCurso',[
    'as' => 'pesquisaCurso',
    'uses' => 'CursosController@recebePesquisa'
]);
Route::get('/pesquisaDisciplina',[
    'as' => 'pesquisaDisciplina',
    'uses' => 'DisciplinasController@recebePesquisa'
]);

Route::get('/pesquisaFuncionario',[
    'as' => 'pesquisaFuncionario',
    'uses' => 'FuncionariosController@recebePesquisa'
]);

Route::get('/pesquisaAluno',[
    'as' => 'pesquisaAluno',
    'uses' => 'AlunosController@recebePesquisa'
]);


Route::get('/relatorioGastos',[
    'as' => 'relatorioGastos',
    'uses' => 'RelatorioGastosController@index'
]);
Route::get('/relatorioGanhos',[
    'as' => 'relatorioGanhos',
    'uses' => 'RelatorioIncomingsController@index'
]);

Route::get('/relatorioComparativo',[
    'as' => 'relatorioComparativo',
    'uses' => 'RelatorioComparativoController@index'
]);


Route::get('/pesquisaConta',[
    'as' => 'pesquisaConta',
    'uses' => 'ContasController@recebePesquisa'
]);

Route::get('/pesquisaIncoming',[
    'as' => 'pesquisaIncoming',
    'uses' => 'IncomingsController@recebePesquisa'
]);

Route::get('/pesquisaEstoque',[
    'as' => 'pesquisaEstoque',
    'uses' => 'EstoqueController@recebePesquisa'
]);
