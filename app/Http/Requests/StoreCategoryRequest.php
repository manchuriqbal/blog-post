<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        if ($this->name) {
            $this->merge([
                'slug' => (string) str($this->name)->slug(),
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
            'name' => [
                'required',
                'string',
                'max:250',
                'unique:categories,name'
            ],
            'slug' => [
                'required',
                'string',
                'max:250',
                'unique:categories,slug'
            ],
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],
            'parent_id' => [
                'nullable',
                'integer',
                'exists:categories,id'
            ],
            'active' => [
                'boolean'
            ]
        ];

    }
}
