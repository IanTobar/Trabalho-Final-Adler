@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>

                <div class="panel-body">
              LISTA
              @foreach($cursos as $curso)
                  <h3>{{ $curso->title }}</h3>
                  <p>{{ $curso->description}}</p>
                  <p>
<<<<<<< HEAD
                      <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info">Info</a>
                      <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-primary">Editar</a>
=======
                      <a href="{{ route('cursos.show', $task->id) }}" class="btn btn-info">Info</a>
                      <a href="{{ route('cursos.edit', $task->id) }}" class="btn btn-primary">Editar</a>
>>>>>>> AjeitandoFormulárioCurso
                  </p>
                  <hr>
              @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
