@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Tambah Realisasi Program Kerja</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dt_srtmasuk">Data Realisasi Program Kerja</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Realisasi Data Program Kerja</h6>
        </div>
        <div class="card-body">
        <form action="kegpac-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_keg">Nama Kegiatan</label>
                <select class="form-control @error('nama_keg') is-invalid @enderror" id="nama_keg" name="nama_keg">
                  <option value="">-Pilih Nama Kegiatan-</option>
                  @foreach ($prokja as $data)
                  <option value="{{ $data->id }}">{{ $data->nama_keg }}</option>
                  @endforeach
                </select>
                @error('nama_keg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group" id="simple-date1">
                <label for="tgl_keg">Tanggal</label>
                <div class="input-group date">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control @error('tgl_keg') is-invalid @enderror" value="Masukan Tanggal Kegiatan" name="tgl_keg" id="tgl_keg">
                    @error('tgl_keg')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="target">Tempat Kegiatan</label>
                <input type="text" class="form-control @error('target') is-invalid @enderror" id="target" name="target" autocomplete="off" placeholder="Masukan Target Pelaksana">
                @error('target')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pelaksana">Pelaksana Kegiatan</label>
                <input type="text" class="form-control @error('pelaksana') is-invalid @enderror" id="pelaksana" name="pelaksana" autocomplete="off" placeholder="Masukan Mitra Kegiatan">
                @error('pelaksana')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        <div class="row float-right">
            <button type="cancel" class="btn btn-danger" >Batal</button>&nbsp;&nbsp;
            <button data-toggle="modal" data-target="#modalsave"  class="btn btn-primary mr-3" >Submit</button>
        </div>
        {{-- modal --}}
        <div class="modal fade" id="modalsave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabelLogout">Cek Kembali!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda yakin untuk menyimpan data?</p>
                      <p>Cek kembali, <strong style="color: #fb160a;">data tidak bisa di ubah ataupun di hapus!</strong> </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary mr-3" >Submit</button>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </div>
        </form>
        </div>      
    </div>
@endsection