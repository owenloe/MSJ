<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\notification;
use Carbon\Carbon;

class notifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        notification::create([
            'id_notif' => 'NT001',
            'userid' => 'US001',
            'notifikasi' => 'Your order has been shipped.',
            'objek' => 'Order',
            'nama_user' => 'John Doe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        notification::create([
            'id_notif' => 'NT002',
            'userid' => 'US002',
            'notifikasi' => 'Your payment has been received.',
            'objek' => 'Payment',
            'nama_user' => 'Jane Smith',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        notification::create([
            'id_notif' => 'NT003',
            'userid' => 'US003',
            'notifikasi' => 'Your account has been updated.',
            'objek' => 'Account',
            'nama_user' => 'Alice Johnson',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        notification::create([
            'id_notif' => 'NT004',
            'userid' => 'US004',
            'notifikasi' => 'Your password has been changed.',
            'objek' => 'Security',
            'nama_user' => 'Bob Brown',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}