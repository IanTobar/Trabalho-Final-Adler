@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-1">

                <div class="panel-group" style="text-align: center;">
                  <table>
                    <tr>
                      <td style="padding: 8px;">
                  <div class="panel panel-info animatedLong fadeIn">
  <div class="panel-heading animatedLong fadeInDown" style="text-align: center;"><i class="material-icons" style="font-size:50px;">school</i><h3>Controle Escolar</div>

  <div class="panel-body animatedLong fadeInDown" style="text-align: center;">
    <table>
      <tr>
    <td style="padding: 8px;"> <a href="{{'curso/show'}}" class="btn btn-primary" style="width: 200px;">Cursos</a> </td>
    <td> <a href="{{'disciplina/show'}}" class="btn btn-primary" style="width: 200px;">Disciplinas</a> </td>
      </tr>
  <tr>
    <td><a href="{{'funcionario/show'}}" class="btn btn-primary" style="width: 200px;">Funcionários</a></td>
    <td><a href="{{'aluno/show'}}" class="btn btn-primary" style="width: 200px;">Alunos</a></td>
  </table>
</div>
</div>

</td>
<td>

<div class="panel panel-success animatedLong fadeIn">
  <div  class="panel-heading animatedLong fadeInDown"><i class="material-icons" style="font-size:50px;">event_note</i><h3>Relatórios</div>
  <div class="panel-body animatedLong fadeInDown">
    <table>
      <tr>
        <td style="padding: 8px;"><a href="{{'relatorioGanhos'}}" class="btn btn-success" style="width: 200px;">Relatório de Ganhos</a></td>
        <td><a href="{{'relatorioGastos'}}" class="btn btn-success" style="width: 200px;">Relatório de Gastos</a></td>
      </tr>
      <tr>
        <td><a href="{{'relatorioComparativo'}}" class="btn btn-success" style="width: 200px;">Relatório Comparativo</a></td>
      </tr>
    </table>
</div>
</div>

</td>
</tr>
<tr>
  <td style="padding: 8px;">
<div  class="panel panel-info animatedLong fadeIn">
  <div style="text-align: center;" class="panel-heading animatedLong fadeInUp"><i class="material-icons" style="font-size:50px;">trending_up</i><h3>Finanças</h3></div>
  <div class="panel-body animatedLong fadeInUp" style="text-align: center;">
    <table>
      <tr>
    <td style="padding: 8px;"><a href="{{'incoming/show'}}" class="btn btn-primary" style="width: 200px;">Contas a Receber</a></td>
    <td><a href="{{'conta/show'}}" class="btn btn-primary" style="width: 200px;">Contas a Pagar</a></td>
  </tr>
</table>
  </div>
</div>
</td>

<td>
<div  class="panel panel-info animatedLong fadeIn">
<div style="text-align: center;" class="panel-heading animatedLong fadeInUp"><i class="material-icons" style="font-size:50px;">receipt</i><h3>Estoque</h3></div>
<div class="panel-body animatedLong fadeInUp" style="text-align: center;">
  <table>
    <tr>
  <td style="padding: 8px;">
  <a href="{{'estoque/show'}}" class="btn btn-primary" style="width: 400px;">Gerenciar Produtos</a></td>
</td>

</tr>
</table>
</div>
</div>
</td>

</tr>
</table>
            </div>
        </div>
    </div>
  </div>
@endsection
