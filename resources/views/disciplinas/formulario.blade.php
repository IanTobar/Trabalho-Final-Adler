@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="pull-right btn btn-primary"  href="{{url('disciplina/index')}}" class="btn btn-primary">Lista Disciplinas</a>
					<h1>Inserir Disciplina</h1>

				</div>

                <div class="panel-body">

					<!-- A variavel mensagem_sucesso foi criada no controller DisciplinaController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

					@if(Request::is('*/edit'))
						{!!Form::model($disciplinas, ['method' => 'PATCH', 'url' => 'disciplina/'.$disciplinas->id])!!}
					@else
						{!! Form::open(['route' => 'disciplina.store']) !!}
					@endif

					{!! Form::label('nomeDisciplina','Nome da Disciplina: ') !!}
					{!! Form::input('string','nomeDisciplina', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'nomeDisciplina']) !!}


					{!! Form::label('cargaHoraria','Carga Horária: ') !!}
					{!! Form::input('integer','cargaHoraria', null,  ['class' => 'form-control', 'placeholder' => 'cargaHoraria']) !!}
<br>
					{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
