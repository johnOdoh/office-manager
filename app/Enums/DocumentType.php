<?php

namespace App\Enums;

enum DocumentType: string
{
    case Report = 'Report';
    case Invoice = 'Invoice';
    case Expense_Claim = 'Expense Claim';
    case Purchase_Order = 'Purchase Order';
    case Reimbursement = 'Reimbursement';
    case Other = 'Other';

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $type) => [$type->value => $type->value])
            ->toArray();
    }
}
