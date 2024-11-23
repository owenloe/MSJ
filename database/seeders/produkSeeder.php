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
            'nama_produk' => 'Bright Gas 3KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 10,
            'harga_produk' => 500000,
            'berat' => '3 KG', // dalam gram
            'jenis' => 'Bright Gas',
            'ukuran' => 'S',
            'warna' => 'Merah',
            'image' => 'path/to/image1.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Second product
        Produk::create([
            'id_produk' => 'PD002',
            'nama_produk' => 'Bright Gas 12KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 2,
            'harga_produk' => 100000,
            'berat' => '12 KG', // dalam gram
            'jenis' => 'Bright Gas',
            'ukuran' => 'L',
            'warna' => 'Merah',
            'image' => 'path/to/image2.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Third product
        Produk::create([
            'id_produk' => 'PD003',
            'nama_produk' => 'Elpiji 3KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 15,
            'harga_produk' => 150000,
            'berat' => '3 KG', // dalam gram
            'jenis' => 'Elpiji',
            'ukuran' => 'S',
            'warna' => 'Hijau',
            'image' => 'path/to/image3.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Fourth product
        Produk::create([
            'id_produk' => 'PD004',
            'nama_produk' => 'Elpiji 5.5KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 8,
            'harga_produk' => 75000,
            'berat' => '5.5 KG', // dalam gram
            'jenis' => 'Elpiji',
            'ukuran' => 'M',
            'warna' => 'Hijau',
            'image' => 'path/to/image4.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Fifth product
        Produk::create([
            'id_produk' => 'PD005',
            'nama_produk' => 'Elpiji 12KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 5,
            'harga_produk' => 95000,
            'berat' => '12 KG', // dalam gram
            'jenis' => 'Elpiji',
            'ukuran' => 'L',
            'warna' => 'Hijau',
            'image' => 'path/to/image5.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Sixth product
        Produk::create([
            'id_produk' => 'PD006',
            'nama_produk' => 'Elpiji 50KG',
            'kategori_produk' => 'KT001',
            'quantity_produk' => 1,
            'harga_produk' => 2500000,
            'berat' => '50 KG', // dalam gram
            'jenis' => 'Elpiji',
            'ukuran' => 'XL',
            'warna' => 'Hijau',
            'image' => 'path/to/image6.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}