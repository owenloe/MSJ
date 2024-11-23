<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'id_produk',
            'nama_produk',
            'kategori_produk',
            'quantity_produk',
            'harga_produk',
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

        static::creating(function ($model) {
            if (empty($model->image)) {
                $model->image = 'nopic.jpg';
            }
        });
    }
    public function kategori()
{
    return $this->belongsTo(kategori::class, 'kategori_produk', 'id_kategori');
}

}
