@extends('layout.app')

@section('title', 'Edit Data Penerbit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penerbit</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Penerbit</h4>
            </div>
            <div class="card-body">
                <form action="/penerbit/{{$penerbit->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" name="kode" value="{{$penerbit->kode}}" readonly>
                        <label for="kode">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{$penerbit->nama}}">
                    </div>
                    <button type="submit" class="btn btn-md btn-success" value="hapus"><i class="fa fa-save"> Update</i></button>
                    <a href="/penerbit" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection