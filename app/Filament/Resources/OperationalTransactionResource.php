<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationalTransactionResource\Pages;
use App\Filament\Resources\OperationalTransactionResource\RelationManagers;
use App\Models\OperationalTransaction;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OperationalTransactionResource extends Resource
{
    protected static ?string $model = OperationalTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([TextInput::make('operational_name')->label('Nama Operasional')->required()->maxLength(255), TextInput::make('price')->label('Harga')->numeric()->required(), Textarea::make('description')->label('Deskripsi')->nullable()]);
    }

    public static function table(Table $table): Table
    {
         return $table->columns([
                TextColumn::make('operational_name')
                    ->label('Nama Operasional')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', true)
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(30)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListOperationalTransactions::route('/'),
            'create' => Pages\CreateOperationalTransaction::route('/create'),
            'edit' => Pages\EditOperationalTransaction::route('/{record}/edit'),
        ];
    }
}
