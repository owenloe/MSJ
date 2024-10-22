<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\produk;
use Carbon\Carbon;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


produk::create([ 
    'kode_produk' => 'PRD001',
    'nama_produk' => 'Produk 1',
    'kategori_produk' => 'EK',
    'kuantitas_produk' => 5,
    'unit_produk' => 1,
    'harga_produk' => 500000,
    'berat' => 1000, // dalam gram
    'jenis' => 'Baru',
    'ukuran' => 'M',
    'warna' => 'Hitam',
    'image' => 'path/to/image1.jpg', 
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
]);

produk::create([ 
    'kode_produk' => 'PRD002',
    'nama_produk' => 'Produk 2',
    'kategori_produk' => 'PK',
    'kuantitas_produk' => 4,
    'unit_produk' => 1,
    'harga_produk' => 150000,
    'berat' => 250, // dalam gram
    'jenis' => 'Baru',
    'ukuran' => 'L',
    'warna' => 'Merah',
    'image' => 'path/to/image2.jpg', 
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
]);

produk::create([ 
    'kode_produk' => 'PRD003',
    'nama_produk' => 'Produk 3',
    'kategori_produk' => 'MK',
    'kuantitas_produk' => 3,
    'unit_produk' => 1,
    'harga_produk' => 50000,
    'berat' => 500, // dalam gram
    'jenis' => 'Baru',
    'ukuran' => 'S',
    'warna' => 'Coklat',
    'image' => 'path/to/image3.jpg', 
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
]);
    }
}
