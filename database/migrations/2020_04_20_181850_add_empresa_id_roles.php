<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpresaIdRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->unsignedBigInteger('empresa_id');
            $table->string('description', 80);
            $table->unsignedBigInteger('criado_por');
            $table->unsignedBigInteger('atualizado_por');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('empresa_id');
            $table->dropColumn('description');
            $table->dropColumn('criado_por');
            $table->dropColumn('atualizado_por');
            $table->dropColumn('deleted_at');
        });
    }
}
