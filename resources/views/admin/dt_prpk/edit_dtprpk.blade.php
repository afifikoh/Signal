@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Ubah Data Organisasi PAC</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dtpac">Data Organisasi PAC</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Data Organisasi PAC</h6>
        </div>
        <div class="card-body">
        <form action="/dtprpk-edit/{{ $prpk->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_kecamatan">Kecamatan</label>
                <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                    <option value="{{ $prpk->id_kecamatan }}">{{ $prpk->nama_kec->nama_kecamatan }}</option>
                    @foreach ($kec as $data)
                    <option value="{{ $data->id }}"> {{ $data->nama_kecamatan }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="prpk">Nama Organisasi</label>
                <input type="text" class="form-control" id="prpk" name="prpk" value="{{ $prpk->prpk }}" autocomplete="off" placeholder="Masukan Nama Ranting/Komisariat">
            </div>
            <div class="form-group">
                <label for="nama_organisasi">Nama Organisasi</label>
                <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" value="{{ $prpk->nama_organisasi }}" autocomplete="off" placeholder="Masukan Nama Organisasi">
            </div>
        <div class="row float-right">
            <button type="cancel" class="btn btn-danger" >Batal</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary mr-3" >Submit</button>
        </div>
        </form>
        </div>      
    </div>
@endsection