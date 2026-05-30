<?php

namespace App\Enums;

enum ComplaintStatus: string
{
    case PENDING = 'Pending';
    case IN_PROGRESS = 'In Progress';
    case CLOSED = 'Closed';

    public static function toArray(): array
    {
        return array_map(fn(self $status) => $status->value, self::cases());
    }

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $status) => [$status->value => $status->value])
            ->toArray();
    }
}
