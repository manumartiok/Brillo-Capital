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
        Schema::create('joyerias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('piezas_id')->nullable(); // Permitir nulos
            $table->foreign('piezas_id')->references('id')->on('piezas')->nullable();
            $table->unsignedBigInteger('material_id')->nullable(); // Permitir nulos
            $table->foreign('material_id')->references('id')->on('material')->nullable();
            $table->unsignedBigInteger('productos_id')->nullable(); // Permitir nulos
            $table->foreign('productos_id')->references('id')->on('productos')->nullable();
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
        Schema::dropIfExists('joyerias');
    }
};
