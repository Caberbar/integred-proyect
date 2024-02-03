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
        return false; // We leave this field false, because you are not authorized to perform any operation
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hours'=>[
                'required',
                'date',
                'before:2024-01-01'
            ],
            'denomination'=>[
                'required',
                'max:255',
                'min:3'
            ],
            'specialty'=>[
                'required',
                'regex:/^(secundaria|formacion profesional)$/i',
            ],
            'acronym'=>[
                'required',
                'regex:/^(A-Z){3}$/i',
            ],
            'academic_year_year'=>[
                'required',
                'integer',
                'min:1',
            ]
        ];
    }
}
