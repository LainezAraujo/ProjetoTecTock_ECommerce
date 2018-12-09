<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Service;

class ServiceRepository extends RepositoryAbstract
{
    protected $model = Service::class;

    public function deleteService($serviceId): bool
    {
        return $this->createModel()->destroy($serviceId);
    }
}