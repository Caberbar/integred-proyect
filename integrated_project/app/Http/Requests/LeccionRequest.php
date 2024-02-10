<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeccionRequest extends FormRequest
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
            'hours'=>[
                'required',
                'date',
                'before:2024-01-01'
            ]
        ];
    }
}
