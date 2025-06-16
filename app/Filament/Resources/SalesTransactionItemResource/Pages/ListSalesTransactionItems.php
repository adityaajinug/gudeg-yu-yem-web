<?php

namespace App\Filament\Resources\SalesTransactionItemResource\Pages;

use App\Filament\Resources\SalesTransactionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesTransactionItems extends ListRecords
{
    protected static string $resource = SalesTransactionItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
