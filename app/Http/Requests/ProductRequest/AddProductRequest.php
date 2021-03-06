<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                'name_en'=>'required|string|max:100',
                'name_ar'=>'required|string|max:100',
                'price'=>'required|numeric',
                'quantity'=>'required|numeric',
                'img'=>'required|image|mimes:jpg,jpeg,png,webp',
                'description_en'=>'required|string',
                'description_ar'=>'required|string',
                'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
                // "name.required" =>  __("validation.Name is required"),
                // "img.required" => __("validation.Image is required"),
                // "description.required" =>  __("validation.Description is required"),
                // "price.required" => __("validation.Price is required"),
        ];
    }
}
