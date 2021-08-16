<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_medicos', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 255)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->string('apellido_p', 255)->nullable();
            $table->string('apellido_m', 255)->nullable();
            $table->string('especialidad', 255)->nullable();
            $table->string('codigo', 255)->nullable();
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
        Schema::dropIfExists('vet_medicos');
    }
}
