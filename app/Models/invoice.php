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
        'id_pembayaran',
        'userid',
        'nama_user',
        'id_produk',
        'nama_produk',
        'quantity_produk',
        'harga_produk',
        'jalan',
        'kota',
        'kecamatan',
        'nomor_telepon'
        
    ];

    protected $primaryKey = 'id_invoice';
    public $incrementing = false;
}
