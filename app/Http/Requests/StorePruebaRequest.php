<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePruebaRequest extends FormRequest
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
            'pru_tipo' => 'required',
            'pru_descripcion' => 'required',
            'pru_fecha' => 'required|date|before:today',
            'pru_url' => 'required|image|max:2048',
            'sol_id' => 'required'
        ];
    }
}
