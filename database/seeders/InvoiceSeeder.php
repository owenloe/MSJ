<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First invoice
        Invoice::create([
            'id_invoice' => 'TRX001',
            'id_pembayaran' => 'PB001',
            'userid' => 'US001',
            'nama_user' => 'John Doe',
            'id_produk' => 'PD001',
            'nama_produk' => 'Elpiji 3KG',
            'quantity_produk' => 1,
            'harga_produk' => 200000,
            'jalan' => 'Jl. Merdeka No. 1',
            'kota' => 'Jakarta',
            'kecamatan' => 'Gambir',
            'nomor_telepon' => '081234567890',
            'date_made' => '2021-11-22',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Second invoice
        Invoice::create([
            'id_invoice' => 'TRX002',
            'id_pembayaran' => 'PB002',
            'userid' => 'US002',
            'nama_user' => 'Jane Smith',
            'id_produk' => 'PD002',
            'nama_produk' => 'Bright Gas 5.5KG',
            'quantity_produk' => 2,
            'harga_produk' => 375000,
            'jalan' => 'Jl. Sudirman No. 2',
            'kota' => 'Bandung',
            'kecamatan' => 'Cicendo',
            'nomor_telepon' => '081234567891',
            'date_made' => '2021-11-23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Third invoice
        Invoice::create([
            'id_invoice' => 'TRX003',
            'id_pembayaran' => 'PB003',
            'userid' => 'US003',
            'nama_user' => 'Alice Johnson',
            'id_produk' => 'PD003',
            'nama_produk' => 'Elpiji 12KG',
            'quantity_produk' => 6,
            'harga_produk' => 475000,
            'jalan' => 'Jl. Thamrin No. 3',
            'kota' => 'Surabaya',
            'kecamatan' => 'Tegalsari',
            'nomor_telepon' => '081234567892',
            'date_made' => '2021-11-24',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Fourth invoice
        Invoice::create([
            'id_invoice' => 'TRX004',
            'id_pembayaran' => 'PB004',
            'userid' => 'US004',
            'nama_user' => 'Bob Brown',
            'id_produk' => 'PD002',
            'nama_produk' => 'Bright Gas 5.5KG',
            'quantity_produk' => 1,
            'harga_produk' => 375000,
            'jalan' => 'Jl. Gatot Subroto No. 4',
            'kota' => 'Medan',
            'kecamatan' => 'Medan Baru',
            'nomor_telepon' => '081234567893',
            'date_made' => '2021-11-25',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
