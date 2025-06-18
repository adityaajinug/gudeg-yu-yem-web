<?php 

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Menu;
use App\Models\SalesTransaction;
use App\Models\BigOrder;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverviewStats extends BaseWidget
{
    protected int|string|array $columnSpan = 12;
    protected function getCards(): array
    {
        return [
            Stat::make('Total Menus', Menu::count())
                ->description('Jumlah semua menu yang tersedia')
                ->color('success'),

            Stat::make('Total Sales', 'Rp ' . number_format(SalesTransaction::sum('total_price'), 0, ',', '.'))
                ->description('Jumlah pendapatan penjualan')
                ->color('primary'),

            Stat::make('Total Big Orders', BigOrder::count())
                ->description('Jumlah big order yang masuk')
                ->color('warning'),
        ];
    }
}
