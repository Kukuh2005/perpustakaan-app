<?php

namespace App\Http\Controllers;

use App\Models\pengembalian;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kembali = Pengembalian::all();
        $user = User::all();
        return view('kembali.index', compact('kembali', 'user'));
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
        $kembali = new Pengembalian;

        pengembalian::create([
            'pinjaman_id' => $request->pinjaman_id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'user_id' => $request->user_id
        ]);

        return redirect('kembali')->with('sukses', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kembali = Pengembalian::find($id);
        $user = User::all();
        return view('kembali.edit', compact('kembali', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $kembali = Pengembalian::findOrFail($id);

        $kembali->update([
            'pinjaman_id' => $request->pinjaman_id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'user' => $request->user
        ]);

        return redirect('kembali')->with('sukses', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengembalian $pengembalian)
    {
        //
    }
}
