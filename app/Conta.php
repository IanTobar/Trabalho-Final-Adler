<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
      'nomeBeneficiario',
      'cpf',
      'conta',
      'agencia',
      'nomeBanco',
      'valor',
	    'dataValidade',
	    ];
}
