@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					{{$estoques->nomeProduto }}
					<a class="pull-right" href="{{url('estoque/index')}}">Lista de Produtos</a>
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

            Descrição: {{$estoques->descricao }}
            <br />
						<br />

            						{!! Form::label('quantidade','Quantidade Atual: ') !!}
            						{!! Form::input('integer','quantidade' , null,  ['class' => 'form-control', 'placeholder' => 'quantidade']) !!}

            						{!! Form::label('minimo','Quantidade Minima: ') !!}
            						{!! Form::input('integer','minimo' , null,  ['class' => 'form-control', 'placeholder' => 'quantidade minima'] ) !!}

            						{!! Form::label('dataEntrada','Data de Entrada do Produto(dd/mm/aa): ') !!}
            						{!! Form::input('string','dataEntrada' , null,  ['class' => 'form-control', 'placeholder' => '(dia/mes/ano)']) !!}
						<br/>

						<br/>

						{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
