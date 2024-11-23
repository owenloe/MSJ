<?php

namespace App\Imports;

use App\Models\Notification;
use App\Models\Pengguna;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NotificationImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $pengguna = Pengguna::find($row['userid']);

        return new Notification([
            'id_notif' => $row['id_notif'],
            'userid' => $row['userid'],
            'notifikasi' => $row['notifikasi'],
            'objek' => $row['objek'],
            'nama_user' => $pengguna ? $pengguna->nama : null,
        ]);
    }
}