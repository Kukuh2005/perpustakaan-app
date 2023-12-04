@extends('layout.app')

@section('title', 'Edit Data Pinjam')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Pinjam</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Pinjam</h4>
            </div>
            <div class="card-body">
                <form action="/pinjam/{{$pinjaman->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input value="{{$pinjaman->tanggal_pinjam}}" type="date" class="form-control" name="tanggal_pinjam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lama_pinjam">Lama Pinjam</label>
                                <input value="{{$pinjaman->lama_pinjam}}" type="number" class="form-control" name="lama_pinjam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input value="{{$pinjaman->keterangan}}" type="text" class="form-control" name="keterangan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status">
                                    <option>Pilih Status</option>
                                    <option value="belum kembali" {{ $pinjaman->status == 'belum kembali' ? 'selected' : '' }}>belum kembali</option>
                                    <option value="sudah kembali" {{ $pinjaman->status == 'sudah kembali' ? 'selected' : '' }}>sudah kembali</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggota">Anggota</label>
                                <select class="custom-select" name="anggota_id">
                                    <option value="">Pilih Anggota</option>
                                    @foreach ($anggota as $anggota)
                                    <option value="{{ $anggota->id }}" {{ $anggota->id == $pinjaman->anggota_id ? 'selected' : '' }}>{{ $anggota->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select class="custom-select" name="user_id">
                                    <option value="">Pilih User</option>
                                    @foreach ($user as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $pinjaman->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md btn-success"><i class="fa fa-save"> Simpan</i></button>
                    <a href="/pinjam" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
