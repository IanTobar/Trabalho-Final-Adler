@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					Disciplinas
					<a class="pull-right" href="{{url('disciplina/index')}}">Lista Disciplinas</a>
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

					{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
