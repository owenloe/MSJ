<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nama_user',
        'nama_rek',
        'nomor_rek',
        'nominal_transfer',
        'created_at',
        'updated_at',
        'invoice_produk',
        'bukti_transfer',
        'nama_bank',
        'status_transaksi',
        'status_pesanan',
        'status_pengiriman',
        'alasan_komplain',
        'gambar_komplain',
    ];
}
