@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                <div class="panel-group">
                  <div class="panel panel-info">
  <div class="panel-heading"><h3>Controle Escolar</div>
  <div class="panel-body">
    <a href="{{'curso/show'}}" class="btn btn-primary">Cursos</a>
    <a href="{{'disciplina/show'}}" class="btn btn-primary">Disciplinas</a>
    <a href="{{'funcionario/show'}}" class="btn btn-primary">Funcionários</a>
    <a href="{{'aluno/show'}}" class="btn btn-primary">Alunos</a>
</div>
</div>
<div class="panel panel-info">
  <div class="panel-heading"><h3>Finanças</div>
  <div class="panel-body">
    <a href="{{'incoming/show'}}" class="btn btn-primary">Contas a Receber</a>
      <a href="{{'conta/show'}}" class="btn btn-primary">Contas a Pagar</a>
</div>
</div>

<div class="panel panel-success">
  <div class="panel-heading"><h3>Relatórios</div>
  <div class="panel-body">
    <a href="{{'relatorioGanhos'}}" class="btn btn-success">Relatório de Ganhos</a>
        <a href="{{'relatorioGastos'}}" class="btn btn-success">Relatório de Gastos</a>
        <a href="{{'relatorioComparativo'}}" class="btn btn-success">Relatório Comparativo</a>
</div>
</div>

            </div>
        </div>
    </div>
  </div>
@endsection
