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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pesquisa',[
    'as' => 'pesquisa',
    'uses' => 'CursosController@recebePesquisa'
]);
