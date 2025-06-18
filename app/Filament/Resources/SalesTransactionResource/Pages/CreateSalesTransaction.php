<?php

namespace App\Filament\Resources\SalesTransactionResource\Pages;

use App\Filament\Resources\SalesTransactionResource;
use App\Models\Menu;
use Filament\Actions;
use Filament\Notifications\Notification;
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

        foreach ($this->record->items as $item) {
            $menu = Menu::find($item->menu_id);

            if (!$menu) {
                Notification::make()
                    ->title('Menu tidak ditemukan')
                    ->body("Menu dengan ID {$item->menu_id} tidak ditemukan.")
                    ->danger()
                    ->send();
                continue;
            }

            if ($item->quantity > $menu->stock) {
                Notification::make()
                    ->title('Stok tidak mencukupi')
                    ->body("Stok untuk menu {$menu->menu_name} hanya {$menu->stock}, tetapi diminta {$item->quantity}.")
                    ->warning()
                    ->send();
                continue;
            }

            $menu->stock -= $item->quantity;
            $menu->save();
        }
    }
}
