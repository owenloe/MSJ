<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationResource\Pages;
use App\Filament\Resources\NotificationResource\RelationManagers;
use App\Models\Notification;
use App\Imports\NotificationImport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification as FilamentNotification;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel():string{
        return'Notification';
    }

    public static function getPluralModelLabel():string{
        return 'Notification';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_notif')
                    ->label('ID Notifikasi')
                    ->placeholder('NT000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('userid')
                    ->label('User ID')
                    ->placeholder('US000')
                    ->required()
                    ,
                Forms\Components\TextInput::make('notifikasi')
                    ->label('Notifikasi')
                    ->required()
                    ,
                Forms\Components\TextInput::make('objek')
                    ->label('Objek')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nama_user')
                    ->label('Nama User')
                    ->required()
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_notif')
                    ->label('ID Notifikasi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('userid')
                    ->label('User ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('notifikasi')
                    ->label('Notifikasi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('objek')
                    ->label('Objek')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_user')
                    ->label('Nama User')
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
                        Excel::import(new NotificationImport, $filePath);
                        // Show success notification
                        FilamentNotification::make()
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
                    ->modalHeading('Import Data Notification')
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
            'index' => Pages\ListNotifications::route('/'),
            'create' => Pages\CreateNotification::route('/create'),
            'edit' => Pages\EditNotification::route('/{record}/edit'),
        ];
    }
}
