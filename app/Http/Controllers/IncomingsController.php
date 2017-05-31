<?php

namespace App\Http\Controllers;

use App\Incoming;
use Redirect;
use Illuminate\Http\Request;

class incomingsController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('incomings.formulario');
  }

  public function store(Request $request){

    $incomings = new Incoming();

  /*Cria a incoming com todos os dados digitado no formualario.blade de alunos*/
  $incomings->create($request->all());

  \Session::flash('mensagem_sucesso', 'Conta cadastrada com sucesso');


    //Redireciona para a pagina de formualario de incomings para caso o usuário
    //queira criar outra incoming, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('incoming/create');
  }


  public function recebePesquisa(Request $request){
    $name = $request->input('nomeIntermediario'); // This is better than using $_POST
    $incoming = new Incoming(); //  Adicionando Variavel do tipo Aluno
    $incoming = Incoming::where ('nomeIntermediario','LIKE',"%$name%")->get(); //Realiza a pesquisa do "tipo" LIKE na table nomeAluno, usando a variavel name
    return view('incomings.lista', ['incomings' => $incoming]);//retorna a view
   //return  Redirect::to('aluno/create');
  }


  public function show(){

  $incomings = Incoming::all();

  return view('incomings.lista', ['incomings' => $incomings]);

  }

  public function index(){

  $incomings = Incoming::all();

  return view('incomings.lista', ['incomings' => $incomings]);

  }


  public function destroy($id){


    /*Função para achar o aluno com o id passado, se não achar a página da erro*/
    $incomings = Incoming::find($id);

    /*Deleta o aluno*/
    $incomings->delete();


    /*declara variavel mensagem_sucesso com a mensagem do alunos deletado com sucesso*/
    \Session::flash('mensagem_sucesso', 'Conta deletada com sucesso!');

    /*redireciona o usuário para a pagina alunos.formulario (retornada no create deste controller*/
    return Redirect::to('incoming/lista');

  }

  public function edit($id){

    $incomings = Incoming::findOrFail($id);

    /*Recebe a id para editar o aluno e manda o usuário para a view formulario*/
    return view('incomings.formulario', ['incomings' => $incomings]);

  }

  //Função para editar o alunos
  public function update($id, Request $request){

    $incomings = Incoming::findOrFail($id);

    $incomings->update($request->all());

    \Session::flash('mensagem_sucesso', 'Conta atualizada com sucesso!');

    return Redirect::to('incoming/lista');

  }
}
