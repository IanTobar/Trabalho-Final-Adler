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
                  <a class= "pull-right btn btn-primary animatedLong delay15 fadeIn"   href = "{{url('aluno/create')}}" >Novo Aluno</a>
                </td>
                <tr>
                <td>

                  <p style = "margin-top: 10px"> <a class= "pull-right btn btn-primary animatedLong delay2 fadeIn"   href = "{{url('aluno/show')}}" >Listar Todos</a> </p>
                </td>
              </tr>
              </tr>
        </table>
						<h1 class="animatedLong fadeIn"> Alunos: </h1>
            <div class="animatedLong delay05 fadeIn">
            <form action = "{{route('pesquisaAluno')}}" method="GET"> <!-- FORMULÁRIO DE PESQUISA -->
              <input name ='nomeAluno' type="text">
              <input type="submit" value ="Pesquisar" class ="btn btn-primary">
            </form>
          </div>
            </div>
					</div>

                <div class="panel-body animatedLong delay1 fadeIn">
					<!-- A variavel mensagem_sucesso foi criada no controller CursosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

          @foreach($alunos as $aluno)


              <h2>{{ $aluno->nomeAluno }}</h2>
              <p> <b> CPF:  </b> {{ $aluno->cpf}}. </p>
              <p> <b> RG:  </b>{{ $aluno->rg}}. </p>

			@foreach($cursos as $curso )
				@if($curso->id == $aluno->curso_id)

					<p> <b> Curso:  </b>{{$curso->nomeCurso}} </p>

				@endif
			@endforeach

              <p> <b> Data de Nascimento:  </b> {{ $aluno->dataNasc}}. </p>
              <p>  <b> CEP:  </b>{{ $aluno->cep}}.</p>
              <p>  <b> Estado:  </b>{{ $aluno->estado}}.</p>
              <p>  <b> Cidade:  </b>{{ $aluno->cidade}}.</p>
              <p>  <b> Bairro:  </b>{{ $aluno->bairro}}.</p>
              <p>  <b> Rua:  </b>{{ $aluno->rua}}.</p>
              <p>  <b> Numero:  </b>{{ $aluno->numero}}.</p>
              <p>  <b> Complemento:  </b>{{ $aluno->complemento}}.</p>
              <p>  <b> Telefone:  </b>{{ $aluno->telefone}}.</p>
              <p>  <b> E-mail:  </b>{{ $aluno->email}}.</p>
              <p>  <b> Sexo:  </b>{{ $aluno->sexo}}.</p>
              <p>

				<table>
          <tr>
					  <td>

						<a href="{{ route('aluno.edit', $aluno->id) }}" class="btn btn-warning">Editar</a>



						<!-- Botao para excluir o aluno, pegara o metodo destroy do arquivo CursosController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'aluno/'.$aluno->id, 'style' => 'display:inline']) !!}

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
