<!-- Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="modal-dialog modal-dialog-centered"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kembali/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_pinjam">Id Pinjaman</label>
                                <input type="text" class="form-control" name="pinjaman_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select class="custom-select" name="user_id">
                                    <option value="">Pilih User</option>
                                    @foreach ($user as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lama_pinjam">Tanggal kembali</label>
                                <input type="date" class="form-control" name="tanggal_kembali">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md btn-success"><i class="fa fa-save"> Simpan</i></button>
                </form>
            </div>
        </div>
    </div>
</div>
