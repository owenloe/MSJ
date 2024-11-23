<?php

namespace App\Imports;

use App\Models\Invoice;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\Payment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoiceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $pengguna = Pengguna::find($row['userid']);
        $produk = Produk::find($row['id_produk']);
        $payment = Payment::find($row['id_pembayaran']);

        return new Invoice([
            'id_invoice' => $row['id_invoice'],
            'id_pembayaran' => $row['id_pembayaran'],
            'userid' => $row['userid'],
            'nama_user' => $pengguna ? $pengguna->nama : $row['nama_user'],
            'id_produk' => $row['id_produk'],
            'nama_produk' => $produk ? $produk->nama_produk : $row['nama_produk'],
            'quantity_produk' => $row['quantity_produk'],
            'harga_produk' => $row['harga_produk'],
            'jalan' => $row['jalan'],
            'kota' => $row['kota'],
            'kecamatan' => $row['kecamatan'],
            'nomor_telepon' => $row['nomor_telepon'],
            'date_made' => $row['date_made'],
        ]);
    }
}