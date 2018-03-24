<?php

namespace App\Http\Requests;

use App\Rules\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsersEditRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                new UniqueEmail($request)
            ],
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'pole imie jest wymagane',
            'email.required' => 'pole mail jest wymagane',
            'email.email' => 'pole mail nie zawiera maila',
            'password.required' => 'pole haslo jest wymagane'

        ];
    }
}
