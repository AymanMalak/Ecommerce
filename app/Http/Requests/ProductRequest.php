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
     * @return array
     */
    public function rules()
    {
        return [
                'name'=>'required|string|max:100',
                'price'=>'required|numeric',
                'img'=>'required|image|mimes:jpg,jpeg,png,webp',
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
