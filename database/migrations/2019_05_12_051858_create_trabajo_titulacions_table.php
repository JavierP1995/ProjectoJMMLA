<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajoTitulacionsTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_titulacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',128);
            $table->date('inicio')->default('2019-08-18');
            $table->date('termino')->default('2020-08-18');
            $table->string('semestre_año_inscripcion',64)->default('1/2019');
            $table->enum('estado',['INGRESADA','ACEPTADA','FINALIZADA','ANULADA'])->default('INGRESADA');
            $table->integer('numero_inscripcion')->nullable();
            $table->date('fecha_examen')->nullable();
            $table->float('nota_obtenida',3,2)->nullable();
            $table->unsignedBigInteger('tipoActividad_id');
            $table->unsignedBigInteger('tutor_id')->nullable();

            $table->timestamps();

            $table->foreign('tipoActividad_id')->references('id')->on('tipo_actividad_titulacions')
                ->onUpdate('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')
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
        Schema::dropIfExists('trabajo_titulacions');
    }
}
