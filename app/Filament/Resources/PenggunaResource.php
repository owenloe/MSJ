<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenggunaResource\Pages;
use App\Filament\Resources\PenggunaResource\RelationManagers;
use App\Models\Pengguna;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenggunaResource extends Resource
{
    protected static ?string $model = Pengguna::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Pengguna')
                    ->required()
                    ,
                Forms\Components\TextInput::make('email')
                    ->label('Email Pengguna')
                    ->required()
                    ,
                Forms\Components\TextInput::make('password')
                    ->label('Password Pengguna')
                    ->required()
                    ,
                Forms\Components\TextInput::make('jalan')
                    ->label('Jalan')
                    ->required()
                    ,
                Forms\Components\TextInput::make('kota')
                    ->label('Kota')
                    ->required()
                    ,
                Forms\Components\TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->required()
                    ,
                Forms\Components\TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->required()
                    ,
                Forms\Components\TextInput::make('remember_token')
                    ,
                Forms\Components\DateTimePicker::make('email_verified_at')
                    ->label('Email Verified Time')
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
                Forms\Components\TextInput::make('is_admin')
                    ->label('An Admin')
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Pengguna')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('password')
                    ->label('Password Pengguna')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jalan')
                    ->label('Jalan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kota')
                    ->label('Kota')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan')
                    ->label('Kecamatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon Pengguna')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('remember_token')
                    ->label('Remember Token')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('Email Verified Time')
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
                Tables\Columns\TextColumn::make('is_admin')
                    ->label('Admin')
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
            'index' => Pages\ListPenggunas::route('/'),
            'create' => Pages\CreatePengguna::route('/create'),
            'edit' => Pages\EditPengguna::route('/{record}/edit'),
        ];
    }
}
