<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::create([
            'id_invoice' => 'INV001',
            'id_pembayaran' => 'PB001',
            'invoice_produk' => 'INV0001',
            'nama_user' => 'US001',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'nama_produk' => 'Produk 1',
            'unit_produk' => 1,
            'harga_produk' => 100000,
            'gambar_produk' => 'path/to/product/image.jpg', // Replace with actual path
            'nama_bank' => 'Nama Bank', // Replace with actual bank name
            'jalan' => 'Nama Jalan', // Replace with actual street address
            'kota' => 'Nama Kota', // Replace with actual city
            'kecamatan' => 'Nama Kecamatan', // Replace with actual district
            'nomor_telepon' => '081234567890', // Replace with actual phone number
        ]);

        Invoice::create([
    'id_invoice' => 'INV002',
    'id_pembayaran' => 'PB002',
    'invoice_produk' => 'INV0002',
    'nama_user' => 'US002',
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
    'nama_produk' => 'Produk 2',
    'unit_produk' => 3,
    'harga_produk' => 50000,
    'gambar_produk' => 'path/to/product/image2.jpg', 
    'nama_bank' => 'Bank B', 
    'jalan' => 'Jalan Melati',
    'kota' => 'Bandung', 
    'kecamatan' => 'Bandung Wetan', 
    'nomor_telepon' => '085712345678', 
]);

Invoice::create([
    'id_invoice' => 'INV003',
    'id_pembayaran' => 'PB003',
    'invoice_produk' => 'INV0003',
    'nama_user' => 'US003',
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
    'nama_produk' => 'Produk 3',
    'unit_produk' => 2,
    'harga_produk' => 250000,
    'gambar_produk' => 'path/to/product/image3.jpg', 
    'nama_bank' => 'Bank C', 
    'jalan' => 'Jalan Anggrek', 
    'kota' => 'Surabaya', 
    'kecamatan' => 'Gubeng', 
    'nomor_telepon' => '089876543210', 
]);
    }
}
