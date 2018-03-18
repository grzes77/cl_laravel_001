<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'pole imie jest wymagane',
            'name.unique' => 'pole imie musi byc unikalne',
            'email.required' => 'pole mail jest wymagane',
            'email.email' => 'pole mail nie zawiera maila',
            'email.unique' => 'baza zawiera juz takiego maila',
            'password.required' => 'pole haslo jest wymagane'
        ];
    }
}
