<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'pole nazwa wymagane',
            'name.email' => 'pole musi byc mail'
            ];
    }
}
