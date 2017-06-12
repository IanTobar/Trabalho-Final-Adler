<?php

namespace App\Http\Controllers;

use App\conta;
use App\incoming;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;


class RelatorioComparativoController extends Controller
{

public function index()
{
  $contas = Conta::orderBy('dataValidade', 'ASC')->get();
  $incomings = Incoming::orderBy('dataValidade', 'ASC')->get();

  $date = date_create_from_format('j/m/Y', '12/06/2017');

            $totalDespesaHoje = 0;
            $totalGanhoHoje = 0;
            $totalDespesa = 0;
            $totalGanho = 0;
            $saldo = 0;

                     foreach ($contas as $conta) {
                        $totalDespesa += $conta->valor;
                        $dataFinalConta = $conta->dataValidade;


                        if ($date >= date_create_from_format('j/m/Y', $conta->dataValidade))
                        {
                          $totalDespesaHoje += $conta->valor;
                        }
                     }

                     foreach ($incomings as $incoming) {
                        $totalGanho += $incoming->valor;
                        $dataFinalDespesa = $incoming->dataValidade;


                            if ($date >= date_create_from_format('j/m/Y', $incoming->dataValidade))
                            {
                              $totalGanhoHoje += $incoming->valor;
                            }
                     }

$data1 = date_create_from_format('j/m/Y', $dataFinalConta);
$data2 = date_create_from_format('j/m/Y', $dataFinalDespesa);

if ($data1 < $data2)
$data1 = $data2;
$saldo = $totalGanho-$totalDespesa;
$saldoHoje = $totalGanhoHoje - $totalDespesaHoje;

                     $this->GraficoComparativo();
  return view('relatorios.relatorioComparativo',['saldoFinal' => $saldo, 'dataFinal' => $data1, 'saldoAtual' => $saldoHoje, 'hoje' => $date]);

}
    public function GraficoComparativo()
    {

          $contas = Conta::orderBy('dataValidade', 'ASC')->get();
          $incomings = Incoming::orderBy('dataValidade', 'ASC')->get();
          $comparativo = \Lava::DataTable();

                $comparativo->addDateColumn('Data')
                   ->addNumberColumn('Gastos')
                   ->addNumberColumn('Ganhos')
                   ->addNumberColumn('Lucro')
                  ->setDateTimeFormat('m/Y');
                    $totalDespesa = 0;
                    $totalGanho = 0;

  //                  $data2 = substr($dynamicstring, -5);
  $arrayComparativo = array();


                             foreach ($contas as $conta) {

                               $data = substr("$conta->dataValidade", -7);
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

                             foreach ($incomings as $incoming) {
                               $data = substr("$incoming->dataValidade", -7);
                               if (array_key_exists("$data", $arrayComparativo))
                               {
                                 $valor = $arrayComparativo["$data"][1];
                                 $valor += $incoming->valor;
                                  $arrayComparativo["$data"] = array($arrayComparativo["$data"][0],$valor);
                               }
                               else {
                                 $valor = 0;
                                 $valor += $incoming->valor;
                                  $arrayComparativo["$data"] = array(0,$valor);
                               }

                             }

foreach ($arrayComparativo as $key => $value) {

$comparativo->addRow(["$key",$value[0],$value[1],$value[1]-$value[0]]);
}


$GraficoComparativo = \Lava::ComboChart('GraficoComparativo', $comparativo, [
    'title' => 'Gráfico Comparativo',
    'titleTextStyle' => [
        'color'    => 'rgb(123, 65, 89)',
        'fontSize' => 16
    ],
    'legend' => [
        'position' => 'in'
    ],
    'seriesType' => 'bars',
    'series' => [
        2 => ['type' => 'line', 'color' => 'rgb(0,255,0)'],
        1 => ['color' => 'rgb(0,0,255)'],
        0 => ['color' => 'rgb(255,0,0)']
    ],

]);

$filtroData  = \Lava::DateRangeFilter(0, [
    'ui' => [
        'labelStacking' => 'vertical'
    ]
]);

$controleData = \Lava::ControlWrapper($filtroData, 'controleData');
$chart   = \Lava::ChartWrapper($GraficoComparativo, 'chart');

\Lava::Dashboard('Comparativo')->bind($controleData, $chart);

    }
}
