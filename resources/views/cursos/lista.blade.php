@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class= "pull-right btn btn-primary"   href = "{{url('curso/create')}}" >Novo Curso</a>



					<h1> Cursos </h1>
          
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
