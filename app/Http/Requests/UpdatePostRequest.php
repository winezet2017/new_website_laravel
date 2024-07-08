<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Adjust max file size as needed
            'is_featured' => 'sometimes|boolean',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
