<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O :attribute é obrigatório.',
            'title.required' => 'O título é obrigatório.',
            'description.required' => 'A descrição é obrigatória.',
        ];
    }
}