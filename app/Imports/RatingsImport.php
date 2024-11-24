<?php

namespace App\Imports;

use App\Models\Rating;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RatingsImport implements ToModel , WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Rating([
            'id_rating' => $row['id_rating'],
            'userid' => $row['userid'],
            'nama_user' => \App\Models\Pengguna::find($row['userid'])?->nama,
            'rating' => $row['rating'],
            'komentar' => $row['komentar'],
            'gambar_produk' => $row['gambar_produk'],

        ]);
    }
}