@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

					<h1 class="animatedLong fadeIn"> Relatório de Ganhos: </h1>

				</div>

                <div class="panel-body">
                  <div id="line-div"></div>
                  <div id="my-dash">
                  <div id="chart" class="animatedLong fadeIn delay1">
                  </div>

               <div id="control" class="pull-left animatedLong fadeIn delay15"></div>
                <div id="controleData" class="pull-right animatedLong fadeIn delay15"></div>

              </div>

</div>


                                  <div class="panel-heading animatedLong fadeIn delay15">
                                    <h1>Detalhes:</h1>
                                  </div>
                <div class="panel-body animatedLong fadeIn delay2">
                  <h2> Média = R${{$media}}.
                  <br>
                  Ganhos Totais = R${{$total}}.
                  <br>
                  Número de Contas = {{$numeroElementos}} contas.

                </div>


        </div>
    </div>
</div>
<?= \Lava::render('Dashboard', 'GastosTempo', 'my-dash'); ?>

@endsection
