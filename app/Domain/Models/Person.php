<?php

namespace App\Domain\Models;

/**
 * @property string name
 * @property int id
 * @property mixed cpf
 * @property mixed cargo
 */
class Person extends ModelAbstract
{
    protected $primaryKey = 'id';
    protected $table = 'persons';
    protected $fillable = ['name', 'cpf', 'cargo'];

    public function rules()
    {
        return [
            'name'  => 'required',
            'cpf'   => ['required'],
            'cargo' => ['required']
        ];
    }
}
