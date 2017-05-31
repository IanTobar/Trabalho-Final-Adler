@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="pull-right btn btn-primary" href="{{url('incoming/index')}}">Lista de Contas a Receber</a>
					<h1>Inserir Conta a Receber</h1>

				</div>

                <div class="panel-body">

					<!-- A variavel mensagem_sucesso foi criada no controller CursosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

					@if(Request::is('*/edit'))
						{!!Form::model($incomings, ['method' => 'PATCH', 'url' => 'incoming/'.$incomings->id])!!}
					@else
						{!! Form::open(['route' => 'incoming.store']) !!}
					@endif


						{!! Form::label('nomeIntermediario','Nome do Intermediário: ') !!}
						{!! Form::input('string','nomeIntermediario', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'nomeIntermediario']) !!}


						{!! Form::label('cpf','CPF: ') !!}
						{!! Form::input('string','cpf', null,  ['class' => 'form-control', 'placeholder' => 'cpf']) !!}

            {!! Form::label('valor','Valor da Transação: ') !!}
						{!! Form::input('double','valor' , null,  ['class' => 'form-control', 'placeholder' => 'valor']) !!}

            {!! Form::label('dataValidade','Data de validade(dd/mm/aa): ') !!}
						{!! Form::input('string','dataValidade' , null,  ['class' => 'form-control', 'placeholder' => 'dataValidade']) !!}
<br>
						{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
