<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAprendizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'apr_identificacion' => 'required',
            'apr_nombres' => 'required',
            'apr_apellidos' => 'required',
            'apr_email' => 'required',
            'apr_telefono' => 'required',
            'apr_direccion' => 'required',
            'apr_fechaNacimiento' => 'required',
            'fic_id' => 'required'
        ];
    }
}