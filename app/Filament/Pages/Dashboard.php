<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\OverviewStats;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            OverviewStats::class,
        ];
    }
}
