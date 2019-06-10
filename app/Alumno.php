<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'rut','nombre','correo','telefono','disponible','carrera_id'
    ];

    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }

    public function trabajos(){
        return $this->belongsToMany(TrabajoTitulacion::class,'alumno_trabajo_titulacion');
    }
}
