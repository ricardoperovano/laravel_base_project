<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_empresa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('empresa_id');
            $table->boolean('ativo')->default(1);
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->unsignedBigInteger('atualizado_por')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /**
             * Indexes
             */
            $table->index('user_id');
            $table->index('empresa_id');

            /**
             * Foreign keys
             */
            $table->foreign('criado_por')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('usuario_empresa');
    }
}
