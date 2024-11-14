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
        Schema::table('nosotros', function (Blueprint $table) {
            $table->longText('contenido')->nullable();  // Columna para almacenar el contenido de Summernote como LONGTEXT
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nosotros', function (Blueprint $table) {
            $table->dropColumn('contenido');  // Eliminar la columna en caso de rollback
        });
    }
};
