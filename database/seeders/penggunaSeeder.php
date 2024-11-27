<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Carbon\Carbon;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First user
        Pengguna::create([
            'userid' => 'US001',
            'nama' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'jalan' => 'Jl. Merdeka No. 1',
            'kota' => 'Jakarta',
            'kecamatan' => 'Gambir',
            'nomor_telepon' => '081234567890',
            'is_admin' => 'Yes',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Second user
        Pengguna::create([
            'userid' => 'US002',
            'nama' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => 'password123',
            'jalan' => 'Jl. Sudirman No. 2',
            'kota' => 'Bandung',
            'kecamatan' => 'Cicendo',
            'nomor_telepon' => '081234567891',
            'is_admin' => 'No',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Third user
        Pengguna::create([
            'userid' => 'US003',
            'nama' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'password' => 'password123',
            'jalan' => 'Jl. Thamrin No. 3',
            'kota' => 'Surabaya',
            'kecamatan' => 'Tegalsari',
            'nomor_telepon' => '081234567892',
            'is_admin' => 'Yes',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Fourth user
        Pengguna::create([
            'userid' => 'US004',
            'nama' => 'Bob Brown',
            'email' => 'bob.brown@example.com',
            'password' => 'password123',
            'jalan' => 'Jl. Gatot Subroto No. 4',
            'kota' => 'Medan',
            'kecamatan' => 'Medan Baru',
            'nomor_telepon' => '081234567893',
            'is_admin' => 'No',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}