<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->string('categorias', 255);
            $table->string('titulo', 50);
            $table->text('conteudo');
            $table->boolean('destaque');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfexists('posts');
    }

}
