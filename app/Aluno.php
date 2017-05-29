<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
      'nomeAluno',
      'cpf',
      'rg',
      'curso',
      'dataNasc',
      'cep',
	    'estado',
	    'cidade',
	    'bairro',
	    'rua',
      'numero',
      'complemento',
	    'telefone',
	    'email',
	    'sexo',
    ];
}
