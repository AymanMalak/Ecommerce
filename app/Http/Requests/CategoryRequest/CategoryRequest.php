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
                'name'=>'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
                "name.required" =>  __("name is required"),
        ];
    }
}
