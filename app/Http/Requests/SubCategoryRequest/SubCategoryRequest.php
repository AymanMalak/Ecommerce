<?php

namespace App\Http\Requests\SubCategoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
                'name_ar'=>'required|string|max:100',
                'name_en'=>'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
                // "name_ar.required" =>  __("name_ar is required"),
                // "name_en.required" =>  __("name_en is required"),
        ];
    }
}
