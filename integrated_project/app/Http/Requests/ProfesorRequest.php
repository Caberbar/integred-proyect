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
            'name'=>[
                'required',
                'max:30',
                'min:3',
                'alpha:ascii',
            ],
            'first_name' => [
                'required',
                'max:50',
                'min:3',
                'alpha:ascii',
            ],
            'second_last_name'=>[
                'required',
                'max:50',
                'min:3',
                'alpha:ascii',
            ],
            'specialty'=>[
                'required',
                'regex:/^(secundaria|formacion profesional)$/i',
            ],
            'user_seneca'=>[
                'regex:/^[A-Za-z]{7}\d{3}$/'
            ]
        ];
    }
}
