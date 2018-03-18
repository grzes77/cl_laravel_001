<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'pole tytul wymagane',
            'body.required' => 'pole tresc wymagane '
        ];
    }
}
