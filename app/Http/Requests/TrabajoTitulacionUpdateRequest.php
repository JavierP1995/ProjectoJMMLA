<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajoTitulacionUpdateRequest extends FormRequest
{

    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'tipoActividad_id' => 'required',
            'inicio' => 'required|before:today',
            'termino' => 'required|after:inicio',
            'alumno_id.*' => 'distinct',
            'academico_id.*' => 'distinct', 
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'  => 'Se necesita un título',
            'tipoActividad_id.required'  => 'Se necesita un tipo de actividad',
            'inicio.required' => 'Ingrese la fecha de inicio',
            'termino.required' => 'Ingrese la fecha de termino',
            'inicio.before' => 'La fecha de inicio debe ser anterior a hoy',
            'termino.after' => 'La fecha de término debe ser despues de la fecha de inicio',
            'alumno_id.*.distinct' => 'Existe un alumno repetido',
            'academico_id.*.distinct' => 'Existe un profesor guía repetido',
        ];
    }
}
