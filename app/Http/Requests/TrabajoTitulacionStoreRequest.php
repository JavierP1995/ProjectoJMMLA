<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\TipoActividadTitulacion;


class TrabajoTitulacionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
