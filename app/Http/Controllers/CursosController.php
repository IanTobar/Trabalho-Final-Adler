<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use Redirect;
class CursosController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('cursos.formulario');
  }

  public function store(Request $request){

    $curso = new Curso();
      $curso->create($request->all());

    /*Cria uma Session para imprimir a mensagem de que o curso foi cadastrado com sucesso*/
    /*cria a variavel mensagem_sucesso com o valor Curso cadastrado com sucesso*/
    /*Esta variavel será configurada no formualario formulario.blade.php*/
    \Session::flash('mensagem_sucesso', 'Curso cadastrado com sucesso');

    return Redirect::to('curso/create');

  }

  public function show(){

	  $cursos = Curso::get();

	  return view('cursos.lista', ['cursos' => $cursos]);

  }

  public function index(){


	$cursos = Curso::all();

	return view('cursos/lista', ['cursos' => $cursos]);

/*
	return view('cursos.lista')->withCursos($cursos);
*/
  }

  //Função para excluir um curso
  //Receberá a id do curso que será excluído
  public function destroy($id){


		$cliente = Cliente::findOrFail($id);

		$cliente->delete();

		\Session::flash('mensagem_sucesso', 'Curso deletado com sucesso!');

		return Redirect::to(curso/create);

  }



}
