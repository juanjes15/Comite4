<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSolicitudComiteRequest extends FormRequest
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
            'sol_fecha' => 'required',
            'sol_lugar' => 'required',
            'sol_asunto' => 'required',
            'sol_motivo' => 'required',
            'sol_estado' => 'required',
            'ins_id' => 'required'
        ];
    }
}