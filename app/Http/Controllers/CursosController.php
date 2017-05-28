<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('cursos.formulario');
  }

  public function store(Request $request){
    $curso = new Curso();
    $cursos->create($request->all());

<<<<<<< HEAD
=======

>>>>>>> ExibirCursoEDisciplina
    //Redireciona para a pagina de formualario de curso para caso o usuário
    //queira criar outro curso, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to(curso/create);
  }
<<<<<<< Updated upstream
  public function index(){
  $curso = Curso::all();
  return view('curso.lista')->withCursos($curso);

  }
=======
  
  //Função para excluir um curso
  //Receberá a id do curso que será excluído
  public function destroy($id){
	  
	  
		$cliente = Cliente::findOrFail($id);
		
		$cliente->delete();
		
		\Session::flash('mensagem_sucesso', 'Curso deletado com sucesso!');
		
		return Redirect::to(curso/create);		  
	  
  }  	
		
	
		
  
>>>>>>> Stashed changes
}
