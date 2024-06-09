<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            'phone_1' => ['nullable', 'max:24'],
            'phone_2' => ['nullable', 'max:24'],
            'email_1' => ['nullable', 'email', 'max:255'],
            'email_2' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'max:1000'],
            'map_address_link' => ['nullable'],
        ];
    }
}
