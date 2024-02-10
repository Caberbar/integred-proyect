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
            'denomination'=>[
                'required',
                'max:255',
                'min:3'
            ],
            'academic_year'=>[
                'required',
                'integer',
                'min:1',
            ],
            'school_year'=>[
                'required',
                'date',
                'before:2024-01-01'
            ],
            'shift'=>[
                'required',
                'max:255',
                'min:3',
                'regex:/^[a-zA-Z]$/i'
            ]
        ];
    }
}
