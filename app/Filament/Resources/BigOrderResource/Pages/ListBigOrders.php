<?php

namespace App\Filament\Resources\BigOrderResource\Pages;

use App\Filament\Resources\BigOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBigOrders extends ListRecords
{
    protected static string $resource = BigOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
