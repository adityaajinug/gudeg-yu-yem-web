<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('menu_name')->required(),
            TextInput::make('stock')->numeric()->required(),
            TextInput::make('price')->numeric()->required(),
            TextInput::make('discount')->numeric()->default(0),
            FileUpload::make('image_path')
                ->label('Gambar Menu')  
                ->image()
                ->directory('menus')
                ->disk('public')
                ->preserveFilenames()
                ->downloadable()
                ->previewable()
                ->imagePreviewHeight('250')
                ->openable()
                ->required(),
            Textarea::make('description')->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                ->label('Gambar')
                ->disk('public') // sesuaikan jika kamu pakai disk lain
                ->rounded() // untuk membuat gambar berbentuk bulat
                ->height(60) // opsional: tinggi gambar
                ->width(60), // opsional: lebar gambar
                TextColumn::make('menu_name')->label('Menu')->searchable()->sortable(),
                TextColumn::make('stock')->numeric()->sortable(),
                TextColumn::make('price')->label('Harga')->money('IDR', true)->sortable(),
                TextColumn::make('discount')->label('Diskon')->money('IDR', true)->sortable(),
                TextColumn::make('description')->limit(30)->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\ViewAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getRelations(): array
    {
        return [
                //
            ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
