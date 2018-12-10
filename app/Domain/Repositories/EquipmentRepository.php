<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Equipment;
use Illuminate\Support\Fluent;

class EquipmentRepository extends RepositoryAbstract
{
    protected $model = Equipment::class;

    public function deleteEquipment($equipmentId): bool
    {
        return $this->createModel()->destroy($equipmentId);
    }

    public function findAllBy(array $filter)
    {
        $filter  = new Fluent($filter);
        $builder = $this->createModel()->where([]);

        if ($filter->{'assigned'}) {
            $builder->whereRaw('actual_user IS NOT NULL');
        }

        if ($filter->{'not_assigned'}) {
            $builder->whereRaw('actual_user IS NULL');
        }

        return $builder->get();
    }
}