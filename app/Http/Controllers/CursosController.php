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

  }

  public function show(String $nome){
  $nome = '%'.$nome.'%';
  $curso = new Curso();
  $curso =  DB::table('cursos')
                              ->where('nomeCurso','like',$nome);

    return view('cursos/lista',['cursos'=>$curso ]);
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
