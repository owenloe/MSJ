<?php

namespace App\Filament\Resources\PenggunaResource\Pages;

use App\Filament\Resources\PenggunaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;

class ListPenggunas extends ListRecords
{
    protected static string $resource = PenggunaResource::class;

    protected function getHeaderActions(): array
    {
         return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Pengguna')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
    }

    public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\Pengguna::all(); // Fetch all users
    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.pengguna', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporanpengguna.pdf');
}

}
