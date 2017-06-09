@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                <div class="panel-group" style="text-align: center;">

                  <div style="width: 800px; height: 200px;" class="panel panel-info animatedLong fadeIn">
  <div class="panel-heading animatedLong fadeInDown" style="text-align: center;"><i class="material-icons" style="font-size:50px;">school</i><h3>Controle Escolar</div>

  <div class="panel-body animatedLong fadeIn" style="text-align: center;">
    <a href="{{'curso/show'}}" class="btn btn-primary">Cursos</a>
    <a href="{{'disciplina/show'}}" class="btn btn-primary">Disciplinas</a>
    <a href="{{'funcionario/show'}}" class="btn btn-primary">Funcionários</a>
    <a href="{{'aluno/show'}}" class="btn btn-primary">Alunos</a>
</div>
</div>

<div style="float:right; width: 400px; height: 260px;" class="panel panel-success animatedLong fadeIn delay2">
  <div  class="panel-heading animatedLong fadeInDown delay2"><i class="material-icons" style="font-size:50px;">event_note</i><h3>Relatórios</div>
  <div class="panel-body">
    <a href="{{'relatorioGanhos'}}" class="btn btn-success">Relatório de Ganhos</a>
        <a href="{{'relatorioGastos'}}" class="btn btn-success">Relatório de Gastos</a>
        <br>
        <br>
        <a href="{{'relatorioComparativo'}}" class="btn btn-success">Relatório Comparativo</a>
</div>
</div>


<div style="float:left; width: 300px; height: 260px;" class="panel panel-info animatedLong fadeIn delay1">
  <div style="text-align: center;" class="panel-heading animatedLong fadeInDown delay1"><i class="material-icons" style="font-size:50px;">trending_up</i><h3>Finanças</h3></div>
  <div class="panel-body" style="text-align: center;">
    <a href="{{'incoming/show'}}" class="btn btn-primary">Contas a Receber</a>
    <a href="{{'conta/show'}}" class="btn btn-primary">Contas a Pagar</a>
  </div>
</div>

            </div>
        </div>
    </div>
  </div>
@endsection
