<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppCompleto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_escola', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });

        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('uf');
        });
        
        Schema::create('cidade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('estado_id')->unsigned()->nullable()->default(null);
            $table->foreign('estado_id')->references('id')->on('estado')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('cidade_id')->unsigned()->nullable()->default(null);
            $table->foreign('cidade_id')->references('id')->on('cidade')->onUpdate('cascade')->onDelete('set null');
            $table->integer('tipo_escola_id')->unsigned()->nullable()->default(null);
            $table->foreign('tipo_escola_id')->references('id')->on('tipo_escola')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('tipo_atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });

        Schema::create('atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('tipo_atividade_id')->unsigned()->nullable()->default(null);
            $table->foreign('tipo_atividade_id')->references('id')->on('tipo_atividade')->onUpdate('cascade')->onDelete('set null');
            $table->integer('ano');
            $table->text('descricao');
            $table->integer('forma_avaliacao');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('users_atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->integer('atividade_id')->unsigned()->nullable()->default(null);
            $table->foreign('atividade_id')->references('id')->on('atividade')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('avaliacao_atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('atividade_id')->unsigned()->nullable()->default(null);
            $table->foreign('atividade_id')->references('id')->on('atividade')->onUpdate('cascade')->onDelete('set null');
            $table->text('comentario')->nullable();
            $table->integer('nivel');
            $table->timestamps();
        });

        Schema::create('roteiro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('ano');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('roteiro_atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roteiro_id')->unsigned()->nullable()->default(null);
            $table->foreign('roteiro_id')->references('id')->on('roteiro')->onUpdate('cascade')->onDelete('set null');
            $table->integer('atividade_id')->unsigned()->nullable()->default(null);
            $table->foreign('atividade_id')->references('id')->on('atividade')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roteiro_atividade');
        Schema::dropIfExists('roteiro');
        Schema::dropIfExists('avaliacao_atividade');
        Schema::dropIfExists('users_atividade');
        Schema::dropIfExists('atividade');
        Schema::dropIfExists('tipo_atividade');
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tipo_escola_id');
            $table->dropColumn('cidade_id');
        });

        Schema::dropIfExists('tipo_escola');
        Schema::dropIfExists('cidade');
        Schema::dropIfExists('estado');

    }
}
