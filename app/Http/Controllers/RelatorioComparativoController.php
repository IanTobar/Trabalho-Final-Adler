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

            $totalDespesa = 0;
            $totalGanho = 0;

/*
                     foreach ($contas as $conta) {
                        $totalDespesa += $conta->valor;
                     }

                     foreach ($incomings as $incoming) {
                        $totalGanho += $incoming->valor;
                     }
                     */
                     $this->GraficoComparativo();
  return view('relatorios.relatorioComparativo');
  //return view('relatorios.RelatorioIncomings',['total' => $total, 'media' => $media, 'numeroElementos' => $numeroElementos]);
}
    public function GraficoComparativo()
    {

          $contas = Conta::get();
          $incomings = Incoming::get();
          $comparativo = \Lava::DataTable();

                $comparativo->addDateColumn('Ano')
                   ->addNumberColumn('Ganhos')
                   ->addNumberColumn('Gastos')
                   ->addNumberColumn('Lucro')
                  ->setDateTimeFormat('m/Y');
                    $totalDespesa = 0;
                    $totalGanho = 0;

  //                  $data2 = substr($dynamicstring, -5);
  $arrayGastos = array();
                             foreach ($contas as $conta) {

                               $data = substr("$conta->dataValidade", -7);
                               if (array_key_exists("$data", $arrayGastos))
                               {
                                 $valor = $arrayGastos["$data"];
                               }
                               else {
                                 $valor = 0;
                               }
                               $valor += $conta->valor;
                                $arrayGastos["$data"] = $valor;


                             }
                             foreach ($incomings as $incoming) {

                             }

                             foreach ($arrayGastos as $key => $value) {
                               $comparativo->addRow(["$key",$value,0]);
                             }


\Lava::ComboChart('GraficoComparativo', $comparativo, [
    'title' => 'Company Performance',
    'titleTextStyle' => [
        'color'    => 'rgb(123, 65, 89)',
        'fontSize' => 16
    ],
    'legend' => [
        'position' => 'in'
    ],
    'seriesType' => 'bars',
    'series' => [
        2 => ['type' => 'line']
    ]
]);
    }
}
