@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="pull-right btn btn-primary" href="{{url('estoque/index')}}">Lista de Produtos</a>
					<h1>Inserir Produto</h1>

				</div>

                <div class="panel-body">

					<!-- A variavel mensagem_sucesso foi criada no controller estoquesController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

					@if(Request::is('*/edit'))
						{!!Form::model($estoques, ['method' => 'PATCH', 'url' => 'estoque/'.$estoques->id])!!}
					@else
						{!! Form::open(['route' => 'estoque.store']) !!}
					@endif




						{!! Form::label('nomeProdutp','Nome do Produto: ') !!}
						{!! Form::input('string','nomeProduto', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'nomeProduto']) !!}


						{!! Form::label('descricao','Descrição do Produto: ') !!}
						{!! Form::input('string','descricao', null,  ['class' => 'form-control', 'placeholder' => 'descrição']) !!}


						{!! Form::label('quantidade','Quantidade Atual: ') !!}
						{!! Form::input('integer','quantidade' , null,  ['class' => 'form-control', 'placeholder' => 'quantidade']) !!}

						{!! Form::label('minimo','Quantidade Minima: ') !!}
						{!! Form::input('integer','minimo' , null,  ['class' => 'form-control', 'placeholder' => 'quantidade minima'] ) !!}

						{!! Form::label('dataEntrada','Data de Entrada do Produto(dd/mm/aa): ') !!}
						{!! Form::input('string','dataEntrada' , null,  ['class' => 'form-control', 'placeholder' => '(dia/mes/ano)']) !!}
<br>
						{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
