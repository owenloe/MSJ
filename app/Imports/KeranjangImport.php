<?php

namespace App\Imports;

use App\Models\Keranjang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KeranjangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Keranjang([
            'id_keranjang' => $row['id_keranjang'],
            'userid' => $row['userid'],
            'nama_user' => \App\Models\Pengguna::find($row['userid'])?->nama,
            'id_produk' => $row['id_produk'],
            'nama_produk' => \App\Models\Produk::find($row['id_produk'])?->nama_produk,
            'harga_produk' => \App\Models\Produk::find($row['id_produk'])?->harga_produk,
            'quantity' => $row['quantity'],
        ]);
    }
}