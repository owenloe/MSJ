<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Question([
            'id_tanya' => $row['id_tanya'],
            'id_produk' => $row['id_produk'],
            'userid' => $row['userid'],
            'nama_user' => \App\Models\Pengguna::find($row['userid'])?->nama,
            'pertanyaan' => $row['pertanyaan'],
        ]);
    }
}