<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\TextInput::make('kategori_produk')
                    ->label('Kategori Produk')
                    ->placeholder('KT000')
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
                Forms\Components\TextInput::make('berat')
                    ->label('Berat')
                    ->required()
                    ,
                Forms\Components\TextInput::make('jenis')
                    ->label('Jenis')
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
    ->image() // Optimizes for image uploads
    ->required() // Make the upload required
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
                    ->label('Quantity Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_produk')
                    ->label('Harga Produk')
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
