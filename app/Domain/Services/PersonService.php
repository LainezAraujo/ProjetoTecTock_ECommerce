<?php
/**
 * Created by PhpStorm.
 * User: Vanir
 * Date: 08/12/2018
 * Time: 20:14
 */

namespace App\Domain\Services;


use App\Domain\Models\Person;
use App\Domain\Repositories\PersonRepository;
use App\Domain\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
}