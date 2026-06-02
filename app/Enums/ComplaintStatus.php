<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum ComplaintStatus: string implements HasColor
{
    case PENDING = 'Pending';
    case IN_PROGRESS = 'In Progress';
    case CLOSED = 'Closed';

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::IN_PROGRESS => 'info',
            self::CLOSED => 'success',
        };
    }

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
