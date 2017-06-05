@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

					<h1> Relatório de Gastos: </h1>

				</div>

                <div class="panel-body">
<div id="bancos-div"> </div>
                  <div id="line-div"></div>
                  <div id="my-dash">
                  <div id="chart">
                  </div>

               <div id="control" class="pull-left"></div>
                <div id="controleData" class="pull-right"></div>

              </div>

</div>


                                  <div class="panel-heading">
                                    <h1>Detalhes:</h1>
                                  </div>
                <div class="panel-body">
                  Média = R${{$media}}.
                  <br>
                  Gastos Totais = R${{$total}}.
                  <br>
                  Número de Contas = {{$numeroElementos}} contas.

                </div>


        </div>
    </div>
</div>
<?= \Lava::render('Dashboard', 'GastosTempo', 'my-dash'); ?>
<!--@piechart('GraficoBancos', 'bancos-div')-->
@endsection
