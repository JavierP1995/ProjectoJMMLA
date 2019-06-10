<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'nombre','org_id'
    ];

    public function organizacion(){
        return $this->belongsTo(OrganizacionExterna::class,'org_id');
    }

    public function trabajos(){
        return $this->hasMany(TrabajoTitulacion::class);
    }
}
