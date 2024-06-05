<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChefUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'fb' => ['nullable', 'string', 'max:300'],
            'in' => ['nullable', 'string', 'max:300'],
            'x' => ['nullable', 'string', 'max:300'],
            'ig' => ['nullable', 'string', 'max:300'],
            'status' => ['required', 'boolean'],
            'show_at_home' => ['required', 'boolean']
        ];
    }
}
