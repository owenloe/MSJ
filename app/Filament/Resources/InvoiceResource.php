<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel():string{
        return'Invoice';
    }

    public static function getPluralModelLabel():string{
        return 'Invoice';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_invoice')
                    ->label('ID Invoice')
                    ->placeholder('TRX000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('id_pembayaran')
                    ->label('ID Pembayaran')
                    ->placeholder('PB000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('userid')
                    ->label('User ID')
                    ->placeholder('US000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ,
                Forms\Components\TextInput::make('id_produk')
                    ->label('ID Produk')
                    ->placeholder('PD000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_produk')
                    ->label('Nama Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('quantity_produk')
                    ->label('Quantity Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('harga_produk')
                    ->label('Harga Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('jalan')
                    ->label('Jalan')
                    ->required()
                    ,
                Forms\Components\TextInput::make('kota')
                    ->label('Kota')
                    ->required()
                    ,
                Forms\Components\TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->required()
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_invoice')
                    ->label('ID Invoice')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_pembayaran')
                    ->label('ID Pembayaran')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('userid')
                    ->label('User ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_user')
                    ->label('Nama User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_produk')
                    ->label('ID Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity_produk')
                    ->label('Quantity Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_produk')
                    ->label('Harga Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jalan')
                    ->label('Jalan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kota')
                    ->label('Kota')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->label('Kecamatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->sortable()
                    ->searchable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
