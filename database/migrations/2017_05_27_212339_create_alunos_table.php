<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeAluno');
      			$table->string('cpf');
      			$table->string('rg');
            $table->string('curso');
      			$table->string('dataNasc');
      			$table->string('cep');
      			$table->string('estado');
      			$table->string('cidade');
      			$table->string('bairro');
      			$table->string('rua');
            $table->string('numero');
            $table->string('complemento');
      			$table->string('telefone');
      			$table->string('email');
      			$table->string('sexo');
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
