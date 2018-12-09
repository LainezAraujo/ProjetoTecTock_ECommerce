<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PersonPostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'name' => ['required'],
            'cpf' => ['required'],
            'cargo' => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return view('person.create')->withErrors($validator);
    }
}