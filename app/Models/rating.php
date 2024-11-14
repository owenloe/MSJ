<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    public function pengguna() {
        return $this->belongsTo(Pengguna::class, 'userid', 'userid');
    }
    protected $fillable = [
            'id_rating',
            'userid',
            'nama_user',
            'rating',
            'komentar',
            'gambar_produk',
    ];
    protected $primaryKey = 'id_rating';
    public $incrementing = false;
        public $timestamps = false;

        protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            
            // Set the nama_user field based on the selected userid
            $model->nama_user = \App\Models\Pengguna::find($model->userid)?->nama;
                if (empty($model->gambar_produk)) {
                $model->gambar_produk = 'noInput.jpg';
            }
            
        });
    }
}
