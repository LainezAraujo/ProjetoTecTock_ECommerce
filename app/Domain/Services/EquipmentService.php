<?php

namespace App\Domain\Services;

use App\Domain\Models\Equipment;
use App\Domain\Repositories\EquipmentRepository;
use App\Domain\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Fluent;

class EquipmentService
{
    /**
     * @var EquipmentRepository
     */
    private $equipmentRepository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->equipmentRepository = $repository;
    }

    public function findBy(array $filter): Collection
    {
        return $this->equipmentRepository->findAll($filter);
    }

    public function create(array $data): Equipment
    {
        return $this->equipmentRepository->create($data);
    }

    public function delete($equipmentId): bool
    {
        return $this->equipmentRepository->deleteEquipment($equipmentId);
    }

    public function findOneById($equipmentId): Equipment
    {
        return $this->equipmentRepository->findOneBy('id', $equipmentId);
    }

    public function update(array $data, $id)
    {
        $data = new Fluent($data);

        $equipment              = $this->findOneById($id);
        $equipment->name        = $data->{'name'};
        $equipment->description = $data->{'description'};
        $equipment->service_tag = $data->{'service_tag'};

        return $this->equipmentRepository->update($equipment);
    }

    public function updateOnlyUsers(Equipment $equipment)
    {
        return $this->equipmentRepository->update($equipment);
    }
}