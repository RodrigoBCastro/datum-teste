<?php

namespace App\Hash\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HashGenerateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'string' => 'required|string|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'string.required' => 'O campo string é obrigatório',
            'string.min' => 'O campo string precisa de no minimo 1 caracter',
        ];
    }
}
