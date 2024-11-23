<?php

namespace App\Imports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaymentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Payment([
            'id_pembayaran' => $row['id_pembayaran'],
            'nama_rek' => $row['nama_rek'],
            'nomor_rek' => $row['nomor_rek'],
        ]);
    }
}