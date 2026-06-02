<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum AnnouncementType: string implements HasColor
{
    case General = 'General';
    case Event = 'Event';
    case Policy_Update = 'Policy Update';
    case Urgent = 'Urgent';

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::General => 'success',
            self::Event => 'gray',
            self::Policy_Update => 'warning',
            self::Urgent => 'danger',
        };
    }

    public function getColorClass(): string | array | null
    {
        return match ($this) {
            self::General => 'bg-green-100 text-green-700',
            self::Event => 'bg-gray-100 text-gray-700',
            self::Policy_Update => 'bg-yellow-100 text-yellow-700',
            self::Urgent => 'bg-red-100 text-red-700',
        };
    }

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $type) => [$type->value => $type->value])
            ->toArray();
    }
}
