<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTrabajoTitulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_trabajo_titulacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('trabajo_titulacion_id');
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('trabajo_titulacion_id')->references('id')->on('trabajo_titulacions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_trabajo_titulacion');
    }
}
