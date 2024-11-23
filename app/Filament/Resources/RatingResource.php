<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RatingResource\Pages;
use App\Filament\Resources\RatingResource\RelationManagers;
use App\Models\Rating;
use App\Imports\RatingsImport;
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
                Forms\Components\Select::make('userid')
                ->relationship('pengguna', 'userid') // Ensure the relationship name and foreign key are correct
                ->label('ID Pengguna')
                ->preload()
                ->searchable()
                ->reactive()
                ->required()
                ->afterStateUpdated(fn (callable $set, $state) => $set('nama_user', \App\Models\Pengguna::find($state)?->nama))
                ,
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ->disabled()
                    , // Disable manual input
                Forms\Components\Select::make('rating')
                    ->label('Rating')
                    ->options([
                        0 => '0',
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                        5 => '5',
                    ])
                    ->required()
                    ,
                Forms\Components\TextInput::make('komentar')
                    ->label('Komentar')
                    ->required()
                    ,
                Forms\Components\FileUpload::make('gambar_produk') 
    ->label('Gambar Produk')
    ->image() // Optimizes for image uploads
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
            ->headerActions([
                Action::make('importExcel')
                    ->label('Import Excel')
                    ->action(function (array $data) {
                        // Ensure $data['file'] is a valid path in storage
                        $filePath = storage_path('app/public/' . $data['file']);
                        // Import file using absolute path
                        Excel::import(new RatingsImport, $filePath);
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
                    ->modalHeading('Import Data Rating')
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
            'index' => Pages\ListRatings::route('/'),
            'create' => Pages\CreateRating::route('/create'),
            'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }
}
