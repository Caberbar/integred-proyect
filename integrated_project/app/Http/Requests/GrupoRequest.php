<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //We change this value to true, to be able to use validation in the forms
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'denominacion'=>[
                'required',
                'max:255',
                'min:3'
            ],
            'curso_escolar'=>[
                'required',
                'regex:/^\d{4}\/\d{4}$/i',
            ],
            'curso'=>[
                'required',
            ],
            'turno'=>[
                'required',
                'max:255',
                'regex:/^(Mañana|Tarde)$/i'
            ],
            'formacion_id' => 'required',
        ];
    }
}
