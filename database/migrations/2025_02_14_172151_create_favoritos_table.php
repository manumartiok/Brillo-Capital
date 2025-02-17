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
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('web_user_id'); // Cambiado de 'user_id' a 'web_user_id'
            $table->unsignedBigInteger('producto_id'); 
            $table->timestamps();
        
            // Definir la clave foránea hacia 'web_users'
            $table->foreign('web_user_id')->references('id')->on('web_users')->onDelete('cascade');
        
            // Definir la clave foránea hacia 'productos'
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
        Schema::dropIfExists('favoritos');
    }
};
