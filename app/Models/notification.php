<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'id_notif',
            'userid',
            'notifikasi',
            'objek',
            'nama_user',
    ];

     public function pengguna()
    {
        return $this->belongsTo(pengguna::class, 'userid');
    }

    protected static function boot()
    {
        parent::boot();

        // This will be triggered before a new model is inserted into the database
        static::creating(function ($model) {
        $pengguna = \App\Models\Pengguna::find($model->userid);
        $model->nama_user = $pengguna?->nama;
    });
    }
    
    protected $primaryKey = 'id_notif';
    public $incrementing = false;
}
