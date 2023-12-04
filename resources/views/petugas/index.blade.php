@extends('layout.app')

@section('title', 'Petugas')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Petugas</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Hi, {{auth()->user()->name}}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="assets/img/avatar/avatar-1.png"
                            class="rounded-circle profile-widget-picture">
                    </div>
                    <div class="profile-widget-description text-center">
                        <div class="profile-widget-name">{{auth()->user()->name}} <div
                                class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> {{auth()->user()->email}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form action="/petugas/{{auth()->user()->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Profil</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}"
                                        required="">
                                    <div class="invalid-feedback">
                                        Please fill in the Name
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{auth()->user()->email}}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the Email
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-12 ml-3">
                                    <input class="form-check-input" name="lupa_password" type="checkbox"
                                        id="password-baru">
                                    <label>
                                        Lupa Password ?
                                    </label>
                                </div>
                                <div class="form-group col-md-12 col-12 d-none" id="input-password">
                                    <label>password Baru</label>
                                    <input type="password" class="form-control" name="password-baru" id="form-password" placeholder="Masukkan Password Baru">
                                    <div class="form-group col-md-12 col-12 ml-3">
                                    <input class="form-check-input" name="hide_password" type="checkbox"
                                        id="hide-password">
                                    <label>
                                        Tampilkan Password
                                    </label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var newPassword = document.getElementById("password-baru");
    var inputPassword = document.getElementById("input-password");
    var formPassword = document.getElementById("form-password");
    var hidePassword = document.getElementById("hide-password");

    newPassword.addEventListener('change', function() {
        if (newPassword.checked) {
            inputPassword.classList.remove("d-none");
            formPassword.setAttribute('required', 'required');
        } else {
            inputPassword.classList.add("d-none");
            formPassword.removeAttribute('required', 'required');
            formPassword.value = '';
            formPassword.setAttribute('type', 'password');
            hidePassword.checked = false;
        }
    });

    hidePassword.addEventListener('change', function() {
        if (hidePassword.checked) {
            formPassword.setAttribute('type', 'text');
        } else {
            formPassword.setAttribute('type', 'password');
        }
    });

</script>
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
</script>
@endpush