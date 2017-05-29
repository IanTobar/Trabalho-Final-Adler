@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class= "pull-right btn btn-primary"   href = "{{url('funcionario/create')}}" >Novo Funcionario</a>



					<h1> Funcionarios: </h1>
          <form action = "{{route('pesquisaFuncionario')}}" method="GET"> <!-- FORMULÁRIO DE PESQUISA -->
            <input name ='nomeFuncionario' type="text">
            <input type="submit" value ="Pesquisar" class ="btn btn-primary">
          </form>

				</div>

                <div class="panel-body">
					<!-- A variavel mensagem_sucesso foi criada no controller CursosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif


                  @foreach($funcionarios as $funcionario)
              <h2>{{ $funcionario->nomeFuncionario }}</h2>
              <p> <b> CPF:  </b> {{ $funcionario->cpf}}. </p>
              <p> <b> RG:  </b>{{ $funcionario->rg}}. </p>
              <p> <b> Data de Nascimento:  </b> {{ $funcionario->dataNasc}}. </p>
              <p>  <b> CEP:  </b>{{ $funcionario->cep}}.</p>
              <p>  <b> Estado:  </b>{{ $funcionario->estado}}.</p>
              <p>  <b> Cidade:  </b>{{ $funcionario->cidade}}.</p>
              <p>  <b> Bairro:  </b>{{ $funcionario->bairro}}.</p>
              <p>  <b> Rua:  </b>{{ $funcionario->rua}}.</p>
              <p>  <b> Numero:  </b>{{ $funcionario->numero}}.</p>
              <p>  <b> Complemento:  </b>{{ $funcionario->complemento}}.</p>
              <p>  <b> Telefone:  </b>{{ $funcionario->telefone}}.</p>
              <p>  <b> E-mail:  </b>{{ $funcionario->email}}.</p>
              <p>  <b> Sexo:  </b>{{ $funcionario->sexo}}.</p>
			  <p>  <b> Carteira de Trabalho:  </b>{{ $funcionario->carteiraTrabalho}}.</p>
              <p>  <b> Salário:  </b>{{ $funcionario->salario}}.</p>
			  <p>  <b> Função:  </b>{{ $funcionario->funcao}}.</p>
              <p>

				<table>
                  <tr>

					<td>

						<a href="{{ route('funcionario.edit', $funcionario->id) }}" class="btn btn-warning">Editar</a>


						<!-- Botao para excluir o funcionario, pegara o metodo destroy do arquivo CursosController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'funcionario/'.$funcionario->id, 'style' => 'display:inline']) !!}

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
