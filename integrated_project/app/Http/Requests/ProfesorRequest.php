<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //Valor TRUE para poder usarlo en los forms.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>[
                'required',
                'max:30',
                'min:3',
                'alpha:ascii',
            ],
            'apellido1' => [
                'required',
                'max:50',
                'min:3',
                'alpha:ascii',
            ],
            'apellido2'=>[
                'required',
                'max:50',
                'min:3',
                'alpha:ascii',
            ],
            'especialidad'=>[
                'required',
                'regex:/^(secundaria|formacion profesional)$/i',
            ],
            'usu_seneca'=>[
                'regex:/^[A-Za-z]{7}\d{3}$/'
            ]
        ];
    }
}
