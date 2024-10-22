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
    protected $primaryKey = 'id_tanya';
    public $incrementing = false;
}
