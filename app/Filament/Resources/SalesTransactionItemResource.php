<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesTransactionItemResource\Pages;
use App\Filament\Resources\SalesTransactionItemResource\RelationManagers;
use App\Models\SalesTransactionItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalesTransactionItemResource extends Resource
{
    protected static ?string $model = SalesTransactionItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canViewAny(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSalesTransactionItems::route('/'),
            'create' => Pages\CreateSalesTransactionItem::route('/create'),
            'edit' => Pages\EditSalesTransactionItem::route('/{record}/edit'),
        ];
    }
}
