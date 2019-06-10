<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoActividadTitulacionUpdateRequest extends FormRequest
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
        $id = $this->tiposActividad;
        return [
            'nombre' => 'required|unique:tipo_actividad_titulacions,nombre,'.$id,
            'cantMax' => 'required|numeric|between:1,5',
            'duracion' => 'required|numeric|between:1,2',
            'organizacionExterna' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'  => 'Se necesita un nombre',
            'nombre.unique'  => 'Ya existe un tipo de actividad con este nombre',
            'cantMax.requiered'  => 'Se necesita una cantidad máxima de alumnos',
            'cantMax.numeric'  => 'La cantidad máxima de alumnos debe ser un número',
            'cantMax.between'  => 'La cantidad máxima de alumnos debe estar entre 1 y 5',
            'duracion.required' => 'Se necesita una duración',
            'duracion.numeric' => 'La duración debe ser un número',
            'duracion.between' => 'La duración no puede exceder los 2 semestres',
        ];
    }
}
