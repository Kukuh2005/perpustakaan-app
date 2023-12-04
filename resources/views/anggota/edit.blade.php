@extends('layout.app')

@section('title', 'Edit Data Anggota')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Anggota</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Anggota</h4>
            </div>
            <div class="card-body">
                <form action="/anggota/{{$anggota->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" value="{{$anggota->kode}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$anggota->nama}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="custom-select" name="jenis_kelamin">
                                    <option value="Laki-Laki" {{ $anggota->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $anggota->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="{{$anggota->tempat_lahir}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{$anggota->tanggal_lahir}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" name="telepon" value="{{$anggota->telepon}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat">{{$anggota->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <img class="form-control rounded" src="{{asset('/storage/anggota/'.$anggota->foto)}}" alt="{{asset('/storage/anggota/'.$anggota->foto)}}" style="height: 200px">
                                <input type="file" class="form-control-file mt-2" name="foto">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i> Update</button>
                    <a href="/anggota" class="btn btn-md btn-danger"><i class="fa fa-times"></i> Batal</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
