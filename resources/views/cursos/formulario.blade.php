@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>

                <div class="panel-body">
                  {!! Form::open() !!}

                  {!! Form::label('nomeCurso','Nome do Curso: ') !!}
                  {!! Form::input('string','nomeCurso') !!}


                  {!! Form::label('cargaHoraria','Carga Horária: ') !!}
                  {!! Form::input('integer','cargaHoraria') !!}


                  {!! Form::label('tamanhoTurma','Tamanho da Turma: ') !!}
                  {!! Form::input('integer','tamanhoTurma') !!}

                  {!! Form::label('duracao','Duração em periodos: ') !!}
                  {!! Form::input('integer','duracao') !!}

                  {!! Form::label('cordenadorCurso','Coordenador do Curso: ') !!}
                  {!! Form::input('string','cordenadorCurso') !!}

                  {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
