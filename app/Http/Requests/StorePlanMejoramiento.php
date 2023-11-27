<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanMejoramiento extends FormRequest
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
            'email' => 'required|email',
            'descripcion' => 'required',
            'url_documento' => 'required|file',
            'Area' => 'required',
            'Fecha_inicial' => 'required|date',
            'Fecha_final' => 'required|date',
            'Instructor_responsable' => 'required',
            'Objetivo_del_plan' => 'required',
            'Indicadores_de_desempeno' => 'required',
        ];
    }
}
