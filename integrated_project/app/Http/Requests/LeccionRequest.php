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
            ]
        ];
    }
}
