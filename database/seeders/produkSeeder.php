<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use Carbon\Carbon;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First product
        Produk::create([
            'id_produk' => 'PD001',
            'nama_produk' => 'Elpiji 3KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 10,
            'harga_produk' => 200000,
            'modal_produk' => 180000,
            'berat' => '3 KG', // dalam gram
            'jenis' => 'Elpiji',
            'ukuran' => 'S',
            'warna' => 'Hijau',
            'image' => 'fotos/lpg3.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Produk::create([
            'id_produk' => 'PD002',
            'nama_produk' => 'Bright Gas 5.5KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 5,
            'harga_produk' => 375000,
            'modal_produk' => 330000,
            'berat' => '5.5 KG', // dalam gram
            'jenis' => 'Bright Gas',
            'ukuran' => 'M',
            'warna' => 'Pink',
            'image' => 'fotos/lpg55.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        Produk::create([
            'id_produk' => 'PD003',
            'nama_produk' => 'Elpiji 12KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 3,
            'harga_produk' => 475000,
            'modal_produk' => 400000,
            'berat' => '12 KG', // dalam gram
            'jenis' => 'Elpiji',
            'ukuran' => 'L',
            'warna' => 'Biru',
            'image' => 'fotos/lpg12.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}