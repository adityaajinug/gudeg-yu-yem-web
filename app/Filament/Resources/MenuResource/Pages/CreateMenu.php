<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Menu berhasil ditambahkan!')
            ->success()
            ->send();

        $this->redirect(MenuResource::getUrl('index'));
    }
}
