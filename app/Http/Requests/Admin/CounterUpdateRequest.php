<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CounterUpdateRequest extends FormRequest
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
            'background' => ['nullable', 'image', 'max:2048'],
            'icon_one' => ['required', 'max:255'],
            'count_one' => ['required', 'integer'],
            'name_one' => ['required', 'max:255'],

            'icon_two' => ['required', 'max:255'],
            'count_two' => ['required', 'integer'],
            'name_two' => ['required', 'max:255'],

            'icon_three' => ['required', 'max:255'],
            'count_three' => ['required', 'integer'],
            'name_three' => ['required', 'max:255'],

            'icon_four' => ['required', 'max:255'],
            'count_four' => ['required', 'integer'],
            'name_four' => ['required', 'max:255'],
        ];
    }
}
