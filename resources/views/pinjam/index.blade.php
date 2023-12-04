@extends('layout.app')

@section('title', 'Pinjam')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pinjam</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Pinjaman</h4>
                <div class="card-header-form">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-pinjam"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table-pinjam">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Lama Pinjam</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Anggota</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pinjaman as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->tanggal_pinjam}}</td>
                            <td>{{$item->lama_pinjam}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{!empty($item->anggota->nama) ? $item->anggota->nama : 'Data Anggota telah Dihapus'}}</td>
                            <td style="width: 10%">
                                <form action="/pinjam/{{$item->id}}" id="delete-form">
                                    <a href="/pinjam/{{$item->id}}/edit" class="btn btn-sm btn-outline-warning mb-1"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-sm btn-outline-success mb-1"><i class="fa fa-print"></i> Print</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1" data-id="{{$item->id}}" onclick="confirmDelete(this)"><i
                                            class="fa fa-trash"></i> Delete</a>
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
@include('pinjam.form')
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
        swal({
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus ID: ' + id + '. Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
              form.action = '/pinjam/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
</script>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        $('#table-pinjam').DataTable();
    });
</script>
@endpush