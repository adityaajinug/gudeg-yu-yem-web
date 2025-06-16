<?php

namespace App\Filament\Resources\SalesTransactionResource\Pages;

use App\Filament\Resources\SalesTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesTransaction extends CreateRecord
{
    protected static string $resource = SalesTransactionResource::class;

    protected function afterCreate(): void
    {
        $this->record->update([
            'total_price' => $this->record->items->sum(function ($item) {
                return (int) $item->price * (int) $item->quantity;
            }),
        ]);
    }
}
