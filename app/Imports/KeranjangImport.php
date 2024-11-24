<?php

namespace App\Imports;

use App\Models\Keranjang;
use App\Models\Pengguna;
use App\Models\Produk;
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
        $pengguna = Pengguna::find($row['userid']);
        $produk = Produk::where('nama_produk', $row['nama_produk'])->first();

        return new Keranjang([
            'id_keranjang' => $row['id_keranjang'],
            'userid' => $row['userid'],
            'nama_user' => $row['nama_user'],
            'nama_produk' => $row['nama_produk'],
            'harga_produk' => $row['harga_produk'],
            'unit_produk' => $row['unit_produk'],
            'image' => $row['image'],
        ]);
    }
}