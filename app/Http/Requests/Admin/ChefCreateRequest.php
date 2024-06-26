<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChefCreateRequest extends FormRequest
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
            'image' => ['required', 'image', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'fb' => ['nullable', 'url'],
            'in' => ['nullable', 'url'],
            'x' => ['nullable', 'url'],
            'ig' => ['nullable', 'url'],
            'status' => ['required', 'boolean'],
            'show_at_home' => ['required', 'boolean']
        ];
    }
}
