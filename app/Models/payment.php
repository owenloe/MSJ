<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
            'id_pembayaran',
            'nama_rek',
            'nomor_rek',
    ];
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
}
