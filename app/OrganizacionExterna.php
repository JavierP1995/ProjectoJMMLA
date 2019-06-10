<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizacionExterna extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function tutores(){
        return $this->hasMany(Tutor::class,'org_id');
    }
}
