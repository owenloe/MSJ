<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Invoice;

class InvoiceImport implements ToModel , WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Invoice([
            'id_invoice' => $row['id_invoice'],
            'id_pembayaran' => $row['id_pembayaran'],
            'userid' => $row['userid'],
            'nama_user' => \App\Models\Pengguna::find($row['userid'])?->nama,
            'id_produk' => $row['id_produk'],
            'nama_produk' => \App\Models\Produk::find($row['id_produk'])?->nama_produk,
            'quantity_produk' => $row['quantity_produk'],
            'harga_produk' => \App\Models\Produk::find($row['id_produk'])?->harga_produk,
            'jalan' => \App\Models\Pengguna::find($row['userid'])?->jalan,
            'kota' => \App\Models\Pengguna::find($row['userid'])?->kota,
            'kecamatan' => \App\Models\Pengguna::find($row['userid'])?->kecamatan,
            'nomor_telepon' => \App\Models\Pengguna::find($row['userid'])?->nomor_telepon,
            'date_made' => $row['date_made'],
        ]);
    }
}