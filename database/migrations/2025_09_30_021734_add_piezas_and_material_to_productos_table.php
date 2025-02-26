<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('piezas_id')->nullable(); // Permitir nulos
        $table->foreign('piezas_id')->references('id')->on('piezas')->onDelete('set null');
        
        $table->unsignedBigInteger('material_id')->nullable(); // Permitir nulos
        $table->foreign('materials_id')->references('id')->on('material')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['piezas_id']);
        $table->dropColumn('piezas_id');

        $table->dropForeign(['material_id']);
        $table->dropColumn('material_id');
        });
    }
};
