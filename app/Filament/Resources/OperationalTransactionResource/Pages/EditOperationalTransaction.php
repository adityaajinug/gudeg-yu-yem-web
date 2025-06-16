<?php

namespace App\Filament\Resources\OperationalTransactionResource\Pages;

use App\Filament\Resources\OperationalTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOperationalTransaction extends EditRecord
{
    protected static string $resource = OperationalTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
