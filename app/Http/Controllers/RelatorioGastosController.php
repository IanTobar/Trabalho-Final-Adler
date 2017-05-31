<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioGastosController extends Controller
{

  public function show(){

    return view('cursos.lista', ['cursos' => $cursos]);

  }

  public function index(){

  return view('relatorios.lista');

  }
}
