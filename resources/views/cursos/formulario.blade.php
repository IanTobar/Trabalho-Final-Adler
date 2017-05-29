@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="pull-right btn btn-primary" href="{{url('curso/index')}}">Lista Cursos</a>
					<h1>Inserir Curso</h1>

				</div>

                <div class="panel-body">

					<!-- A variavel mensagem_sucesso foi criada no controller CursosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

					@if(Request::is('*/edit'))
						{!!Form::model($cursos, ['method' => 'PATCH', 'url' => 'curso/'.$cursos->id])!!}
					@else
						{!! Form::open(['route' => 'curso.store']) !!}
					@endif




						{!! Form::label('nomeCurso','Nome do Curso: ') !!}
						{!! Form::input('string','nomeCurso', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'nomeCurso']) !!}


						{!! Form::label('cargaHoraria','Carga Horária: ') !!}
						{!! Form::input('integer','cargaHoraria', null,  ['class' => 'form-control', 'placeholder' => 'cargaHoraria']) !!}


						{!! Form::label('tamanhoTurma','Tamanho da Turma: ') !!}
						{!! Form::input('integer','tamanhoTurma' , null,  ['class' => 'form-control', 'placeholder' => 'tamanhoTurma']) !!}

						{!! Form::label('duracao','Duração em períodos: ') !!}
						{!! Form::input('integer','duracao' , null,  ['class' => 'form-control', 'placeholder' => 'duracao'] ) !!}

						{!! Form::label('cordenadorCurso','Coordenador do Curso: ') !!}
						{!! Form::input('string','cordenadorCurso' , null,  ['class' => 'form-control', 'placeholder' => 'cordenadorCurso']) !!}
<br>
						{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
