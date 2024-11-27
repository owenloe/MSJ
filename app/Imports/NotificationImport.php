<?php

namespace App\Imports;

use App\Models\notification;
use App\Models\pengguna;
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

        // Find the pengguna by 'userid'

        return new notification([
            'id_notif' => $row['id_notif'],
            'userid' => $row['userid'],
            'notifikasi' => $row['notifikasi'],
            'objek' => $row['objek'],
            'nama_user' => \App\Models\Pengguna::find($row['userid'])?->nama,
        ]);
    }
}