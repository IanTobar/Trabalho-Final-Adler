<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = [
      'nomeProduto',
      'descricao',
      'quantidade',
      'minimo',
      'dataEntrada',
  ];

}
