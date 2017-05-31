<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    protected $fillable = [
      'nomeIntermediario',
      'cpf',
      'valor',
	    'dataValidade',
	    ];
}
