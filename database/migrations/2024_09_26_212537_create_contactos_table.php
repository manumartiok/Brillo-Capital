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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('redsocial_icono')->nullable(); // Permitir nulos
            $table->string('redsocial_texto')->nullable(); // Permitir nulos
            $table->string('redsocial_link')->nullable(); // Permitir nulos
            $table->string('direccion')->nullable(); // Permitir nulos
            $table->unsignedBigInteger('piezas_id')->nullable(); // Permitir nulos
            $table->foreign('piezas_id')->references('id')->on('piezas')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('contactos');
    }
};
