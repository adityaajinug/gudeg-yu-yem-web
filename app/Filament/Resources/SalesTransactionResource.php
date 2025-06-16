<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesTransactionResource\Pages;
use App\Filament\Resources\SalesTransactionResource\RelationManagers;
use App\Models\Menu;
use App\Models\SalesTransaction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class SalesTransactionResource extends Resource
{
    protected static ?string $model = SalesTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            DateTimePicker::make('transaction_date')->default(now())->required(),

            TextInput::make('total_price')->label('Total Harga')->numeric()->required()->disabled()->dehydrated(),

            Repeater::make('items')
                ->relationship()
                ->schema([
                    Select::make('menu_id')->label('Menu')->relationship('menu', 'menu_name')->required()->reactive()->afterStateUpdated(fn($state, callable $set) => $set('price', Menu::find($state)?->price ?? 0)),

                    TextInput::make('quantity')
                        ->numeric()
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $price = $get('price') ?? 0;
                            $set('subtotal', (int) $price * (int) $state);
                        }),

                    TextInput::make('price')->numeric()->disabled()->dehydrated(),

                    TextInput::make('subtotal')->numeric()->required()->disabled()->dehydrated(),
                ])
                ->columns(2)
                ->required()
                ->afterStateUpdated(function (callable $get, callable $set) {
                    $items = $get('items') ?? [];

                    $total = collect($items)->sum(function ($item) {
                        return (int) ($item['price'] ?? 0) * (int) ($item['quantity'] ?? 0);
                    });

                    $set('total_price', $total);
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        $total = SalesTransaction::sum('total_price');
        $formattedTotal = 'Total: Rp ' . number_format($total, 0, ',', '.');
        return $table
            ->columns([TextColumn::make('id')->label('No Transaksi')->sortable()->searchable(), TextColumn::make('transaction_date')->label('Tanggal Transaksi')->dateTime('d M Y H:i')->sortable(), TextColumn::make('total_price')->label('Total Harga')->money('IDR', true)->sortable(), TextColumn::make('items_count')->label('Jumlah Item')->counts('items')->sortable()])
            ->filters([
                // nanti bisa tambahkan filter tanggal, range harga, dsb
            ])
            ->headerActions([
                Action::make('total_display')
                ->label($formattedTotal)
                ->disabled()
                ->color('gray')
                ->button(),
                Action::make('cetak_laporan')
                    ->label('Cetak Laporan')
                    ->icon('heroicon-o-printer')
                    ->form([DatePicker::make('start_date')->label('Dari Tanggal')->required(), DatePicker::make('end_date')->label('Sampai Tanggal')->required()])
                    ->action(function (array $data) {
                        return redirect()->route('laporan.sales.pdf', [
                            'start_date' => $data['start_date'],
                            'end_date' => $data['end_date'],
                        ]);
                    }),
            ])
            ->actions([Tables\Actions\ViewAction::make(), Tables\Actions\EditAction::make(), 
            Tables\Actions\DeleteAction::make(),])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListSalesTransactions::route('/'),
            'create' => Pages\CreateSalesTransaction::route('/create'),
            'edit' => Pages\EditSalesTransaction::route('/{record}/edit'),
        ];
    }
}
