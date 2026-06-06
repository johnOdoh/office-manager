<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum DocumentStatus: String implements HasColor
{
    case Pending = 'Pending';
    case Approved = 'Approved';
    case Rejected = 'Rejected';

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Approved => 'success',
            self::Rejected => 'danger',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn(self $status) => $status->value, self::cases());
    }
}
