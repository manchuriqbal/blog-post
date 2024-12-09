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
        return [
        'author_id' =>['required', 'exists:users,id'],
        'title' => ['required', 'string', 'max:250'],
        'slug' => ['required', 'string', 'unique:posts,slug'],
        'content' => ['required', 'string'],
        'categories' => ['nullable', 'array', 'exists:categories,id'],
        'tags' => ['nullable', 'array', 'exists:tags,id'],
        'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp','max:2048']
        ];
    }
}
