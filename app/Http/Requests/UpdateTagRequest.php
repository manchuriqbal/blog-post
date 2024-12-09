<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
        $tagId = $this->route('tag') ? $this->route('tag')->id : null;

        return [
            'name' => ['required', 'string', 'max:250'],
            'slug' => ['required', 'string', 'unique:tags,slug' . ($tagId ? ','.$tagId : ''),],
        ];
    }
}
