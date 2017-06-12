@extends('layouts.app')

@section('content')
<div class="incominginer">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <table class = "pull-right">
                    <tr>
                      <td>
                  <a class= "pull-right btn btn-primary animatedLong fadeIn delay15"   href = "{{url('incoming/create')}}" >Nova Conta</a>
                </td>
                <tr>
                <td>

                  <p style = "margin-top: 10px"> <a class= "pull-right btn btn-primary animatedLong fadeIn delay2"   href = "{{url('incoming/show')}}" >Listar Todas</a> </p>
                </td>
              </tr>
              </tr>
</table>


					<h1 class="animatedLong fadeIn"> Contas a Receber </h1>
          <div class="animatedLong fadeIn delay15">
          <form action = "{{route('pesquisaIncoming')}}" method="GET"> <!-- FORincomingsPESQUISA -->
            <input name ='nomeIntermediario' type="text">
            <input type="submit" value ="Pesquisar" class ="btn btn-primary">
        </form>
				</div>
      </div>

                <div class="panel-body animatedLong fadeIn delay1">
					<!-- A variavel mensagem_sucesso foi criada no controller incomingController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif


              @foreach($incomings as $incoming)
              <h2>{{ $incoming->nomeIntermediario }}</h2>
              <p> <b> CPF:  </b> {{ $incoming->cpf}}. </p>
              <p>  <b> Valor da Transação:  </b>{{ $incoming->valor}}.</p>
              <p>  <b> Data de Validade:  </b>{{ $incoming->dataValidade}}.</p>
              <p>

				<table>
                  <tr>

					<td>

						<a href="{{ route('incoming.edit', $incoming->id) }}" class="btn btn-warning">Editar</a>



						<!-- Botao para excluir o incoming, pegara o metodo destroy do arquivo incomingController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'incoming/'.$incoming->id, 'style' => 'display:inline']) !!}

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
