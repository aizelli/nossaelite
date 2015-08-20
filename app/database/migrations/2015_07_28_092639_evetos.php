<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evetos extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('eventos', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', true);
            $table->string('nome', 60)->nullable();
            $table->text('descricao')->nullable();
            $table->datetime('data_evento')->nullalble();
            $table->string('local');
            $table->integer('cep');
            $table->string('endereco', 60);
            $table->integer('numero');
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 30);
            $table->mediumInteger('cidade');
            $table->tinyInteger('estado');
            $table->char('pais', 20);
            $table->string('coordenadas', 30)->nullable();
            $table->string('artista_principal', 45)->nullable();
            $table->string('artista_secundario', 120)->nullable();
            $table->decimal('valor_ingresso', 4,2)->nullable();
            $table->boolean('ativo');
            $table->boolean('album');
            $table->boolean('cronometro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('eventos');
    }

}
