<?php

namespace App\Http\Controllers;
use App\conta;
use App\incoming;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;

class RelatorioGastosController extends Controller
{

  public function show(){


  }

  public function index(){
      $this->GraficoComparativo();
  return view('relatorios.relatorioGastos');
  }

  public function GraficoComparativo()
  {

        $contas = Conta::get();
        $incomings = Incoming::get();
        $reasons = \Lava::DataTable();


        $reasons->addStringColumn('Tipo');
        $reasons->addNumberColumn('Valor');

        $totalDespesa = 0;
        $totalGanho = 0;


                 foreach ($contas as $conta) {
                    $totalDespesa += $conta->valor;
                 }

                 foreach ($incomings as $incoming) {
                    $totalGanho += $incoming->valor;
                 }

    //$reasons->addRow([$totalDespesa,$totalGanho]);
    $reasons->addRow(['Despesas',$totalDespesa]);
    $reasons->addRow(['Ganhos',$totalGanho]);



        \Lava::BarChart('ComparativoGastosGanhos', $reasons);

        $dateRange = $lava->DateRangeFilter(int|'string', [
        'minValue' => int|float,
        'maxValue' => int|float,
        'format'   => 'string'
    ]);
    
$control = $lava->ControlWrapper($filter, 'control');
$chart   = $lava->ChartWrapper($pieChart, 'chart');

  }
}
