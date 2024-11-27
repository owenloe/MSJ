<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
 Actions\CreateAction::make(), // Tombol New
 Actions\Action::make('cetak_laporan')
 ->label('Cetak Laporan')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakLaporan())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Invoice')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

 Actions\Action::make('cetakReport')
 ->label('Cetak Total Sales by Customer') 
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakReport())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Invoice')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

 Actions\Action::make('cetakDemandSalesReport')
 ->label('Cetak Demand & Sales Report')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakDemandSalesReport())
 ->requiresConfirmation()
 ->modalHeading('Cetak Penjualan Terbanyak per Customer')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
 ];
    }

    public static function cetakLaporan()
 {
 // Ambil data pengguna
 $data = \App\Models\invoice::all();
 // Load view untuk cetak PDF
 $pdf = PDF::loadView('laporan.cetak', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporaninvoice.pdf');
 }


public static function cetakReport() {
    $data = DB::table('penggunas as u')
        ->selectRaw('
            u.userid,
            u.nama as user_name,
            COUNT(i.id_invoice) AS total_transactions,
            SUM(i.harga_produk * i.quantity_produk) AS total_sales,
            SUM(i.quantity_produk) AS total_quantity_sold
        ')
        ->join('invoices as i', 'u.userid', '=', 'i.userid')
        ->join('produks as pr', 'i.id_produk', '=', 'pr.id_produk')
        ->groupBy('u.userid', 'u.nama')
        ->orderBy('total_sales', 'DESC')
        ->get();

    $pdf = PDF::loadView('laporan.MostPurchasedbyCust', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'MostPurchasedbyCust.pdf');
}





public static function cetakDemandSalesReport()
    {
$data = DB::table('kategoris as k')
    ->selectRaw('
        k.id_kategori,
        k.jenis_kategori,
        pr.id_produk,
        pr.nama_produk,
        (
            SELECT COALESCE(SUM(kr.quantity), 0)
            FROM keranjangs kr
            WHERE kr.id_produk = pr.id_produk
        ) AS total_demand,
        (
            SELECT COALESCE(SUM(i.quantity_produk), 0)
            FROM invoices i
            WHERE i.id_produk = pr.id_produk
        ) AS total_quantity_sold,
        (
            SELECT COALESCE(SUM(i.harga_produk * i.quantity_produk), 0)
            FROM invoices i
            WHERE i.id_produk = pr.id_produk
        ) AS total_sales
    ')
    ->join('produks as pr', 'k.id_kategori', '=', 'pr.kategori_produk')
    ->groupBy('k.id_kategori', 'k.jenis_kategori', 'pr.id_produk', 'pr.nama_produk')
    ->orderBy('pr.nama_produk')
    ->get();

        $pdf = PDF::loadView('laporan.Demand', ['data' => $data]);

        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'DemandnSalesReport.pdf');
    }
}
