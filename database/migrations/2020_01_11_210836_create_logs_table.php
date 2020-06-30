<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('acao');
            $table->string('classe');
            $table->json('objeto_original');
            $table->json('objeto_modificado');
            $table->dateTime('data');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->unsignedBigInteger('atualizado_por')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /**
             * Indexes
             */
            $table->index('model_id');
            $table->index('empresa_id');
            $table->index('criado_por')->nullable();

            /**
             * Foreign keys
             */
            $table->foreign('criado_por')->references('id')->on('users');
            $table->foreign('atualizado_por')->references('id')->on('users');
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
