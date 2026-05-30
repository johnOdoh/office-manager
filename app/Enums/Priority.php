<?php

namespace App\Enums;

enum Priority: string
{
    case Low = 'Low';
    case Medium = 'Medium';
    case High = 'High';
    case Urgent = 'Urgent';

    public static function toArray(): array
    {
        return array_map(fn(self $priority) => $priority->value, self::cases());
    }

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $priority) => [$priority->value => $priority->value])
            ->toArray();
    }
}
