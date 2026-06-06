<?php

namespace App\Filament\Resources\Documents\Schemas;

use App\Enums\DocumentStatus;
use App\Enums\DocumentType;
use App\Enums\Priority;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sender')
                    ->required()
                    ->numeric(),
                TextInput::make('recipient')
                    ->required()
                    ->numeric(),
                TextInput::make('description'),
                TextInput::make('file')
                    ->required(),
                Select::make('type')
                    ->options(DocumentType::class)
                    ->required(),
                Select::make('priority')
                    ->options(Priority::class)
                    ->default('Low')
                    ->required(),
                Select::make('status')
                    ->options(DocumentStatus::class)
                    ->default('Pending')
                    ->required(),
            ]);
    }
}
