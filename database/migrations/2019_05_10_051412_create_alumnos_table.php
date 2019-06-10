<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut',16);
            $table->string('nombre',128);
            $table->string('correo',128);
            $table->integer('telefono')->nullable();
            $table->enum('disponible',['SI','NO'])->default('SI');
            $table->enum('titulado',['SI','NO'])->default('NO');
            $table->unsignedBigInteger('carrera_id'); //carrera actual
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras')
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
        Schema::dropIfExists('alumnos');
    }
}
