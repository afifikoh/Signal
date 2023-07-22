@extends('layout.main')

@section('judul')
<h1 class="h3 mb-0 text-gray-800">Detail Data Surat Masuk</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
    <li class="breadcrumb-item"><a href="/dt_srtmasuk">Data surat masuk</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
  </ol>
</h1>
@endsection

@section('isi')
<!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Detail Data Surat Masuk</h6>
        </div>
        <div class="card-body">
        <form action="/srtmasuk-update/{{ $srt_masuk->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-9">
                <td>:   {{ $srt_masuk->tgl_masuk }}</td>
                <hr class="sidebar-divider">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                <div class="col-sm-9">
                <td>:   {{ $srt_masuk->tgl_surat }}</td>
                <hr class="sidebar-divider">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">No Surat</label>
                <div class="col-sm-9">
                <td>:   {{ $srt_masuk->no_surat }}</td>
                <hr class="sidebar-divider">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Perihal</label>
                <div class="col-sm-9">
                <td>:   {{ $srt_masuk->perihal }}</td>
                <hr class="sidebar-divider">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Pengirim</label>
                <div class="col-sm-9">
                <td>:   {{ $srt_masuk->pengirim }}</td>
                <hr class="sidebar-divider">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Isi Surat</label>
                <div class="col-sm-9">
                <td>:   {{ $srt_masuk->isi_surat }}</td>
                <hr class="sidebar-divider">
                </div>
            </div>
            <iframe class="embed-responsive iframe" src="/arsip_SM/{{ $srt_masuk->file }}" height="500"></iframe>
            
        
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