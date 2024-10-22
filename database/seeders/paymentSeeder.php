<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\payment;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class paymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        payment::create([ 
            'id' => 'PB001',
            'nama_user' => 'John Doe',
            'nama_rek' => 'John Doe',
            'nomor_rek' => '1234567890',
            'nominal_transfer' => 100000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'invoice_produk' => 'INV0001',
            'bukti_transfer' => 'path/to/bukti_transfer.jpg', // Ganti dengan path yang benar
            'nama_bank' => 'Bank ABC',
            'status_transaksi' => 'sukses',
            'status_pesanan' => 'diproses',
            'status_pengiriman' => 'dikirim',
            'alasan_komplain' => 'Barang rusak', // Isi jika ada komplain
            'gambar_komplain' => 'path/to/gambar_komplain.jpg', // Ganti dengan path yang benar, isi jika ada komplain
        ]);

        payment::create([ 
            'id' => 'PB002',
            'nama_user' => 'Jane Smith',
            'nama_rek' => 'Jane Smith',
            'nomor_rek' => '9876543210',
            'nominal_transfer' => 250000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'invoice_produk' => 'INV0002',
            'bukti_transfer' => 'path/to/bukti_transfer2.jpg', 
            'nama_bank' => 'Bank DEF',
            'status_transaksi' => 'pending',
            'status_pesanan' => 'menunggu pembayaran',
            'status_pengiriman' => 'belum dikirim',
            'alasan_komplain' => 'adw', 
            'gambar_komplain' => 'adawd', 
        ]);

        payment::create([ 
            'id' => 'PB003',
            'nama_user' => 'Peter Jones',
            'nama_rek' => 'Peter Jones',
            'nomor_rek' => '5555555555',
            'nominal_transfer' => 150000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'invoice_produk' => 'INV0003',
            'bukti_transfer' => 'path/to/bukti_transfer3.jpg', 
            'nama_bank' => 'Bank GHI',
            'status_transaksi' => 'gagal',
            'status_pesanan' => 'dibatalkan',
            'status_pengiriman' => 'tidak dikirim',
            'alasan_komplain' => 'Pesanan tidak sesuai', 
            'gambar_komplain' => 'path/to/gambar_komplain3.jpg', 
        ]);

    }
}
