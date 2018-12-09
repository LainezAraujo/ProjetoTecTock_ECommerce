<?php

namespace App\Domain\Services;

use App\Domain\Models\Service;
use App\Domain\Repositories\RepositoryInterface;
use App\Domain\Repositories\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Fluent;

class ServicoService
{
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->serviceRepository = $repository;
    }

    public function findBy(array $filter): Collection
    {
        return $this->serviceRepository->findAll($filter);
    }

    public function create(array $data): Service
    {
        return $this->serviceRepository->create($data);
    }

    public function delete($serviceId): bool
    {
        return $this->serviceRepository->deleteService($serviceId);
    }

    public function findOneById($serviceId): Service
    {
        return $this->serviceRepository->findOneBy('id', $serviceId);
    }

    public function update(array $data, $id)
    {
        $data = new Fluent($data);

        $equipment              = $this->findOneById($id);
        $equipment->name        = $data->{'name'};
        $equipment->description = $data->{'description'};
        $equipment->service_tag = $data->{'service_tag'};

        return $this->serviceRepository->update($equipment);
    }
}