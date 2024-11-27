<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First payment method
        Payment::create([
            'id_pembayaran' => 'PB001',
            'nama_rek' => 'John Doe',
            'nomor_rek' => '1111111111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Second payment method
        Payment::create([
            'id_pembayaran' => 'PB002',
            'nama_rek' => 'Jane Smith',
            'nomor_rek' => '2222222222',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Third payment method
        Payment::create([
            'id_pembayaran' => 'PB003',
            'nama_rek' => 'Alice Johnson',
            'nomor_rek' => '3333333333',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Fourth payment method
        Payment::create([
            'id_pembayaran' => 'PB004',
            'nama_rek' => 'Bob Brown',
            'nomor_rek' => '4444444444',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}