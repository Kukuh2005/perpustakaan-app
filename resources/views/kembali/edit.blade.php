@extends('layout.app')

@section('title', 'Edit Data Pengembalian')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Pengembalian</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Pengembalian</h4>
            </div>
            <div class="card-body">
                <form action="/kembali/{{$kembali->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pinjaman_id">Id Pinjaman</label>
                                <input value="{{$kembali->pinjaman_id}}" type="text" class="form-control" name="pinjaman_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_kembali">Tanggal kembali</label>
                                <input value="{{$kembali->tanggal_kembali}}" type="date" class="form-control" name="tanggal_kembali">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select class="custom-select" name="user">
                                    <option value="">Pilih User</option>
                                    @foreach ($user as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $kembali->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md btn-success"><i class="fa fa-save"> Simpan</i></button>
                    <a href="/kembali" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
