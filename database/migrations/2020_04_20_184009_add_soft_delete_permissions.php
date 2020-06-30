<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('description', 150);
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->unsignedBigInteger('atualizado_por')->nullable();
            $table->string('model', 30)->nullable();
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
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('created_at');
            $table->dropColumn('criado_por');
            $table->dropColumn('atualizado_por');
            $table->dropColumn('model');
        });
    }
}
