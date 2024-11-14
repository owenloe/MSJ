<?php

namespace App\Imports;

use App\Models\pengguna;
use Maatwebsite\Excel\Concerns\ToModel;

class PenggunaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rowcount=0;
    public function model(array $row)
    {
        $this->rowcount++;

        if($this->rowcount == 1){
            return null;
        }
        else

        return new pengguna([
            'userid' => $row[0],
            'nama' => $row[1],
            'email' => $row[2],
            'password' => $row[3],
            'jalan' => $row[4],
            'kota' => $row[5],
            'kecamatan' => $row[6],
            'nomor_telepon' => $row[7],
            'is_admin' => $row[8],
        ]);
    }
}
