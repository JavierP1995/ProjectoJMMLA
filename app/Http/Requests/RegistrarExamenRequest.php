<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarExamenRequest extends FormRequest
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
            'fecha_examen' => 'required|date',
            'nota_obtenida' => 'required|numeric|between:1,7|regex:/^\d*(\.\d{1,2})?$/',
        ];
    }

    public function messages()
    {
        return [
            'fecha_examen.required'  => 'Se necesita una fecha',
            'fecha_examen.date'  => 'Fecha en formato incorrecto',
            'nota_obtenida.numeric' => 'La nota debe ser un numero',
            'nota_obtenida.required' => 'Se necesita una nota',
            'nota_obtenida.between' => 'La nota obtenida debe ser entre 1 y 7',
            'nota_obtenida.regex' => 'La nota obtenida debe tener punto(no coma) y maximo 2 decimales',
        ];
    }
}
