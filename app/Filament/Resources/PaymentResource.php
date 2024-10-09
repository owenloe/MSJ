<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_rek')
                    ->label('Nama Rekening')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nomor_rek')
                    ->label('Nomor Rekening')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nominal_transfer')
                    ->label('Nominal Transfer')
                    ->required()
                    ,
                Forms\Components\DateTimePicker::make('created_at')
                    ->label('Created Time')
                    ->required()
                    ,
                Forms\Components\DateTimePicker::make('updated_at')
                    ->label('Updated Time')
                    ->required()
                    ,
                Forms\Components\TextInput::make('invoice_produk')
                    ->label('Invoice Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('bukti_transfer')
                    ->label('Bukti Transfer')
                    ,
                Forms\Components\TextInput::make('nama_bank')
                    ->label('Nama Bank')
                    ->required()
                    ,
                Forms\Components\TextInput::make('status_transaksi')
                    ->label('Status Transaksi')
                    ->required()
                    ,
                Forms\Components\TextInput::make('status_pesanan')
                    ->label('Status Pesanan')
                    ->required()
                    ,
                Forms\Components\TextInput::make('status_pengiriman')
                    ->label('Status Pengiriman')
                    ->required()
                    ,
                Forms\Components\TextInput::make('alasan_komplain')
                    ->label('Alasan Komplain')
                    ->required()
                    ,
                Forms\Components\TextInput::make('gambar_komplain')
                    ->label('Gambar Komplain')
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_user')
                    ->label('Nama User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_rek')
                    ->label('Nomor Rekening')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nominal_transfer')
                    ->label('Nominal Transfer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created Time')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated Time')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_produk')
                    ->label('Invoice Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bukti_transfer')
                    ->label('Bukti Transfer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_bank')
                    ->label('Nama Bank')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_transaksi')
                    ->label('Status Transaksi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_pesanan')
                    ->label('Status Pesanan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_pengiriman')
                    ->label('Status Pengiriman')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alasan_komplain')
                    ->label('Alasan Komplain')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gambar_komplain')
                    ->label('Gambar Komplain')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
