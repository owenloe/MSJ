<?php

namespace App\Filament\Widgets;

use App\Models\Produk;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class stokLevel3 extends BaseWidget
{
    protected static ?string $heading = 'Low Stock Products';
    
    // Add sort order - higher numbers appear lower on page
    protected static ?int $sort = 3;

    // Control widget width

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->query(
                Produk::where('quantity_produk', '<', 3)
            )
            ->columns([
                TextColumn::make('id_produk')
                    ->label('Product ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama_produk')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('quantity_produk')
                    ->label('Quantity')
                    ->sortable()
                    ->searchable(),
            ]);
    }
}