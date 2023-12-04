<?php

namespace App\Http\Controllers;
use App\Models\anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();

        return view('dashboard.index', compact('anggota', 'buku', 'kategori', 'penerbit'));
    }
}
