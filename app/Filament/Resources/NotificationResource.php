<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationResource\Pages;
use App\Filament\Resources\NotificationResource\RelationManagers;
use App\Models\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
