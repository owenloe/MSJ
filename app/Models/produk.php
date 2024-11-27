<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'id_produk',
        'nama_produk',
        'kategori_produk',
        'quantity_produk',
        'harga_produk',
        'modal_produk',
        'berat',
        'jenis',
        'ukuran',
        'warna',
        'image',
    ];

    protected $primaryKey = 'id_produk';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_produk', 'id_kategori');
    }
}