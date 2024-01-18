<?php

namespace App\Http\Requests\Admin\Shop\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'required|file',
            'description' => 'required|string',
            'game_item_id' => 'required|integer',
            'price' => 'required|integer',
            'is_published' => 'required|boolean',
            'category_id' => 'nullable|integer|exists:product_categories,id'
        ];
    }
}
