<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'id_tanya',
            'id_produk',
            'userid',
            'nama_user',
            'pertanyaan',
    ];

        public function produk()
        {
            return $this->belongsTo(produk::class, 'id_produk');
        }

        public function pengguna()
        {
            return $this->belongsTo(pengguna::class, 'userid');
        }

        protected static function boot()
    {
        parent::boot();

        // This will be triggered before a new model is inserted into the database
        static::creating(function ($model) {
        $produk = \App\Models\Produk::find($model->id_produk);
        $model->id_produk = $produk?->id_produk;

        $pengguna = \App\Models\Pengguna::find($model->userid);
        $model->nama_user = $pengguna?->nama;
    });
    }
    protected $primaryKey = 'id_tanya';
    public $incrementing = false;
}
