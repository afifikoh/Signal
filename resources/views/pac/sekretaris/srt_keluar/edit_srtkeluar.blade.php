@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Ubah Data Surat Masuk</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dt_srtmasuk">Data surat masuk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Data Surat Masuk</h6>
        </div>
        <div class="card-body">
        <form action="/srtmasuk-update/{{ $srt_masuk->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="simple-date1">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $srt_masuk->tgl_masuk }}" name="tgl_masuk" id="tgl_masuk">
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
                                <input type="text" class="form-control" value="{{ $srt_masuk->tgl_surat }}" name="tgl_surat" id="tgl_surat">
                        </div>                
                    </div> 
                </div>
            </div>
            <div class="form-group">
                <label for="no_surat">No Surat</label>
                <input type="text" class="form-control" id="no_surat" name="no_surat" autocomplete="off" value="{{ $srt_masuk->no_surat }}">
                <input type="text" hidden class="form-control" id="pac_id" name="pac_id" autocomplete="off" value="{{ $srt_masuk->pac_id }}">
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" autocomplete="off" value="{{ $srt_masuk->perihal }}">
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" name="pengirim" autocomplete="off" value="{{ $srt_masuk->pengirim }}">
            </div>
            <div class="form-group">
                <label for="isi_surat">Isi Surat</label>
                <input type="text" class="form-control" id="isi_surat" name="isi_surat" autocomplete="off" value="{{ $srt_masuk->isi_surat }}">
            </div>
            <div class="form-group">
                <label for="file">Masukan File Surat</label>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="old_file" value="{{ $srt_masuk->file }}">
                        @if($srt_masuk->file)
                            <a href="{{ asset('arsip_SM/'.$srt_masuk['file']) }}" name="old_file">Lihat File</a>
                        @else
                            <span class= "badge badge-danger">Belum ada File</span>
                        @endif
                            <div class="custom-file @error('file') is-invalid @enderror" id="file" name="file" value="{{ $srt_masuk->file }}">
                                <input type="file" class="custom-file-input" name="file" id="file">
                                <label class="custom-file-label" for="file">Masukan file</label>
                            </div>
                            @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
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