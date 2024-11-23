<?php

namespace App\Imports;

use App\Models\Rating;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RatingsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Rating([
            'userid' => $row['userid'],
            'nama_user' => \App\Models\Pengguna::find($row['userid'])?->nama,
            'rating' => $row['rating'],
            'comment' => $row['comment'],
        ]);
    }
}