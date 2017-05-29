<?php

namespace App\Http\Controllers;

use App\Disciplina;

use Redirect;

use Illuminate\Http\Request;

class DisciplinasController extends Controller
{

  public function create(){
    //Retorna a view referente ao formulario
    return view('disciplinas.formulario');
  }

  public function store(Request $request){

    $disciplinas = new Disciplina();

	/*Cria a discipina com todos os dados digitado no formualario.blade de discipina*/
	$disciplinas->create($request->all());

	\Session::flash('mensagem_sucesso', 'Disciplina cadastrada com sucesso');


    //Redireciona para a pagina de formualario de curso para caso o usuário
    //queira criar outro curso, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('disciplina/create');
  }
  public function recebePesquisa(Request $request){
    $name = $request->input('nomeDisciplina'); // This is better than using $_POST
    $disciplina = new Disciplina(); //  Adicionando Variavel do tipo disciplina
    $disciplina = Disciplina::where ('nomeDisciplina','LIKE',"%$name%")->get(); //Realiza a pesquisa do "tipo" LIKE na table nomeDisciplina, usando a variavel name
    return view('disciplina.lista', ['disciplinas' => $disciplina]);//retorna a view
   //return  Redirect::to('curso/create');
  }
  public function show(){

	$discipinas = Disciplina::all();

	return view('disciplinas.lista', ['disciplinas' => $discipinas]);

  }

  public function index(){

	$discipinas = Disciplina::all();

	return view('discipinas.lista', ['disciplinas' => $discipinas]);

  }


	public function destroy($id){


		/*Função para achar o cliente com o id passado, se não achar a página da erro*/
		$discipinas = Disciplina::find($id);

		/*Deleta o cliente*/
		$discipinas->delete();


		/*declara variavel mensagem_sucesso com a mensagem do Cuso deletado com sucesso*/
		\Session::flash('mensagem_sucesso', 'Curso deletado com sucesso!');

		/*redireciona o usuário para a pagina discipinas.formulario (retornada no create deste controller*/
		return Redirect::to('disciplina/lista');

	}

	public function edit($id){

		$disciplinas = Disciplina::findOrFail($id);

		/*Recebe a id para editar o curso e manda o curso para a view formulario*/
		return view('disciplinas.formulario', ['disciplinas' => $disciplinas]);

	}

	//Função para editar o disciplina
	public function update($id, Request $request){

		$disciplinas = Disciplina::findOrFail($id);

		$disciplinas->update($request->all());

		\Session::flash('mensagem_sucesso', 'Disciplina atualizada com sucesso!');

		return Redirect::to('disciplina/lista');

	}

}
