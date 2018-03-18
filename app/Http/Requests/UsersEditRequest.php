<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$this->user()->id,
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
