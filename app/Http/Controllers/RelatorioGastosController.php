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
      $this->GraficoGastosTempo();

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

    $formater = \Lava::NumberFormat([
      'pattern' => 'R$#,###'
    ]);

    //$formater.format($reasons,1);

        \Lava::BarChart('ComparativoGastosGanhos', $reasons);
  }

  public function GraficoGastosTempo()
  {
$contas = Conta::orderBy('dataValidade', 'ASC')->get();
$gastos = \Lava::DataTable();

$gastos->addDateColumn('Data');
$gastos->addNumberColumn('Valor');
$gastos->setDateTimeFormat('j/m/Y');



foreach ($contas as $conta) {
$gastos->addRow(["$conta->dataValidade",$conta->valor]);
}

\Lava::LineChart('GastosTempo', $gastos, [
    'title' => 'Gastos Por Mês'
]);
  }
}
