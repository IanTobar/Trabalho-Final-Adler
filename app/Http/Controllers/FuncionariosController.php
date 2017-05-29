<?php

namespace App\Http\Controllers;

use App\Funcionario;

use Redirect;

use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('funcionarios.formulario');
  }

  public function store(Request $request){

    $funcionarios = new Funcionario();

	/*Cria a discipina com todos os dados digitado no formualario.blade de funcionario*/
	$funcionarios->create($request->all());

	\Session::flash('mensagem_sucesso', 'Funcionario cadastrado com sucesso');


    //Redireciona para a pagina de formualario de curso para caso o usuário
    //queira criar outro curso, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('funcionario/create');
  }


  public function recebePesquisa(Request $request){
    $name = $request->input('nomeFuncionario'); // This is better than using $_POST
    $funcionario = new Funcionario(); //  Adicionando Variavel do tipo Curso
    $funcionario = Funcionario::where ('nomeFuncionario','LIKE',"%$name%")->get(); //Realiza a pesquisa do "tipo" LIKE na table nomeCurso, usando a variavel name
    return view('funcionarios.lista', ['funcionarios' => $funcionario]);//retorna a view
   //return  Redirect::to('funcionario/create');
  }


  public function show(){

	$funcionarios = Funcionario::all();

	return view('funcionarios.lista', ['funcionarios' => $funcionarios]);

  }

  public function index(){

	$funcionarios = Funcionario::all();

	return view('funcionarios.lista', ['funcionarios' => $funcionarios]);

  }


	public function destroy($id){


		/*Função para achar o cliente com o id passado, se não achar a página da erro*/
		$funcionarios = Funcionario::find($id);

		/*Deleta o cliente*/
		$funcionarios->delete();


		/*declara variavel mensagem_sucesso com a mensagem do Cuso deletado com sucesso*/
		\Session::flash('mensagem_sucesso', 'Funcionario deletado com sucesso!');

		/*redireciona o usuário para a pagina funcionarios.formulario (retornada no create deste controller*/
		return Redirect::to('funcionario/lista');

	}

	/*Função para editar funcionario
	Recebe a id do funcionario a ser editado*/
	public function edit($id){

		$funcionarios = Funcionario::findOrFail($id);

		/*Recebe a id para editar o curso e manda o curso para a view formulario*/
		return view('funcionarios.edicao', ['funcionarios' => $funcionarios]);

	}

	//Função para editar o funcionario
	public function update($id, Request $request){

		$funcionarios = Funcionario::findOrFail($id);


		$funcionarios->update($request->all());

		\Session::flash('mensagem_sucesso', 'Funcionario atualizada com sucesso!');

		return Redirect::to('funcionario/lista');

	}

}
