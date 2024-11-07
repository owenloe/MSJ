<?php

namespace App\Filament\Resources\NotificationResource\Pages;

use App\Filament\Resources\NotificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;

class ListNotifications extends ListRecords
{
    protected static string $resource = NotificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Notifikasi')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
    }

    public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\notification::all();
 // Load view untuk cetak PDF
 $pdf = PDF::loadView('laporan.notification', ['data' => $data]);
 // Unduh file PDF
 return response()->streamDownload(fn() => print($pdf->output()), 'laporannotification.pdf');
 }

}