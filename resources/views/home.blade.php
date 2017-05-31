@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
					<!-- View da pagina que será acessada após o login -->
                    Você está logado.
                  
                    <div>
					<a href="{{'curso/show'}}" class="btn btn-primary">Cursos</a>
					<a href="{{'disciplina/show'}}" class="btn btn-primary">Disciplinas</a>
					<a href="{{'funcionario/show'}}" class="btn btn-primary">Funcionários</a>
          <a href="{{'aluno/show'}}" class="btn btn-primary">Alunos</a>
          <a href="{{'conta/show'}}" class="btn btn-primary">Contas a Pagar</a>
          <a href="{{'incoming/show'}}" class="btn btn-primary">Contas a Receber</a>
        </div>
        <div>
<br>
          <a href="{{'relatorioGastos'}}" class="btn btn-success">Relatório de Gastos</a>
</div>

               </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
