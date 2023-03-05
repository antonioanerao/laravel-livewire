<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product.name' => 'required', 'product.description' => 'required', 'product.category_id' => 'required',
            'product.color' => 'nullable', 'product.in_stock' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'product.category_id.required' => 'Choose one category'
        ];
    }
}
