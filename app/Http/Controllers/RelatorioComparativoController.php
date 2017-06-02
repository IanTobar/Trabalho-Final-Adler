<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioComparativoController extends Controller
{


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
}
