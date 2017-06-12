@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          <div class="panel panel-default">
              <div class="panel-heading animatedLong fadeIn">
                <h1>Saldo Previsto ( {{$dataFinal->format('j/m/Y')}} ):</h1>
</div>
<div class="panel-body animatedLong fadeIn delay1">
  @if ($saldoFinal>0)
    <h1 style="color: rgb(0,255,0);"> R$ {{$saldoFinal}}. </h1>
  @else
    <h1 style="color: rgb(255,0,0);"> R$ {{$saldoFinal}}. </h1>
  @endif
  </div
</div>
            <div class="panel panel-default">
                <div class="panel-heading">


          <h1 class="animatedLong fadeIn"> Relatório Comparativo: </h1>

				</div>

                <div class="panel-body">
                  <div id="bancos-div"> </div>
                  <div id="line-div"></div>
                  <div id="my-dash">
                  <div class="animatedLong delay15 fadeIn" id="chart">
                  </div>
                <div class="animatedLong delay2 fadeIn" id="controleData" ></div>

              </div>

</div>


        </div>
    </div>
</div>
<?= \Lava::render('Dashboard', 'Comparativo', 'my-dash'); ?>
@endsection
