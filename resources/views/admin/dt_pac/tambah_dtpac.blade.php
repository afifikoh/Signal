@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Organisasi PAC</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dtpac">Data Organisasi PAC</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kecamatan</h6>
        </div>
        <div class="card-body">
        <form action="/dtpac-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_kec">Kecamatan</label>
                <select class="form-control  @error('id_kec') is-invalid @enderror" id="id_kec" name="id_kec">
                    <option value="">- Pilih Kecamatan -</option>
                    @foreach ($kec as $data)
                    <option value="{{ $data->id }}"> {{ $data->nama_kecamatan }} </option>
                    @endforeach
                </select>
                @error('id_kec')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_organisasi">Nama Organisasi</label>
                <input type="text" class="form-control @error('nama_organisasi') is-invalid @enderror" id="nama_organisasi" name="nama_organisasi" autocomplete="off" placeholder="Masukan Nama Organisasi">
                @error('nama_organisasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        <div class="row float-right">
            <button type="cancel" class="btn btn-danger" >Batal</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary mr-3" >Submit</button>
        </div>
        </form>
        </div>      
    </div>
@endsection