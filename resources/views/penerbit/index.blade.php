@extends('layout.app')

@section('title', 'Penerbit')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Penerbit</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Penerbit</h4>
                <div class="card-header-form">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-penerbit"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="table-penerbit">
                <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode</th>
                            <th scope="col" style="width: 50%">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penerbit as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <form action="/penerbit/{{$item->id}}" id="delete-form">
                                    <a href="/penerbit/{{$item->id}}/edit" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" id="{{$item->kode}}" data-id="{{$item->id}}" onclick="confirmDelete(this)"><i class="fa fa-trash"></i> Delete</a>
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
@include('penerbit.form')
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
                title: 'Apa Anda Yakin ?',
                text: 'Anda akan menghapus data: "' + kode + '". Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
              const form = document.getElementById('delete-form');
              // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
              form.action = '/penerbit/' + id; // Ubah aksi form sesuai dengan ID yang sesuai
              form.submit();
            }
        });
    }
</script>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        $('#table-penerbit').DataTable();
    });
</script>
@endpush