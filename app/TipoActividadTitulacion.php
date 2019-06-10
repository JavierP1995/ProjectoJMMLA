<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoActividadTitulacion extends Model
{
    protected $fillable = [
        'nombre','cantMax','duracion','organizacionExterna','disponible'
    ];

    public function trabajos(){
        return $this->hasMany(TrabajoTitulacion::class,'tipoActividad_id');
    }
}
