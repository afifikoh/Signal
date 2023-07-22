@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Kecamatan</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dt_kec">Data Kecamatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kecamatan</h6>
        </div>
        <div class="card-body">
        <form action="/kec-update/{{ $kecamatan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_kecamatan">Nama Kecamatan</label>
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan }}">
            </div>
        <div class="row float-right">
            <button type="cancel" class="btn btn-danger" >Batal</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary mr-3" >Ubah</button>
        </div>
        </form>
        </div>      
    </div>
@endsection