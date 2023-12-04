<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\User;

class pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pinjam',
        'lama_pinjam',
        'keterangan',
        'status',
        'anggota_id',
        'user_id',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
