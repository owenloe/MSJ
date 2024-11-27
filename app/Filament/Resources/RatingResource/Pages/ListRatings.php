<?php

namespace App\Filament\Resources\RatingResource\Pages;

use App\Filament\Resources\RatingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class ListRatings extends ListRecords
{
    protected static string $resource = RatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Rating')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

 Actions\Action::make('cetakCustomerSatisfactionReport')
 ->label('Cetak Customer Satisfaction Report')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakCustomerSatisfactionReport())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Customer Satisfaction Report')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
    }

    public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\rating::all();
 // Load view untuk cetak PDF
 $pdf = PDF::loadView('laporan.rating', ['data' => $data]);
 // Unduh file PDF
 return response()->streamDownload(fn() => print($pdf->output()), 'laporanrating.pdf');
 }

 public static function cetakCustomerSatisfactionReport()
    {
        $data = DB::table('ratings as r')
        ->selectRaw('
            r.userid,
            u.nama as user_name,
            COUNT(r.id_rating) as total_reviews,
            AVG(r.rating) as average_rating,
            (SELECT SUM(i.quantity_produk) 
             FROM invoices i 
             WHERE i.userid = r.userid) as total_quantity_sold
        ')
        ->join('penggunas as u', 'r.userid', '=', 'u.userid')
        ->groupBy('r.userid', 'u.nama')
        ->orderBy('average_rating', 'DESC')
        ->get();

        $pdf = PDF::loadView('laporan.CustomerSatisfactionReport', ['data' => $data]);

        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'CustomerSatisfactionReport.pdf');
    }
}
