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

  public function show(){
	  
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

public function show(Request $request){
$request-
  $user =  DB::table('cursos')
                            ->where('nome','like','%%')
}


}
