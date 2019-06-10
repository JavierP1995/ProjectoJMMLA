<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscripcionFormalRequest extends FormRequest
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
            
            'numero_inscripcion' => 'unique:trabajo_titulacions,numero_inscripcion|required|integer|between:1,1000000000',
        ];
    }

    public function messages()
    {
        return [
            'numero_inscripcion.required'  => 'Se necesita el numero de inscripción',
            'numero_inscripcion.integer' => 'Debe ser un número entero',
            'numero_inscripcion.between' => 'Debe estar entre 1 y 1000000000',
            'numero_inscripcion.unique' => 'Ese número de inscripción ya existe',
        ];
    }
}
