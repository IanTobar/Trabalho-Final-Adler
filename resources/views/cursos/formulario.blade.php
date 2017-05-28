@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>

                <div class="panel-body">
                  {!! Form::open(['route' => 'curso.store']) !!}

                  {!! Form::label('nomeCurso','Nome do Curso: ') !!}
                  {!! Form::input('string','nomeCurso', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Exemplo: Sistemas de Informação']) !!}


                  {!! Form::label('cargaHoraria','Carga Horária: ') !!}
                  {!! Form::input('integer','cargaHoraria', '',  ['class' => 'form-control', 'placeholder' => 'Exemplo: 3000']) !!}


                  {!! Form::label('tamanhoTurma','Tamanho da Turma: ') !!}
                  {!! Form::input('integer','tamanhoTurma' ,'',  ['class' => 'form-control', 'placeholder' => 'Exemplo: 24']) !!}

                  {!! Form::label('duracao','Duração em períodos: ') !!}
                  {!! Form::input('integer','duracao' ,'',  ['class' => 'form-control', 'placeholder' => 'Exemplo: 8'] ) !!}

                  {!! Form::label('cordenadorCurso','Coordenador do Curso: ') !!}
                  {!! Form::input('string','cordenadorCurso' ,'',  ['class' => 'form-control', 'placeholder' => 'Exemplo: Sistemas de Informação']) !!}

                  {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
