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


    //Redireciona para a pagina de formualario de curso para caso o usuário
    //queira criar outro curso, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('curso/create');
  }

  public function index(){
  $cursos = Curso::all();
  return view('cursos.lista')->withCursos($cursos);

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
