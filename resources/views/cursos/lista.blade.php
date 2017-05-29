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
                  <a class= "pull-right btn btn-primary"   href = "{{url('curso/create')}}" >Novo Curso</a>
                </td>
                <tr>
                <td>

                  <p style = "margin-top: 10px"> <a class= "pull-right btn btn-primary"   href = "{{url('curso/show')}}" >Listar Todos</a> </p>
                </td>
              </tr>
              </tr>
</table>


					<h1> Cursos </h1>
          <form action = "{{route('pesquisa')}}" method="GET"> <!-- FORMULÁRIO DE PESQUISA -->
            <input name ='nomeCurso' type="text">
            <input type="submit" value ="Pesquisar" class ="btn btn-primary">
        </form>
				</div>

                <div class="panel-body">
					<!-- A variavel mensagem_sucesso foi criada no controller CursosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif


                  @foreach($cursos as $curso)
              <h2>{{ $curso->nomeCurso }}</h2>
              <p> <b> Carga Horária:  </b> {{ $curso->cargaHoraria}} horas. </p>
              <p> <b> Tamanho Máximo:  </b>{{ $curso->tamanhoTurma}} alunos. </p>
              <p> <b> Duração:  </b> {{ $curso->duracao}} perídos. </p>
              <p>  <b> Coordenador:  </b>{{ $curso->cordenadorCurso}}.</p>
              <p>

				<table>
                  <tr>

					<td>
					
						<a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-warning">Editar</a>

						
						
						<!-- Botao para excluir o curso, pegara o metodo destroy do arquivo CursosController -->
						{!! Form::open(['method' => 'DELETE', 'url' => 'curso/'.$curso->id, 'style' => 'display:inline']) !!}

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
