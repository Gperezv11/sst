<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichapersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichapersonals', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 50);
            $table->string('nombre', 50);
            $table->string('apellido_mat', 50);
            $table->string('apellido_pat', 50);
            $table->string('direccion', 50);
            $table->string('fono', 50);
            $table->string('mail', 50);
            $table->string('region', 50);
            $table->string('comuna', 50);
            $table->string('nacionalidad', 50);
            $table->string('empresa', 50);
            $table->string('cargo', 50);
            $table->string('supervisor', 50);
            $table->string('proyecto', 50);
            $table->string('sueldo_base', 50);
            $table->string('bono', 50);
            $table->string('asignacion', 50);
            $table->string('afp', 50);
            $table->string('salud', 50);
            $table->string('plan_salud', 50);
            $table->date('fecha_ingreso');
            $table->date('fecha_termino');
            $table->string('tipo_contrato', 50);
            $table->string('imagen', 50);
            $table->string('anexo', 50);
            $table->string('contrato',50);
            $table->string('finiquito', 50);
            $table->string('regla', 50);
            $table->string('imple', 50);
            $table->string('estadoficha',50);
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
        Schema::dropIfExists('fichapersonals');
    }
}
