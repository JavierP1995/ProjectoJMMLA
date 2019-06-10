<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoUpdateRequest extends FormRequest
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
        $id = $this->alumno;
        return [
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' =>'nullable|numeric|between:40000000,99999999',
            'carrera_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required'  => 'Se necesita un nombre',
            'correo.required'  => 'Se necesita un correo',
            'correo.email'  => 'El correo no es válido',
            'telefono.numeric' =>'El teléfono debe ser un número',
            'telefono.between' =>'El teléfono indicado no existe',
            'carrera_id.required' => 'El alumno debe estar en una carrera',
        ];
    }
}
