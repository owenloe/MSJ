<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use App\Imports\InvoiceImport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

     protected static ?string $navigationGroup = 'Sales';

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
                Forms\Components\Select::make('id_pembayaran')
                    ->label('ID Pembayaran')
                    ->relationship('payment', 'id_pembayaran') // Ensure the relationship name and display column are correct
                    ->searchable()
                    ->preload()
                    ->required()
                    ,
                Forms\Components\Select::make('userid')
                    ->label('User ID')
                    ->relationship('pengguna', 'userid') // Ensure the relationship name and display column are correct
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function (callable $set, $state) {
                    $pengguna = \App\Models\Pengguna::find($state);
                    $set('nama_user', $pengguna?->nama);
                    $set('jalan', $pengguna?->jalan);
                    $set('kota', $pengguna?->kota);
                    $set('kecamatan', $pengguna?->kecamatan);
                    $set('nomor_telepon', $pengguna?->nomor_telepon);
                    }),
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ->disabled()
                    ,
                Forms\Components\Select::make('id_produk')
                    ->label('ID Produk')
                    ->relationship('produk', 'id_produk') // Ensure the relationship name and display column are correct
                    ->searchable()
                    ->reactive()
                    ->preload()
                    ->required()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $produk = \App\Models\Produk::find($state);
                        $set('nama_produk', $produk?->nama_produk);
                        $set('harga_produk', $produk?->harga_produk);
                    }),
                Forms\Components\TextInput::make('nama_produk')
                    ->label('Nama Produk')
                    ->required()
                    ->disabled()
                    ->default(function ($state) {
        $produk = \App\Models\Produk::find($state);
        return $produk?->nama_produk;
    }),
                Forms\Components\TextInput::make('quantity_produk')
                    ->label('Quantity Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('harga_produk')
                    ->label('Harga Produk')
                    ->required()
                    ->disabled()
                    ,
                Forms\Components\TextInput::make('jalan')
                    ->label('Jalan')
                    ->required()
                    ->disabled()
                    ,
                Forms\Components\TextInput::make('kota')
                    ->label('Kota')
                    ->required()
                    ->disabled()
                    ,
                Forms\Components\TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->required()
                    ->disabled()
                    ,
                Forms\Components\TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->required()
                    ->disabled()
                    ,
                Forms\Components\DatePicker::make('date_made')
                    ->label('Date Made')
                    ->default(now()->toDateString()) // Set default value to today's date
                    ->required(),
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
                    ->searchable()
                    ->disabled(),
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
                Tables\Columns\TextColumn::make('date_made')
                    ->label('Date Made')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
             ->headerActions([
                Action::make('importExcel')
                    ->label('Import Excel')
                    ->action(function (array $data) {
                        // Ensure $data['file'] is a valid path in storage
                        $filePath = storage_path('app/public/' . $data['file']);
                        // Import file using absolute path
                        Excel::import(new InvoiceImport, $filePath);
                        // Show success notification
                        Notification::make()
                            ->title('Data berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->disk('public') // Ensure it's stored on the 'public' disk
                            ->directory('imports')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'])
                            ->required(),
                    ])
                    ->modalHeading('Import Data Invoice')
                    ->modalButton('Import')
                    ->color('success'),
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
