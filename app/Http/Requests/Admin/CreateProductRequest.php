<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:products|max:100',
            'category_id' => 'required',
            'price' => 'required|number',
            'quantity' => 'required|number|min:1',
            'sale_off' => 'required|number',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            'sale_off' => 'required|numeric'
        ];
    }
}
