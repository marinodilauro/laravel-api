<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|min:5|max:150',
            'description' => 'nullable|max:250',
            'thumb' => 'nullable|image|max:1000',
            'project_link' => 'nullable|max:255',
            'repo_link' => 'nullable|max:255',
            'thumb' => 'nullable|image|max:1000'
        ];
    }
}
