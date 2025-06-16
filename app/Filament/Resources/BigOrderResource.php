<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BigOrderResource\Pages;
use App\Filament\Resources\BigOrderResource\RelationManagers;
use App\Models\BigOrder;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BigOrderResource extends Resource
{
    protected static ?string $model = BigOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
       return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('address')
                ->label('Address') // jika typo memang dari field, tetap pakai 'addreess'
                ->required()
                ->maxLength(255),

            DatePicker::make('date')
                ->required(),

            Textarea::make('description')
                ->nullable()
                ->maxLength(500),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
       ->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('address')
                ->label('Address')
                ->limit(30)
                ->wrap()
                ->sortable(),

            TextColumn::make('date')
                ->date('d M Y'),

            TextColumn::make('description')
                ->limit(40)
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBigOrders::route('/'),
            'create' => Pages\CreateBigOrder::route('/create'),
            'edit' => Pages\EditBigOrder::route('/{record}/edit'),
        ];
    }
}
