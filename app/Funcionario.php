<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
      protected $fillable = [
      'nomeFuncionario',
      'cpf',
      'rg',
      'dataNasc',
      'cep',
	  'estado',
	  'cidade',
	  'bairro',
	  'rua',
    'complemento',
	  'telefone',
	  'email',
	  'sexo',
	  'carteiraTrabalho',
	  'salario',
	  'funcao',
    ];
}
