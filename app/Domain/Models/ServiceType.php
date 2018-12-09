<?php

namespace App\Domain\Models;

class ServiceType extends ModelAbstract
{
    const MANUTENCAO = 1;
    const DEVOLUCAO  = 2;
    const TROCA      = 3;

    public static function serviceTypesArray(): array
    {
        return [self::DEVOLUCAO, self::MANUTENCAO, self::TROCA];
    }
}
