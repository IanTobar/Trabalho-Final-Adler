@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <table class = "pull-right">
                    <tr>
                      <td>
                  <a class= "pull-right btn btn-primary animatedLong delay2 fadeIn"   href = "{{url('estoque/create')}}" >Novo Produto</a>
                </td>
                <tr>
                <td>

                  <p style = "margin-top: 10px"> <a class= "pull-right btn btn-primary animatedLong delay1 fadeIn"   href = "{{url('estoque/show')}}" >Listar Todos</a> </p>
                </td>
              </tr>
              </tr>
</table>


					<h1 class="animatedLong fadeIn"> Produtos </h1>
<div class="animatedLong delay15 fadeIn">          <form action = "{{route('pesquisaEstoque')}}" method="GET"> <!-- FORMULÁRIO DE PESQUISA -->
            <input name ='nomeProduto' type="text">
            <input type="submit" value ="Pesquisar" class ="btn btn-primary">
        </form>
      </div>
				</div>

                <div class="panel-body animatedLong delay1 fadeIn">
					<!-- A variavel mensagem_sucesso foi criada no controller estoquesController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

          	@if ($acabandoB)
          	  <div class = "alert alert-warning animatedLong fadeInDown">
<h3> Os seguintes Produtos estão acabando: </h3>
@foreach ($acabando as $key => $value)
  <p> <b> {{$key}} <b> :{{$value[0]}}/{{$value[1]}} </p>
@endforeach

              </div>
          	@endif


                      	@if ($acabaramB)
                      	  <div class = "alert alert-danger animatedLong fadeInDown">
            <h3> Os seguintes Produtos ACABARAM: </h3>
            @foreach ($acabaram as $key => $value)
              <p> <b> {{$key}} <b> : 0/{{$value[0]}} </p>
            @endforeach

                          </div>
                      	@endif



                  @foreach($estoques as $estoque)
              <h2>{{ $estoque->nomeProduto }}</h2>
              <p> <b> Descrição:  </b> {{ $estoque->descricao}}. </p>
              <p> <b> Quantidade Atual:  </b>{{ $estoque->quantidade}} unidades. </p>
              <p> <b> Quantidade Minima: </b> {{ $estoque->minimo}} unidades. </p>
              <p> <b> Data de Entrada:  </b>{{ $estoque->dataEntrada}}.</p>
              <p>

				<table>
                  <tr>

					<td>

						<a href="{{ route('estoque.edit', $estoque->id) }}" class="btn btn-warning">Editar</a>



						<!-- Botao para excluir o estoque, pegara o metodo destroy do arquivo estoquesController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'estoque/'.$estoque->id, 'style' => 'display:inline']) !!}

							<button type="submit" class="btn btn-danger">Excluir</button>

						{!! Form::close() !!}
						</td>
					</tr>
				</table>

	</p>
              <hr>
          @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
