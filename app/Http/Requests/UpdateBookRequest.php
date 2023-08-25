<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'descr' => 'required|string|max:255'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required!',
            'author.required' => 'Author is required!',
            'descr.required' => 'Description is required!',
        ];
    }
}
