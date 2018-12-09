<?php

namespace App\Domain\Models;

class Service extends ModelAbstract
{
    protected $primaryKey = 'id';
    protected $table = 'services';
    protected $fillable = ['description', 'service_type_id', 'person_id', 'equipment_id', 'user_id'];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id', 'id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
