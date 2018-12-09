<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Equipment;

class EquipmentRepository extends RepositoryAbstract
{
    protected $model = Equipment::class;

    public function deleteEquipment($equipmentId): bool
    {
        return $this->createModel()->destroy($equipmentId);
    }
}