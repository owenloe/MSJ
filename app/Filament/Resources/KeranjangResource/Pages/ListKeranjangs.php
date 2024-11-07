<?php

namespace App\Filament\Resources\KeranjangResource\Pages;

use App\Filament\Resources\KeranjangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;

class ListKeranjangs extends ListRecords
{
    protected static string $resource = KeranjangResource::class;

    protected function getHeaderActions(): array
    {
        return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Keranjang')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
    }

    public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\keranjang::all();
 // Load view untuk cetak PDF
 $pdf = PDF::loadView('laporan.keranjang', ['data' => $data]);
 // Unduh file PDF
 return response()->streamDownload(fn() => print($pdf->output()), 'laporankeranjang.pdf');
 }

}
