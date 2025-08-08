<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QtyBasedPriceRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quantity' => 'required',
            'price' => 'nullable',
            'product_id' => 'nullable',
            'save_price' => 'nullable',
            'more_qty' => 'nullable',
            'title' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
