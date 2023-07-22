@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Data Surat Masuk</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dt_srtmasuk">Data surat masuk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Surat Masuk</h6>
        </div>
        <div class="card-body">
        <form action="srtmasuk-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="simple-date1">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control @error('tgl_masuk') is-invalid @enderror" value="dd/mm/yyyy" name="tgl_masuk" id="tgl_masuk">
                            @error('tgl_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group" id="simple-date1">
                    <label for="tgl_surat">Tanggal Surat</label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                                <input type="text" class="form-control @error('tgl_surat') is-invalid @enderror" value="dd/mm/yyyy" name="tgl_surat" id="tgl_surat">
                                @error('tgl_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                
                    </div> 
                </div>
            </div>
            <div class="form-group">
                <label for="no_surat">No Surat</label>
                <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" name="no_surat" autocomplete="off" placeholder="Masukan No Surat">
                @error('no_surat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="text" hidden class="form-control" id="pac_id" name="pac_id" autocomplete="off" value="{{ $user->id_ket }}">
                
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" autocomplete="off" placeholder="Masukan Perihal Surat">
                @error('perihal')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" name="pengirim" autocomplete="off" placeholder="Masukan Pengirim Surat">
                @error('pengirim')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="isi_surat">Isi Surat</label>
                <input type="text" class="form-control @error('isi_surat') is-invalid @enderror" id="isi_surat" name="isi_surat" autocomplete="off" placeholder="Masukan Isi Surat Surat">
                @error('isi_surat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">Masukan File Surat</label>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="inputGroupFile04">
                    @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label class="custom-file-label" for="inputGroupFile04">Masukan file</label>
                </div>
            </div>
        <div class="row float-right">
            <button type="cancel" class="btn btn-danger" >Batal</button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary mr-3" >Submit</button>
        </div>
        </form>
        </div>      
    </div>
@endsection

@push('footer-script')
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>
@endpush