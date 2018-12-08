<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Pearson extends Model
{
    protected $table = 'persons';

    public static function findBy(): Collection
    {
        return self::all();
    }
}
