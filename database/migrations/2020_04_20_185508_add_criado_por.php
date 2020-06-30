<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCriadoPor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->unsignedBigInteger('atualizado_por')->nullable();
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
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->dropColumn('criado_por');
            $table->dropColumn('atualizado_por');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
