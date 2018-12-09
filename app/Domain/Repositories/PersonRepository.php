<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Person;

class PersonRepository extends RepositoryAbstract
{
    protected $model = Person::class;

    public function deletePerson($personId): bool
    {
        return $this->createModel()->destroy($personId);
    }
}