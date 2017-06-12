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
      $this->GraficoGastosTempo();
      $contas = Conta::get();
      $total = 0;
      $numeroElementos =count($contas,0);
      

        foreach ($contas as $conta) {
          $total += $conta->valor;
        }
        $media = $total/$numeroElementos;

  return view('relatorios.relatorioGastos',['total' => $total, 'media' => $media, 'numeroElementos' => $numeroElementos]);
  }


  public function GraficoGastosTempo()
  {
$contas = Conta::orderBy('dataValidade', 'ASC')->get();
$gastos = \Lava::DataTable();
$bancos = \Lava::DataTable();

$bancos->addStringColumn('Bancos')
    ->addNumberColumn('Porcentagem');


$gastos->addDateColumn('Data');
$gastos->addNumberColumn('Valor');
$gastos->setDateTimeFormat('j/m/Y');



$arrayComparativo = array();


                           foreach ($contas as $conta) {

                             $data = $conta->dataValidade;
                             if (array_key_exists("$data", $arrayComparativo))
                             {
                               $valor = $arrayComparativo["$data"][0];
                             }
                             else {
                               $valor = 0;
                             }
                             $valor += $conta->valor;
                              $arrayComparativo["$data"] = array($valor,0);
                           }

                           foreach ($arrayComparativo as $key => $value) {

                           $gastos->addRow(["$key",$value[0]]);
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
