<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\rating;

class ratingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        rating::create([
            'id_rating' => 'RT001',
            'userid' => 'US001',
            'nama_user' => 'John Doe',
            'rating' => '5',
            'komentar' => 'Good product',
            'gambar_produk' => 'fotos/smile.jpg',
        ]);

        rating::create([
            'id_rating' => 'RT002',
            'userid' => 'US002',
            'nama_user' => 'Jane Smith',
            'rating' => '4',
            'komentar' => 'Good product',
            'gambar_produk' => 'fotos/smile.jpg',
        ]);

        rating::create([
            'id_rating' => 'RT003',
            'userid' => 'US003',
            'nama_user' => 'Alice Johnson',
            'rating' => '4',
            'komentar' => 'Good product',
            'gambar_produk' => 'fotos/smile.jpg',
        ]);

        rating::create([
            'id_rating' => 'RT004',
            'userid' => 'US004',
            'nama_user' => 'Bob Brown',
            'rating' => '5',
            'komentar' => 'Good product',
            'gambar_produk' => 'fotos/smile.jpg',
        ]);


    }
}
