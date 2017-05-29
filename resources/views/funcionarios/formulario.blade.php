@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="pull-right btn btn-primary" href="{{url('funcionario/index')}}">Lista Funcionarios</a>
					<h1>Inserir Funcionario</h1>

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

						{!! Form::label('nomeFuncionario','Nome do Funcionario: ') !!}
						{!! Form::input('string','nomeFuncionario', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'nomeFuncionario']) !!}


						{!! Form::label('cpf','CPF: ') !!}
						{!! Form::input('string','cpf', null,  ['class' => 'form-control', 'placeholder' => 'cpf']) !!}


						{!! Form::label('rg','RG: ') !!}
						{!! Form::input('string','rg' , null,  ['class' => 'form-control', 'placeholder' => 'rg']) !!}

						{!! Form::label('dataNasc','Data de Nascimento(dd/mm/aa):') !!}
						{!! Form::input('string','dataNasc' , null,  ['class' => 'form-control', 'placeholder' => 'dataNasc'] ) !!}

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

            {!! Form::label('numero','Numero: ') !!}
            {!! Form::input('string','numero' , null,  ['class' => 'form-control', 'placeholder' => 'numero']) !!}

            {!! Form::label('complemento','Complemento: ') !!}
						{!! Form::input('string','complemento' , null,  ['class' => 'form-control', 'placeholder' => 'complemento']) !!}

						{!! Form::label('telefone','Telefone: ') !!}
						{!! Form::input('string','telefone' , null,  ['class' => 'form-control', 'placeholder' => 'telefone']) !!}

						{!! Form::label('email','E-mail: ') !!}
						{!! Form::input('string','email' , null,  ['class' => 'form-control', 'placeholder' => 'email']) !!}

						{!! Form::label('lbSexo','Sexo: ') !!}
						<br/>
						{!! Form::label('masculino','Masculino: ') !!}
						{!! Form::radio('sexo', 'masculino') !!}

						{!! Form::label('feminino','Feminino: ') !!}
						{!! Form::radio('sexo', 'feminino') !!}
						<br/>

						{!! Form::label('carteiraTrabalho','Carteira de Trabalho: ') !!}
						{!! Form::input('string','carteiraTrabalho' , null,  ['class' => 'form-control', 'placeholder' => 'carteiraTrabalho']) !!}

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
