<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                'name'=>'required|string|max:100',
                'price'=>'required|numeric',
                'quantity'=>'required|numeric',
                'img'=>'nullable|image|mimes:jpg,jpeg,png,webp',
                'description'=>'required|string',
                'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
                "name.required" =>  __("name is required"),
                "img.required" => __("img is required"),
                "description.required" =>  __("description is required"),
                "price.required" => __("price is required"),
        ];
    }
}
