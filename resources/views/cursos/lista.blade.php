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

                  @foreach($cursos as $curso)
              <h2>{{ $curso->nomeCurso }}</h2>
              <p> <b> Carga Horária:  </b> {{ $curso->cargaHoraria}} horas. </p>
              <p> <b> Tamanho Máximo:  </b>{{ $curso->tamanhoTurma}} alunos. </p>
              <p> <b> Duração:  </b> {{ $curso->duracao}} perídos. </p>
              <p>  <b> Coordenador:  </b>{{ $curso->cordenadorCurso}}.</p>
              <p>
                  <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
                  <a href="{{ route('curso.destroy', $curso->id) }}" class="btn btn-danger">Excluir</a>
              </p>
              <hr>
          @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
