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
    'id_kategori' => 'KT001',
    'jenis_kategori'=> 'Gas',
]);
    }
}
