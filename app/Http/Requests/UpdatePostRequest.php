<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // Generate the slug from the name if it exists
        if ($this->title) {
            $this->merge([
                'slug' => (string) str($this->title)->slug(),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $postId = $this->route('post') ? $this->route('post')->id : null;

        return [
        'title' => ['required', 'string', 'max:250'],
        'slug' => ['required', 'string', Rule::unique('posts', 'slug')->ignore($postId),],
        'content' => ['required', 'string'],
        'categories' => ['nullable', 'array', 'exists:categories,id'],
        'tags' => ['nullable', 'array', 'exists:tags,id'],
        'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp','max:2048'],
        'status' => ['required', 'string', Rule::in(['draft', 'published', 'archived'])]
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        dd($validator->errors()); // Add this temporarily
    }
}
