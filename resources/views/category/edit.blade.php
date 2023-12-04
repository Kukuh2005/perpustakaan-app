@extends('layout.app')

@section('title', 'Edit Data Category')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="/category/{{$kategori->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" name="kode" value="{{$kategori->kode}}" readonly>
                        <label for="kode">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}">
                    </div>
                    <button type="submit" class="btn btn-md btn-success" value="hapus"><i class="fa fa-save"> Update</i></button>
                    <a href="/category" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection