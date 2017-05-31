<?php

namespace App\Http\Controllers;

use App\Aluno;
use Redirect;
use Illuminate\Http\Request;

use App\Curso;

class AlunosController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
  $cursos = Curso::pluck('nomeCurso', 'id');
		
		return view('alunos.formulario', compact('cursos'));  

    /*return view('alunos.formulario');*/
  }

  public function store(Request $request){

    $alunos = new Aluno();

  /*Cria a discipina com todos os dados digitado no formualario.blade de alunos*/
  $alunos->create($request->all());

  \Session::flash('mensagem_sucesso', 'Aluno cadastrado com sucesso');
  
  
    //Redireciona para a pagina de formualario de alunos para caso o usuário
    //queira criar outro aluno, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('aluno/create');
  }


  public function recebePesquisa(Request $request){
    $name = $request->input('nomeAluno'); // This is better than using $_POST
    $aluno = new Aluno(); //  Adicionando Variavel do tipo Aluno
    $aluno = Aluno::where ('nomeAluno','LIKE',"%$name%")->get(); //Realiza a pesquisa do "tipo" LIKE na table nomeAluno, usando a variavel name
    return view('alunos.lista', ['alunos' => $aluno]);//retorna a view
   //return  Redirect::to('aluno/create');
  }


  public function show(){

  $alunos = Aluno::all();

//		$cursos = Curso::pluck('nomeCurso', 'id');
		
		//return view('alunos.formulario', compact('cursos'));  
  
$cursos = Curso::all();
  
    return view('alunos.lista', ['alunos' => $alunos], ['cursos' => $cursos]);  
  
//  return view('alunos.lista', ['alunos' => $alunos], compact('cursos'));

  }

  public function index(){

  $alunos = Aluno::all();

//  $cursos = Curso::pluck('nomeCurso', 'id');



  //return view('alunos.formulario', compact('cursos'));  

$cursos = Curso::all();
  
    return view('alunos.lista', ['alunos' => $alunos], ['cursos' => $cursos]);
  
//  return view('alunos.lista', ['alunos' => $alunos], compact('cursos'));
  
  //return view('alunos.lista', ['alunos' => $alunos]);

  }


  public function destroy($id){


    /*Função para achar o aluno com o id passado, se não achar a página da erro*/
    $alunos = Aluno::find($id);

    /*Deleta o aluno*/
    $alunos->delete();


    /*declara variavel mensagem_sucesso com a mensagem do alunos deletado com sucesso*/
    \Session::flash('mensagem_sucesso', 'Aluno deletado com sucesso!');

    /*redireciona o usuário para a pagina alunos.formulario (retornada no create deste controller*/
    return Redirect::to('aluno/lista');

  }

  public function edit($id){

    $alunos = Aluno::findOrFail($id);

	  $cursos = Curso::pluck('nomeCurso', 'id');
		
		return view('alunos.edicao', compact('cursos'), ['alunos' => $alunos]);  
	
    /*Recebe a id para editar o aluno e manda o usuário para a view formulario*/
/*    return view('alunos.formulario', ['alunos' => $alunos]);*/

  }

  //Função para editar o alunos
  public function update($id, Request $request){

    $alunos = Aluno::findOrFail($id);

    $alunos->update($request->all());

    \Session::flash('mensagem_sucesso', 'Aluno atualizado com sucesso!');

    return Redirect::to('aluno/lista');

  }
}
