<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
      'nomeCurso',
      'cargaHoraria',
      'tamanhoTurma',
      'duracao',
      'cordenadorCurso',
    ];
}
