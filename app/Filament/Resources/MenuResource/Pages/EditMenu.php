<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditMenu extends EditRecord
{
    protected static string $resource = MenuResource::class;
    protected bool $hasSavedNotification = false;
    
    protected function afterSave(): void
    {
        Notification::make()
            ->title('Menu berhasil diupdate')
            ->success()
            ->send();

        $this->redirect(MenuResource::getUrl('index'));
    }
}
