<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoStoreRequest extends FormRequest
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
            'rut' => 'required|unique:academicos,rut|cl_rut|unique_with:alumnos,carrera_id|regex:/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/',
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' =>'nullable|numeric|between:40000000,99999999',
            'carrera_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'Se necesita un rut',
            'rut.cl_rut' => 'El rut no es válido',
            'rut.unique_with' => 'Ya existe un alumno con este rut y esta carrera',
            'rut.regex' => 'El formato del rut es con puntos y guion',
            'rut.unique' => 'Este rut no es un alumno',
            'nombre.required'  => 'Se necesita un nombre',
            'correo.required'  => 'Se necesita un correo',
            'correo.email'  => 'El correo no es válido',
            'telefono.numeric' =>'El teléfono debe ser un número',
            'telefono.between' =>'El teléfono indicado no existe',
            'carrera_id.required' => 'El alumno debe estar en una carrera',
        ];
    }
    
}
