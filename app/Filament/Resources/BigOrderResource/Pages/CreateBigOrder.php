<?php

namespace App\Filament\Resources\BigOrderResource\Pages;

use App\Filament\Resources\BigOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBigOrder extends CreateRecord
{
    protected static string $resource = BigOrderResource::class;
}
