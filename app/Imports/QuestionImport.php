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
            'id_tanya' => $row['id_tanya'] ?? null,
            'id_produk' => $row['id_produk'] ?? null,
            'userid' => $row['userid'] ?? null,
            'nama_user' => $row['nama_user'] ?? null,
            'pertanyaan' => $row['pertanyaan'] ?? null,
        ]);
    }
}