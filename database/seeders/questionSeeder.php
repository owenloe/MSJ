<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class questionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First product
        Question::create([
            'id_tanya' => 'TNY001',
            'id_produk' => 'PD001',
            'userid' => 'US001',
            'nama_user' =>  'John Doe',
            'pertanyaan' => 'Is this product still available?',
        ]);

        Question::create([
            'id_tanya' => 'TNY002',
            'id_produk' => 'PD002',
            'userid' => 'US002',
            'nama_user' =>  'Jane Smith',
            'pertanyaan' => 'Is this product still available?',
        ]);

        Question::create([
            'id_tanya' => 'TNY003',
            'id_produk' => 'PD003',
            'userid' => 'US003',
            'nama_user' =>  'Alice Johnson',
            'pertanyaan' => 'Is this product still available?',
        ]);


}
}