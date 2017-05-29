@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					Funcionarios
					<a class="pull-right" href="{{url('funcionario/index')}}">Lista Funcionarios</a>
				</div>

                <div class="panel-body">

					<!-- A variavel mensagem_sucesso foi criada no controller FuncionariosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif
					
					@if(Request::is('*/edit'))
						{!!Form::model($funcionarios, ['method' => 'PATCH', 'url' => 'funcionario/'.$funcionarios->id])!!}
					@else
						{!! Form::open(['route' => 'funcionario.store']) !!}
					@endif					

						{{$funcionarios->nomeFuncionario }}
						
						<br />
					
						{!! Form::label('cep','CEP: ') !!}
						{!! Form::input('string','cep' , null,  ['class' => 'form-control', 'placeholder' => 'cep']) !!}

						{!! Form::label('estado','Estado: ') !!}
						{!! Form::input('string','estado' , null,  ['class' => 'form-control', 'placeholder' => 'estado']) !!}

						{!! Form::label('cidade','Cidade: ') !!}
						{!! Form::input('string','cidade' , null,  ['class' => 'form-control', 'placeholder' => 'cidade']) !!}

						{!! Form::label('bairro','Bairro: ') !!}
						{!! Form::input('string','bairro' , null,  ['class' => 'form-control', 'placeholder' => 'bairro']) !!}

						{!! Form::label('rua','Rua: ') !!}
						{!! Form::input('string','rua' , null,  ['class' => 'form-control', 'placeholder' => 'rua']) !!}

						{!! Form::label('telefone','Telefone: ') !!}
						{!! Form::input('string','telefone' , null,  ['class' => 'form-control', 'placeholder' => 'telefone']) !!}

						{!! Form::label('email','E-mail: ') !!}
						{!! Form::input('string','email' , null,  ['class' => 'form-control', 'placeholder' => 'email']) !!}

						<br/>

						{!! Form::label('salario','Salário: ') !!}
						{!! Form::input('double','salario' , null,  ['class' => 'form-control', 'placeholder' => 'funcao']) !!}

						{!! Form::label('lbFuncao','Função: ') !!}						
					    
						{!! Form::select('funcao', array('diretor' => 'Diretor(a)', 'funcionario' => 'Funcionario(a)', 'professor' => 'Professor(a)')) !!}
						<!--<br/>
						{!! Form::label('diretor','Diretor: ') !!}
						{!! Form::radio('funcao', 'diretor') !!}
						<br/>
						{!! Form::label('funcionario','Funcionario: ') !!}
						{!! Form::radio('funcao', 'funcionario') !!}
						<br/>
						{!! Form::label('professor','Professor: ') !!}
						{!! Form::radio('funcao', 'professor') !!}
						-->
						<br/> 	
						
						
						{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
