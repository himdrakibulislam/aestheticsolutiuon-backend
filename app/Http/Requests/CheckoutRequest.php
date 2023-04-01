<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cart' => [
                'required'
            ],
            'total' => [
                'required'
            ],
            'payment_type' => [
                'required'
            ],
            'name' => [
                'required'
            ],
            'phone' => [
                'required'
            ],
            'division' => [
                'required'
            ],
            'district' => [
                'required'
            ],
            'sub_district' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'zipcode' => [
                'required'
            ],
        ];
    }
}
