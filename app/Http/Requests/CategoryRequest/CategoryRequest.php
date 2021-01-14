<?php

namespace App\Http\Requests\CategoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
                "name_ar.required" =>  __("name_ar is required"),
                "name_en.required" =>  __("name_en is required"),
        ];
    }
}
