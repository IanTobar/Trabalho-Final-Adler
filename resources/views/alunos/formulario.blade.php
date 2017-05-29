@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					Alunos
					<a class="pull-right" href="{{url('aluno/index')}}">Lista Alunos</a>
				</div>

                <div class="panel-body">

					<!-- A variavel mensagem_sucesso foi criada no controller AlunosController*/ -->
					@if(Session::has('mensagem_sucesso'))

						<!-- imprime o valor da variavel mensagem_sucesso -->
						<div class = "alert alert-success">{{Session::get('mensagem_sucesso')}}</div>

					@endif

					@if(Request::is('*/edit'))
						{!!Form::model($alunos, ['method' => 'PATCH', 'url' => 'aluno/'.$alunos->id])!!}
					@else
						{!! Form::open(['route' => 'aluno.store']) !!}
					@endif

						{!! Form::label('nomeAluno','Nome do aluno: ') !!}
						{!! Form::input('string','nomeAluno', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'nomeAluno']) !!}

						{!! Form::label('cpf','CPF: ') !!}
						{!! Form::input('string','cpf', null,  ['class' => 'form-control', 'placeholder' => 'cpf']) !!}

						{!! Form::label('rg','RG: ') !!}
						{!! Form::input('string','rg' , null,  ['class' => 'form-control', 'placeholder' => 'rg']) !!}

            <!--Temporario-->
            {!! Form::label('curso','Curso: ') !!}
						{!! Form::input('string','curso' , null,  ['class' => 'form-control', 'placeholder' => 'curso']) !!}

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

            {!! Form::label('complemento','complemento: ') !!}
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

						{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
