<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use App\Imports\ProdukImport;
use App\Models\Kategori;
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


class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Produk';


    public static function getModelLabel():string{
        return'Produk';
    }

    public static function getPluralModelLabel():string{
        return 'Produk';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_produk')
                    ->label('ID Produk')
                    ->placeholder('PD000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_produk')
                    ->label('Nama Produk')
                    ->required()
                    ,
                Forms\Components\Select::make('kategori_produk')
                    ->options(kategori::all()->pluck('jenis_kategori', 'id_kategori'))
                    ->required()
                    ,
                Forms\Components\TextInput::make('quantity_produk')
                    ->label('Stok Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('harga_produk')
                    ->label('Modal Produk')
                    ->required()
                    ,
                Forms\Components\Select::make('berat')
                ->label('Berat')
                ->options([
        '3KG' => '3 KG',
        '5.5KG' => '5.5 KG',
        '12KG' => '12 KG',
        '50KG' => '50 KG',
    ])
    ->required()
                    ,
                Forms\Components\Select::make('jenis')
    ->label('Jenis')
    ->options([
        'Bright Gas' => 'Bright Gas',
        'Elpiji' => 'Elpiji'
    ])
    ->required()
                    ,
                Forms\Components\TextInput::make('ukuran')
                    ->label('Ukuran')
                    ->required()
                    ,
                Forms\Components\TextInput::make('warna')
                    ->label('Warna')
                    ->required()
                    ,
                Forms\Components\FileUpload::make('image') 
    ->label('Gambar Produk')
    ->image() // Optimizes for image uploads // Make the upload required
    ->disk('public') // Choose the storage disk (e.g., 'public', 's3')
    ->directory('product-images') // Specify the directory to store the images
    ->visibility('public') // Set the visibility of the uploaded files
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_produk')
                    ->label('ID Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori_produk')
                    ->label('Kategori Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity_produk')
                    ->label('Stok Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_produk')
                    ->label('Modal Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis')
                    ->label('Jenis')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ukuran')
                    ->label('Ukuran')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('warna')
                    ->label('Warna')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('image')
        ->label('Gambar Produk')
        ->formatStateUsing(function (string $state) {
            return basename($state); // Extract the filename from the path
        })
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
                        Excel::import(new ProdukImport, $filePath);
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
                    ->modalHeading('Import Data Produk')
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
