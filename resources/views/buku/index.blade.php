@extends('layout.app')

@section('title', 'Buku')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buku</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Buku</h4>
                <div class="card-header-form">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-buku"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table-buku">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buku as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td
                                style="text-align: center; display: flex; flex-direction: column; align-items: center">
                                {!! DNS1D::getBarcodeHTML('$ ' . $item->kode, 'c39+', 1, 25) !!}
                                <div style="margin-top: 5px;">{{$item->kode}}</div>    
                            </td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->pengarang}}</td>
                            <td>{{$item->stok}}</td>
                            <td><img src="{{asset('/storage/buku/'.$item->gambar)}}" class="rounded" style="width: 100px"></td>
                            <td style="width: 10%">
                                <form action="/buku/{{$item->id}}" id="delete-form">
                                    <a href="/buku/{{$item->id}}/edit" class="btn btn-sm btn-outline-warning mb-1"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="/buku/{{$item->id}}/print" class="btn btn-sm btn-outline-success mb-1"><i class="fa fa-print"></i> Print</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1" id="{{$item->kode}}" data-id = "{{$item->id}}" onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('buku.form')
@endsection

@push('confirm')
<script>
    
    @if(session('sukses'))
    iziToast.success({
      title:'Sukses', 
      message: '{{session('sukses')}}',
      position: 'topRight'
    });
    @endif

    var data_anggota = $(this).attr('data-id')
    function confirmDelete(button) {
    
        event.preventDefault()
        const id = button.getAttribute('data-id');
        const kode = button.getAttribute('id');
        swal({
                title: 'Hapus Data ' + kode + '?',
                text: 'Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
              form.action = '/buku/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
</script>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        $('#table-buku').DataTable();
    });
</script>
@endpush