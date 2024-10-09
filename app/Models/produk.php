<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'kategori_produk',
        'kuantitas_produk',
        'unit_produk',
        'harga_produk',
        'berat',
        'jenis',
        'ukuran',
        'warna',
        'image',
        'created_at',
        'updated_at'
    ];
}
