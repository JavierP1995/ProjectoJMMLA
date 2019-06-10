<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicoStoreRequest extends FormRequest
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
            'rut' => 'required|unique:academicos,rut|unique:alumnos,rut|cl_rut|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/',
            'nombre' => 'required',
            'correo' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'Se necesita un rut',
            'rut.cl_rut' => 'El rut no es válido',
            'rut.regex' => 'El formato del rut es con puntos y guion',
            'rut.unique' => 'Ya existe este rut',
            'nombre.required'  => 'Se necesita un nombre',
            'correo.required'  => 'Se necesita un correo',
            'correo.email'  => 'El correo no es válido',
        ];
    }
}
