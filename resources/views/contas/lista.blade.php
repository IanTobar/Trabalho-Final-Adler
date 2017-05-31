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
                  <a class= "pull-right btn btn-primary"   href = "{{url('conta/create')}}" >Nova Conta</a>
                </td>
                <tr>
                <td>

                  <p style = "margin-top: 10px"> <a class= "pull-right btn btn-primary"   href = "{{url('conta/show')}}" >Listar Todas</a> </p>
                </td>
              </tr>
              </tr>
</table>


					<h1> Contas a Pagar </h1>
          <form action = "{{route('pesquisaConta')}}" method="GET"> <!-- FORcontasPESQUISA -->
            <input name ='nomeBeneficiario' type="text">
            <input type="submit" value ="Pesquisar" class ="btn btn-primary">
        </form>
				</div>

                <div class="panel-body">
					<!-- A variavel mensagem_sucesso foi criada no controller contaController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif


              @foreach($contas as $conta)
              <h2>{{ $conta->nomeBeneficiario }}</h2>
              <p> <b> CPF:  </b> {{ $conta->cpf}}. </p>
              <p> <b> Conta:  </b>{{ $conta->conta}}. </p>
              <p> <b> Agência:  </b> {{ $conta->agencia}}. </p>
              <p>  <b> Nome do Banco:  </b>{{ $conta->nomeBanco}}.</p>
              <p>  <b> Valor da Transação:  </b>{{ $conta->valor}}.</p>
              <p>  <b> Data de Validade:  </b>{{ $conta->dataValidade}}.</p>
              <p>

				<table>
                  <tr>

					<td>

						<a href="{{ route('conta.edit', $conta->id) }}" class="btn btn-warning">Editar</a>



						<!-- Botao para excluir o conta, pegara o metodo destroy do arquivo contaController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'conta/'.$conta->id, 'style' => 'display:inline']) !!}

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
