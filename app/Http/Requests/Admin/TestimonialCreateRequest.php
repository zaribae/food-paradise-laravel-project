<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialCreateRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'area' => ['required', 'max:255'],
            'review' => ['required', 'max:1000'],
            'rating' => ['required', 'integer', 'max:5'],
            'status' => ['required', 'boolean'],
            'show_at_home' => ['required', 'boolean'],
        ];
    }
}
