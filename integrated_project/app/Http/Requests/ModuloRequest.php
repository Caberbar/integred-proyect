<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //We change this value to true, to be able to use validation in the forms
    }
    protected function prepareForValidation()
    {
        // Convertir valores de cadena a números
        $this->merge([
            'horas' => intval($this->horas),
            'curso' => intval($this->curso),
            'formacion_id' => intval($this->formacion_id),
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'horas'=>[
                'required',
                'min:1',
                'integer',
            ],
            'denominacion'=>[
                'required',
                'max:255',
                'min:5',
            ],
            'especialidad'=>[
                'required',
                'regex:/^(secundaria|formacion profesional)$/i',
            ],
            'siglas'=>[
                'required',
                'min:2',
            ],
            'curso'=>[
                'required',
                'numeric',
            ],
            'formacion_id' => [
                'required',
                'min:0',
                'integer',
            ],
        ];
    }
}
