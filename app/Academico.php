<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academico extends Model
{
    protected $fillable = [
        'rut','nombre','correo','disponible'
    ];

    public function guia(){
        return $this->belongsToMany(TrabajoTitulacion::class,'guia_trabajo_titulacion');
    }

    public function corrector(){
        return $this->belongsToMany(TrabajoTitulacion::class,'corrector_trabajo_titulacion');
    }
}
