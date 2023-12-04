<!-- Modal -->
<div class="modal fade" id="modal-pinjam" tabindex="-1" aria-labelledby="modal-dialog modal-dialog-centered"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pinjam/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                <input type="date" class="form-control" name="tanggal_pinjam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lama_pinjam">Lama Pinjam</label>
                                <input type="number" class="form-control" name="lama_pinjam">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status">
                                    <option>Pilih Status</option>
                                    <option value="sudah kembali">Sudah Kembali</option>
                                    <option value="belum kembali">Belum Kembali</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggota">Anggota</label>
                                <select class="custom-select" name="anggota_id">
                                    <option value="">Pilih Anggota</option>
                                    @foreach ($anggota as $anggota)
                                    <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
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
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md btn-success"><i class="fa fa-save"> Simpan</i></button>
                </form>
            </div>
        </div>
    </div>
</div>
