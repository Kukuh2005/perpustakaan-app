@extends('layout.app')

@section('title', 'dashboard')

@section('content')
<div class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Category</h4>
                  </div>
                  <div class="card-body">
                    {{$kategori->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-th-large"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Penerbit</h4>
                  </div>
                  <div class="card-body">
                    {{$penerbit->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Anggota</h4>
                  </div>
                  <div class="card-body">
                    {{$anggota->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Buku</h4>
                  </div>
                  <div class="card-body">
                    {{$buku->count()}}
                  </div>
                </div>
              </div>
            </div>                  
          </div>
</div>
@endsection