<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeranjangResource\Pages;
use App\Filament\Resources\KeranjangResource\RelationManagers;
use App\Models\Keranjang;
use App\Imports\KeranjangImport;
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

class KeranjangResource extends Resource
{
    protected static ?string $model = Keranjang::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Payments';


    public static function getModelLabel():string{
        return'Keranjang';
    }

    public static function getPluralModelLabel():string{
        return 'Keranjang';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_keranjang')
                    ->label('ID Keranjang')
                    ->placeholder('KR000')
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
                Tables\Columns\TextColumn::make('id_keranjang')
                    ->label('ID Keranjang')
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
                        Excel::import(new KeranjangImport, $filePath);
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
                    ->modalHeading('Import Data Keranjang')
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
            'index' => Pages\ListKeranjangs::route('/'),
            'create' => Pages\CreateKeranjang::route('/create'),
            'edit' => Pages\EditKeranjang::route('/{record}/edit'),
        ];
    }
}
