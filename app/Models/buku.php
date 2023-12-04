<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;
use App\Models\penerbit;

class buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'judul',
        'kategori_id',
        'penerbit_id',
        'isbn',
        'pengarang',
        'jumlah_halaman',
        'stok',
        'tahun_terbit',
        'sinopsis',
        'gambar',
    ];

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
}
