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
        Schema::create('carrusel_items', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('producto_id'); // Relacionada con la tabla de productos
    $table->string('photo_path'); // Ruta de la imagen
    $table->string('title')->nullable(); // Título opcional para cada foto
    $table->text('description')->nullable(); // Descripción opcional para cada foto
    $table->boolean('active')->default(true);
    $table->timestamps();

    $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrusel_items');
    }
};
