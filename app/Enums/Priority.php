<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;

enum Priority: string implements HasColor
{
    case Low = 'Low';
    case Medium = 'Medium';
    case High = 'High';
    case Urgent = 'Urgent';

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Low => 'info',
            self::Medium => 'primary',
            self::High => 'warning',
            self::Urgent => 'danger',
        };
    }

    public function getColorClass(): string | array | null
    {
        return match ($this) {
            self::Low => 'bg-green-100 text-green-700',
            self::Medium => 'bg-yellow-100 text-yellow-700',
            self::High => 'bg-red-100 text-red-700',
            self::Urgent => 'bg-purple-100 text-purple-700',
        };
    }

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
