<?php

namespace App\Domain\Models;

use Illuminate\Validation\Rule;

/**
 * @property mixed name
 * @property mixed description
 * @property mixed service_tag
 * @property mixed actual_user
 * @property mixed old_user
 * @property mixed id
 */
class Equipment extends ModelAbstract
{
    protected $primaryKey = 'id';
    protected $table = 'equipment';
    protected $fillable = ['name', 'description', 'service_tag', 'actual_user', 'old_user'];

    public function rules()
    {
        return [
            'name'        => 'required',
            'description' => 'required',
            'service_tag' => 'required',
            'actual_user' => ['sometimes', Rule::exists('persons', 'id')],
            'old_user'    => ['sometimes', Rule::exists('persons', 'id')]
        ];
    }

    public function actualUser()
    {
        return $this->belongsTo(Person::class, 'actual_user', 'id');
    }

    public function oldUser()
    {
        return $this->belongsTo(Person::class, 'old_user', 'id');
    }
}
