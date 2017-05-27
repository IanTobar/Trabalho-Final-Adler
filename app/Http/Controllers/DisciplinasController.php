<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplinasController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('disciplinas.formulario');
  }

  public function store(Request $request){
    $disciplina = new Disciplina();
    $disciplinas->create($request->all());

    //Mensagem de aviso: curso cadastrado
    //\Session::flash('mensagem_sucesso_curso','Curso cadastrado com sucesso');

    //Redireciona para a pagina de formualario de curso para caso o usuário
    //queira criar outro curso, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect->back();
  }
}
