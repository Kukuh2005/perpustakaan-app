<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Pinjaman;

class pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjaman_id',
        'tanggal_kembali',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
