<?php

namespace App\Http\Controllers;

use App\Conta;
use Redirect;
use Illuminate\Http\Request;

class ContasController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('contas.formulario');
  }

  public function store(Request $request){

    $contas = new Conta();

  /*Cria a conta com todos os dados digitado no formualario.blade de alunos*/
  $contas->create($request->all());

  \Session::flash('mensagem_sucesso', 'Conta cadastrada com sucesso');


    //Redireciona para a pagina de formualario de contas para caso o usuário
    //queira criar outra conta, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('conta/create');
  }


  public function recebePesquisa(Request $request){
    $name = $request->input('nomeBeneficiario'); // This is better than using $_POST
    $conta = new Conta(); //  Adicionando Variavel do tipo Aluno
    $conta = Conta::where ('nomeBeneficiario','LIKE',"%$name%")->get(); //Realiza a pesquisa do "tipo" LIKE na table nomeAluno, usando a variavel name
    return view('contas.lista', ['contas' => $conta]);//retorna a view
   //return  Redirect::to('aluno/create');
  }


  public function show(){

  $contas = Conta::all();

  return view('contas.lista', ['contas' => $contas]);

  }

  public function index(){

  $contas = Conta::all();

  return view('contas.lista', ['contas' => $contas]);

  }


  public function destroy($id){


    /*Função para achar o aluno com o id passado, se não achar a página da erro*/
    $contas = Conta::find($id);

    /*Deleta o aluno*/
    $contas->delete();


    /*declara variavel mensagem_sucesso com a mensagem do alunos deletado com sucesso*/
    \Session::flash('mensagem_sucesso', 'Conta deletada com sucesso!');

    /*redireciona o usuário para a pagina alunos.formulario (retornada no create deste controller*/
    return Redirect::to('conta/lista');

  }

  public function edit($id){

    $contas = Conta::findOrFail($id);

    /*Recebe a id para editar o aluno e manda o usuário para a view formulario*/
    return view('contas.formulario', ['contas' => $contas]);

  }

  //Função para editar o alunos
  public function update($id, Request $request){

    $contas = Conta::findOrFail($id);

    $contas->update($request->all());

    \Session::flash('mensagem_sucesso', 'Conta atualizada com sucesso!');

    return Redirect::to('conta/lista');

  }
}
