<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeranjangResource\Pages;
use App\Filament\Resources\KeranjangResource\RelationManagers;
use App\Models\Keranjang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeranjangResource extends Resource
{
    protected static ?string $model = Keranjang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_produk')
                    ->label('Nama Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('harga_produk')
                    ->label('Harga Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('unit_produk')
                    ->label('Unit Produk')
                    ->required()
                    ,
                Forms\Components\TextInput::make('image')
                    ->label('Gambar Produk')
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_user')
                    ->label('Nama User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_produk')
                    ->label('Harga Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_produk')
                    ->label('Unit Produk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('image')
                    ->label('Gambar Produk')
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
            'index' => Pages\ListKeranjangs::route('/'),
            'create' => Pages\CreateKeranjang::route('/create'),
            'edit' => Pages\EditKeranjang::route('/{record}/edit'),
        ];
    }
}
