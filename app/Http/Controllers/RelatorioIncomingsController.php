<?php

namespace App\Http\Controllers;
use App\conta;
use App\incoming;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;

class RelatorioIncomingsController extends Controller
{

  public function show(){


  }

  public function index(){
      $this->GraficoGastosTempo();
      $contas = Incoming::get();
      $total = 0;
      $numeroElementos =count($contas,0);
        foreach ($contas as $conta) {
          $total += $conta->valor;
        }
        $media = $total/$numeroElementos;

  return view('relatorios.RelatorioIncomings',['total' => $total, 'media' => $media, 'numeroElementos' => $numeroElementos]);
  }


  public function GraficoGastosTempo()
  {
$contas = Incoming::orderBy('dataValidade', 'ASC')->get();
$gastos = \Lava::DataTable();
$bancos = \Lava::DataTable();

$bancos->addStringColumn('Bancos')
    ->addNumberColumn('Porcentagem');


$gastos->addDateColumn('Data');
$gastos->addNumberColumn('Valor');
$gastos->setDateTimeFormat('j/m/Y');



foreach ($contas as $conta) {
$gastos->addRow(["$conta->dataValidade",$conta->valor]);
$bancos->addRow(["$conta->nomeBanco",10]);
}

$linechart = \Lava::LineChart('GastosTempo', $gastos, [
    'title' => 'Gastos/Tempo'
]);

$filtroValor  = \Lava::NumberRangeFilter(1, [
    'ui' => [
        'labelStacking' => 'vertical'
    ]
]);

$filtroData  = \Lava::DateRangeFilter(0, [
    'ui' => [
        'labelStacking' => 'vertical'
    ]
]);

$controleData = \Lava::ControlWrapper($filtroData, 'controleData');
$control = \Lava::ControlWrapper($filtroValor, 'control');
$chart   = \Lava::ChartWrapper($linechart, 'chart');



\Lava::Dashboard('GastosTempo')->bind([$control,$controleData], $chart);


\Lava::PieChart('GraficoBancos', $bancos, [
'title'  => 'Bancos Utilizados',
'is3D'   => true,
]);

  }

}
