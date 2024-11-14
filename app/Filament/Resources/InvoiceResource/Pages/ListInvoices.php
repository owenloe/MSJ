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
 ->label('Cetak Report')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakReport())
 ->requiresConfirmation()
 ->modalHeading('Cetak Laporan Invoice')
 ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

 Actions\Action::make('cetakProductSalesByCategoryReport')
 ->label('Cetak Product Sales By Category Report')
 ->icon('heroicon-o-printer')
 ->action(fn() => static::cetakProductSalesByCategoryReport())
 ->requiresConfirmation()
 ->modalHeading('Cetak product Sales By Category Report')
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
$data = DB::table('kategoris as k')
    ->selectRaw('
        k.id_kategori,
        k.jenis_kategori,
        pr.nama_produk,
        SUM(i.quantity_produk) AS total_quantity_sold,
        SUM(i.harga_produk * i.quantity_produk) AS total_sales
    ')
    ->join('produks as pr', 'k.id_kategori', '=', 'pr.kategori_produk')
    ->join('invoices as i', 'pr.id_produk', '=', 'i.id_produk')
    ->groupByRaw('k.id_kategori, k.jenis_kategori, pr.nama_produk')
    ->orderByRaw('total_sales DESC')
    ->get();

    $pdf = PDF::loadView('laporan.Laporanpenjualanpbln', ['data' => $data]);

    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'Laporan Penjualan Produk Per Bulan.pdf');
}
public static function cetakProductSalesByCategoryReport()
    {
        $data = DB::table('kategoris as k')
            ->selectRaw('
                k.id_kategori,
                k.jenis_kategori,
                pr.nama_produk,
                SUM(i.quantity_produk) AS total_quantity_sold,
                SUM(i.harga_produk * i.quantity_produk) AS total_sales
            ')
            ->join('produks as pr', 'k.id_kategori', '=', 'pr.kategori_produk')
            ->join('invoices as i', 'pr.id_produk', '=', 'i.id_produk')
            ->groupByRaw('k.id_kategori, k.jenis_kategori, pr.nama_produk')
            ->orderByRaw('total_sales DESC')
            ->get();

        $pdf = PDF::loadView('laporan.ProductSalesByCategoryReport', ['data' => $data]);

        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'ProductSalesByCategoryReport.pdf');
    }
}
