<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoActividadTitulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_actividad_titulacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',128);
            $table->integer('cantMax');
            $table->integer('duracion');
            $table->enum('organizacionExterna',['SI','NO'])->default('NO');
            $table->enum('disponible',['SI','NO'])->default('SI');
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
        Schema::dropIfExists('tipo_actividad_titulacions');
    }
}
