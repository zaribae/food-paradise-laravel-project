<?php

namespace App\Http\Requests\Frontend;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $addressId = $this->route('addressId');

        $address = Address::find($addressId);

        return $address && $address->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'area_name' => ['required', 'integer'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['nullable', 'max:255'],
            'phone_number' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required'],
            'type' => ['required', 'in:home,office']
        ];
    }
}
