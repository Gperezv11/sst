<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 255);
            $table->string('nombre', 255);
            $table->string('apellido_p', 255);
            $table->string('apellido_m', 255);
            $table->string('region', 255);
            $table->string('comuna', 255);
            $table->string('direccion', 255);
            $table->string('sector', 255);
            $table->string('correo', 255);
            $table->string('telefono', 255);
            $table->string('referencia', 255);
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
        Schema::dropIfExists('vet_clientes');
    }
}
