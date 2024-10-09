<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_invoice',
        'invoice_produk',
        'nama_user',
        'created_at',
        'updated_at',
        'nama_produk',
        'unit_produk',
        'harga_produk',
        'gambar_produk',
        'nama_bank',
        'jalan',
        'kota',
        'kecamatan',
        'nomor_telepon',
        
    ];
}
