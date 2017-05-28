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

    //Redireciona para a pagina de formualario de curso para caso o usuário
    //queira criar outro curso, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to(disciplina/create);
  }
  public function index(){
  $disciplina = Disciplina::all();
  return view('disciplina.lista')->withDisciplinas($disciplina);

  }
public function show(String $nome){
  $nome = '%'.$nome.'%';
  $disciplina = new Disciplina();
  $disciplina =  DB::table('disciplinas')
                              ->where('nomeDisciplina','like',$nome);

    return view('disciplinas/lista',['disciplinas'=>$disciplina ]);
  }

}

}
