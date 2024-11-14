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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
    $table->string('logo_url')->nullable(); // Permitir nulos
    $table->string('productos_titulo')->nullable(); // Permitir nulos
    $table->string('producto1_titulo')->nullable(); // Permitir nulos
    $table->string('producto1_foto')->nullable(); // Permitir nulos
    $table->string('producto1_texto')->nullable(); // Permitir nulos
    $table->string('producto1_link_boton')->nullable(); // Permitir nulos
    $table->string('producto2_titulo')->nullable(); // Permitir nulos
    $table->string('producto2_foto')->nullable(); // Permitir nulos
    $table->string('producto2_texto')->nullable(); // Permitir nulos
    $table->string('producto2_link_boton')->nullable(); // Permitir nulos
    $table->string('producto3_titulo')->nullable(); // Permitir nulos
    $table->string('producto3_foto')->nullable(); // Permitir nulos
    $table->string('producto3_texto')->nullable(); // Permitir nulos
    $table->string('producto3_link_boton')->nullable(); // Permitir nulos
    $table->string('nosotros_foto1')->nullable(); // Permitir nulos
    $table->string('nosotros_texto1')->nullable(); // Permitir nulos
    $table->string('nosotros_foto2')->nullable(); // Permitir nulos
    $table->string('nosotros_texto2')->nullable(); // Permitir nulos
    $table->unsignedBigInteger('piezas_id')->nullable(); // Permitir nulos
    $table->foreign('piezas_id')->references('id')->on('piezas')->nullable();
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
        Schema::dropIfExists('homes');
    }
};
