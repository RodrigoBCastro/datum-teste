<?php

namespace App\Hash\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HashListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'trys' => 'nullable|string|min:1',
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
