<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryAreaCreateRequest extends FormRequest
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
            'area_name' => ['required', 'max:255'],
            'min_delivery_time' => ['required', 'max:50'],
            'max_delivery_time' => ['required', 'max:50'],
            'delivery_cost' => ['required', 'numeric'],
            'status' => ['required', 'boolean']
        ];
    }
}
