<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'nullable',
            'customer_name' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phone' => 'required',
            'address' => 'required',
            'division_id' => 'nullable',
            'district_id' => 'nullable',
            'upazila_id' => 'nullable',
            'thana' => 'nullable|string',
            'payment_method' => 'nullable',
            'landmark' => 'nullable',
            'shipping_charge' => 'nullable|numeric',
            'grand_total' => 'required',
            'sub_total' => 'nullable',
            'payable_amount' => 'nullable|numeric',
            'due_amount' => 'nullable|numeric',
            'coupon_code' => 'nullable',
            'discount_amount' => 'nullable',
            'invoice_number' => 'nullable|unique:orders',
            'status' => 'nullable',
        ];
    }
}
