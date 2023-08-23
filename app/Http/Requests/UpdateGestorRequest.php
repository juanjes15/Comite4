<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGestorRequest extends FormRequest
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
            'apr_nombres' => 'required',
            'pro_codigo' => 'required',
            'sol_estado' => 'required',
            'pro_id' => 'required',
            'apr_id' => 'required',
            'sol_id' => 'required',
        ];
    }
}
