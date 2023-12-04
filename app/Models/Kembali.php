<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjaman_id',
        'tanggal_kembali',
        'user_id'
    ];
}
