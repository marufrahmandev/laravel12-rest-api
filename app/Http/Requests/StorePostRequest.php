<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:3',
            'author_id' => 'required|exists:users,id',
            // 'tags' => 'required|array',
            // 'tags.*' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        // return [
        //     'title' => 'The title field is required.',
        //     'content' => 'The content field is required.',
        //     'author_id' => 'The author field is required.'
        // ];

        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.min' => 'The title field must be at least :min characters.',
            'content.required' => 'The content field is required.',
            'content.string' => 'The content field must be a string.',
            'content.min' => 'The content field must be at least :min characters.',
            'author_id.required' => 'The author field is required.',
            'author_id.exists' => 'The author field must be a valid user.',
            // 'tags.array' => 'The tags field must be an array.',
            // 'tags.*.string' => 'The tags field must be a string.',
            // 'tags.*.min' => 'The tags field must be at least :min characters.',
        ];
    }
}
