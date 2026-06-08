<?php

namespace App\Enums;

enum Department: string
{
    case HR = 'HR';
    case IT = 'IT';
    case Finance = 'Finance';
    case Marketing = 'Marketing';
    case Admin = 'Admin';

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $dept) => [$dept->value => $dept->value])
            ->toArray();
    }
}
