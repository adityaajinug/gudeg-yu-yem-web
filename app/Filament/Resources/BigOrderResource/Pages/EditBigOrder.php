<?php

namespace App\Filament\Resources\BigOrderResource\Pages;

use App\Filament\Resources\BigOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBigOrder extends EditRecord
{
    protected static string $resource = BigOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
