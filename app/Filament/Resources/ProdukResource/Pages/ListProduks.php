<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use App\Filament\Resources\ProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;

class ListProduks extends ListRecords
{
    protected static string $resource = ProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Produk')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
    }

    public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\produk::all();
 // Load view untuk cetak PDF
 $pdf = PDF::loadView('laporan.produk', ['data' => $data]);
 // Unduh file PDF
 return response()->streamDownload(fn() => print($pdf->output()), 'laporanproduk.pdf');
 }

}
