<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RatingResource\Pages;
use App\Filament\Resources\RatingResource\RelationManagers;
use App\Models\Rating;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatingResource extends Resource
{
    protected static ?string $model = Rating::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel():string{
        return'Rating';
    }

    public static function getPluralModelLabel():string{
        return 'Rating';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_rating')
                    ->label('ID Rating')
                    ->placeholder('RT000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('userid')
                    ->label('ID Pengguna')
                    ->placeholder('US000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ,
                Forms\Components\TextInput::make('rating')
                    ->label('Rating')
                    ->required()
                    ,
                Forms\Components\TextInput::make('komentar')
                    ->label('Komentar')
                    ->required()
                    ,
                Forms\Components\FileUpload::make('gambar_produk') 
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
                Tables\Columns\TextColumn::make('id_rating')
                    ->label('ID Rating')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('userid')
                    ->label('ID Pengguna')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_user')
                    ->label('Nama User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('komentar')
                    ->label('Komentar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('gambar_produk')
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
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }
}
