<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicoUpdateRequest extends FormRequest
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
            'correo' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'  => 'Se necesita un nombre',
            'correo.required'  => 'Se necesita un correo',
            'correo.email'  => 'El correo no es válido',
        ];
    }
}
