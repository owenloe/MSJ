<?php

namespace App\Imports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukImport implements ToModel , WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Produk([
            'id_produk' => $row['id_produk'],
            'nama_produk' => $row['nama_produk'],
            'kategori_produk' => $row['kategori_produk'],
            'quantity_produk' => $row['quantity_produk'],
            'harga_produk' => $row['harga_produk'],
            'modal_produk' => $row['modal_produk'],
            'berat' => $row['berat'],
            'jenis' => $row['jenis'],
            'ukuran' => $row['ukuran'],
            'warna' => $row['warna'],
            'image' => $row['image'],
        ]);
    }
}