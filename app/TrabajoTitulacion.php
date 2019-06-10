<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;

class TrabajoTitulacion extends Model
{
    protected $fillable = [
        'nombre','inicio','termino','estado','semestre_año_inscripcion','numero_inscripcion','fecha_examen','nota_obtenida','tipoActividad_id','tutor_id'
    ];

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,'alumno_trabajo_titulacion');
    }

    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }

    public function guias(){
        return $this->belongsToMany(Academico::class, 'guia_trabajo_titulacion');
    }

    public function correctores(){
        return $this->belongsToMany(Academico::class, 'corrector_trabajo_titulacion');
    }

    public function tipoActividad(){
        return $this->belongsTo(TipoActividadTitulacion::class,'tipoActividad_id');
    }
}
