<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\keranjang;
use Carbon\Carbon;


class keranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        keranjang::create([
            'id_keranjang' => 'KR001',
            'userid' => 'US001',
            'nama_user' => 'John Doe',
            'id_produk' => 'PD001',
            'nama_produk' => 'Elpiji 3KG',
            'harga_produk' => '200000',
            'quantity' => '2',
        ]);

        keranjang::create([
            'id_keranjang' => 'KR002',
            'userid' => 'US002',
            'nama_user' => 'Jane Smith',
            'id_produk' => 'PD002',
            'nama_produk' => 'Bright Gas 5.5KG',
            'harga_produk' => '375000',
            'quantity' => '1',
        ]);

        keranjang::create([
            'id_keranjang' => 'KR003',
            'userid' => 'US003',
            'nama_user' => 'Alice Johnson',
            'id_produk' => 'PD003',
            'nama_produk' => 'Elpiji 12KG',
            'harga_produk' => '475000',
            'quantity' => '2',
        ]);

        keranjang::create([
            'id_keranjang' => 'KR004',
            'userid' => 'US004',
            'nama_user' => 'Bob Marley',
            'id_produk' => 'PD004',
            'nama_produk' => 'Elpiji 50KG',
            'harga_produk' => '2750000',
            'quantity' => '1',
        ]);
    }
}
