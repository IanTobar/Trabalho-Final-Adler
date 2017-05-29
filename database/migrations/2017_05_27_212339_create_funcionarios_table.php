<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeFuncionario');
			$table->string('cpf');
			$table->string('rg');
			$table->string('dataNasc');
			$table->string('cep');
			$table->string('estado');
			$table->string('cidade');
			$table->string('bairro');
			$table->string('rua');
			$table->string('telefone');
			$table->string('email');
			$table->string('sexo');
			$table->string('carteiraTrabalho');
			$table->string('salario');
			$table->string('funcao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
