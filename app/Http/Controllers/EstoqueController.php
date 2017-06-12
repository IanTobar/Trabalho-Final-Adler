<?php

namespace App\Http\Controllers;

use App\Estoque;

use Redirect;

use Illuminate\Http\Request;

class EstoqueController extends Controller
{
  public function create(){
    //Retorna a view referente ao formulario
    return view('estoques.formulario');
  }

  public function store(Request $request){

    $estoques = new Estoque();

  /*Cria a discipina com todos os dados digitado no formualario.blade de estoque*/
  $estoques->create($request->all());

  \Session::flash('mensagem_sucesso', 'Produto cadastrado com sucesso');


    //Redireciona para a pagina de formualario de estoque para caso o usuário
    //queira criar outro estoque, nela deve haver um botão retorno para caso o
    //usuário queira voltar para uma certa pagina
    return redirect::to('estoque/create');
  }


  public function recebePesquisa(Request $request){
    $name = $request->input('nomeProduto'); // This is better than using $_POST
    $estoque = new Estoque(); //  Adicionando Variavel do tipo estoque
    $estoque = Estoque::where ('nomeProduto','LIKE',"%$name%")->get(); //Realiza a pesquisa do "tipo" LIKE na table nomeestoque, usando a variavel name
    return view('estoques.lista', ['estoques' => $estoque]);//retorna a view
   //return  Redirect::to('estoque/create');
  }


  public function show(){

    $estoques = Estoque::all();
    $acabando = array();
    $acabaram = array();
    $acabaramB = false;
    $acabandoB = false;

    foreach ($estoques as $estoque) {
      if ($estoque->quantidade <= 0) {
        $acabaram["$estoque->nomeProduto"][0] = $estoque->minimo;
        $acabaramB = true;
      }
      else if (($estoque->quantidade)/2 <= $estoque->minimo) {
        $acabando["$estoque->nomeProduto"][0] = $estoque->quantidade;
        $acabando["$estoque->nomeProduto"][1] = $estoque->minimo;
        $acabandoB = true;
      }
    }
    return view('estoques.lista', [
      'estoques' => $estoques,
      'acabando' => $acabando,
      'acabandoB' => $acabandoB,
      'acabaramB' => $acabaramB,
      'acabaram' => $acabaram
      ]);
  }

  public function index(){

  $estoques = Estoque::all();
  $acabando = array();
  $acabaram = array();

  foreach ($estoques as $estoque) {
    if (true) {
      $acabaram["$quantidade->nomeProduto"][0] = $quantidade->minimo;
      $acabouSim = true;
    }
    else if (($estoque->quantidade)/2 <= $estoque->minimo) {
      $acabando["$estoque->nomeProduto"][0] = $estoque->quantidade;
      $acabando["$estoque->nomeProduto"][1] = $estoque->minimo;
    }
  }
  return view('estoques.lista', [
    'estoques' => $estoques,
    'acabando' => $acabando,
    'acabouSim' => $acabouSim,
    'acabaram' => $acabaram
    ]);
}


  public function destroy($id){


    /*Função para achar o cliente com o id passado, se não achar a página da erro*/
    $estoques = Estoque::find($id);

    /*Deleta o cliente*/
    $estoques->delete();


    /*declara variavel mensagem_sucesso com a mensagem do Cuso deletado com sucesso*/
    \Session::flash('mensagem_sucesso', 'Produto deletado com sucesso!');

    /*redireciona o usuário para a pagina estoques.formulario (retornada no create deste controller*/
    return Redirect::to('estoque/lista');

  }

  /*Função para editar estoque
  Recebe a id do estoque a ser editado*/
  public function edit($id){

    $estoques = Estoque::findOrFail($id);

    /*Recebe a id para editar o estoque e manda o estoque para a view formulario*/
    return view('estoques.edicao', ['estoques' => $estoques]);

  }

  //Função para editar o estoque
  public function update($id, Request $request){

    $estoques = Estoque::findOrFail($id);


    $estoques->update($request->all());

    \Session::flash('mensagem_sucesso', 'Produto atualizado com sucesso!');

    return Redirect::to('estoque/lista');

  }
}
