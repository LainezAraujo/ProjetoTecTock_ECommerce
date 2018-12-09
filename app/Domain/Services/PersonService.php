<?php

namespace App\Domain\Services;

use App\Domain\Models\Person;
use App\Domain\Repositories\PersonRepository;
use App\Domain\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Fluent;

class PersonService
{
    /**
     * @var PersonRepository
     */
    private $personRepository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->personRepository = $repository;
    }

    public function findBy(array $filter): Collection
    {
        return $this->personRepository->findAll($filter);
    }

    public function create(array $data): Person
    {
        return $this->personRepository->create($data);
    }

    public function delete($personId): bool
    {
        return $this->personRepository->deletePerson($personId);
    }

    public function findOneById($personId): Person
    {
        return $this->personRepository->findOneBy('id', $personId);
    }

    public function update(array $data, $id)
    {
        $data = new Fluent($data);

        $person        = $this->findOneById($id);
        $person->name  = $data->{'name'};
        $person->cpf   = $data->{'cpf'};
        $person->cargo = $data->{'cargo'};

        return $this->personRepository->update($person);
    }
}