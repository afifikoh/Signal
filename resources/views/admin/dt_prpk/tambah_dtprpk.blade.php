@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Organisasi PR/PK</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dtprpk">Data Organisasi PR/PK</a></li>
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
        <form action="/dtprpk-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_kecamatan">Kecamatan</label>
                <select class="form-control @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan">
                    <option value="">- Pilih Kecamatan -</option>
                    @foreach ($kec as $data)
                    <option value="{{ $data->id }}"> {{ $data->nama_kecamatan }} </option>
                    @endforeach
                </select>
                @error('id_kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="prpk">Nama Ranting/Komisariat</label>
                <input type="text" class="form-control @error('prpk') is-invalid @enderror" id="prpk" name="prpk" autocomplete="off" placeholder="Masukan Nama Ranting/Komisariat">
                @error('prpk')
                    <div class="invalid-feedback">{{ $message }}</div>
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