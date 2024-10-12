<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'publisher' => 'required|string|max:255',
            'publication_year' => 'required|integer|digits:4',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'author.required' => 'O autor é obrigatório.',
            'isbn.required' => 'O ISBN é obrigatório.',
            'publisher.required' => 'O editora é obrigatório.',
            'publication_year.required' => 'O ano de publicação é obrigatório.',
        ];
    }
}
