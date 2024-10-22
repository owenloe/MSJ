<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kategori;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        kategori::create([ 
    'kode_kategori' => 'EK',
    'jenis_kategori'=> 'Elektronik',
]);
kategori::create([ 
    'kode_kategori' => 'PK',
    'jenis_kategori'=> 'Pakaian',
]);
kategori::create([ 
    'kode_kategori' => 'MK',
    'jenis_kategori'=> 'Makanan',
]);
    }
}
