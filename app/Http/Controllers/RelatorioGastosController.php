<?php

namespace App\Http\Controllers;
use App\Curso;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Http\Request;

class RelatorioGastosController extends Controller
{

  public function show(){

    return view('cursos.lista', ['cursos' => $cursos]);

  }

  public function index(){

    $cursos = Curso::get();
    $reasons = \Lava::DataTable();

    $reasons->addStringColumn('Cursos');
    $reasons->addNumberColumn('Porcento');



             foreach ($cursos as $curso) {
            $reasons->addRow(["$curso->nomeCurso",10]);
             }



    \Lava::PieChart('RelatorioGastosPizza', $reasons, [
        'title'  => 'Cursos',
        'is3D'   => true,
        
    ]);




  return view('relatorios.relatorioGastos');

  }
}
