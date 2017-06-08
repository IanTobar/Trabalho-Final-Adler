@extends('layouts.app')

@section('content')
  {{ Html::style( asset('css/fadein.css') ) }}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">


          <h1 class="animatedLong fadeIn"> Relatório de Gastos: </h1>

				</div>

                <div class="panel-body">
                  <div id="bancos-div"> </div>
                  <div id="line-div"></div>
                  <div id="my-dash">
                  <div class="animatedLong delay1 fadeIn" id="chart">
                  </div>
                <div class="animatedLong delay2 fadeIn" id="controleData" ></div>

              </div>

</div>


        </div>
    </div>
</div>
<?= \Lava::render('Dashboard', 'Comparativo', 'my-dash'); ?>
@endsection
