<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'email',
        'password',
        'jalan',
        'kota',
        'kecamatan',
        'nomor_telepon',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
        'is_admin'
    ];
}
