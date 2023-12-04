<?php

namespace App\Http\Controllers;

use App\Models\pinjaman;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::all();
        $anggota = \App\Models\Anggota::all();
        $user = \App\Models\User::all();
        return view('pinjam.index', compact('pinjaman', 'anggota', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $pinjaman = new Pinjaman;

        pinjaman::create([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'lama_pinjam' => $request->lama_pinjam,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'anggota_id' => $request->anggota_id,
            'user_id' => $request->user_id,
        ]);

        return redirect('pinjam')->with('sukses', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(pinjaman $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjaman = Pinjaman::find($id);
        $anggota = Anggota::all();
        $user = User::all();

        return view('pinjam.edit', compact('pinjaman','anggota', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $pinjaman = Pinjaman::findOrFail($id);

        $pinjaman->update([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'lama_pinjam' => $request->lama_pinjam,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'anggota_id' => $request->anggota_id,
            'user_id' => $request->user_id,
        ]);

        return redirect('pinjam')->with('sukses', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();

        return redirect('pinjam')->with('sukses', 'Data berhasil di hapus');
    }
}
