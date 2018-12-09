<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PersonPostRequest extends FormRequest
{
    public function autorize()
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
}