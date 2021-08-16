<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('fotografia', 255);
            $table->string('especie', 255);
            $table->string('raza', 255);
            $table->string('edad', 255);
            $table->foreignId('vet_cliente_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('vet_mascotas');
    }
}
