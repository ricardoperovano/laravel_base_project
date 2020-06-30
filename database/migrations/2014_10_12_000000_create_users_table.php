<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->unsignedBigInteger('atualizado_por')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->boolean('ativo')->nullable()->default(1);
            $table->boolean('api_only_user')->nullable()->default(0);
            $table->boolean('super_user')->nullable()->default(0);
            $table->softDeletes();

            /**
             * Indexes
             */
            $table->index('ativo');
            $table->index('empresa_id');
            $table->index('name');
            $table->index('email');

            /**
             * Foreign keys
             */
            $table->foreign('criado_por')->references('id')->on('users');
            $table->foreign('atualizado_por')->references('id')->on('users');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
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

        Schema::dropIfExists('users');
    }
}
